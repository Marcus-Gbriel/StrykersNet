<?php

/**
 * 
 * Conexão com o banco de dados
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 * Ainda está em desenvolvimento, não está pronto para produção
 * 
 */
class database
{
    private $connection = null;
    private $core = null;
    private static $instance = null;

    /**
     * 
     * Construtor privado da classe database (Singleton)
     * 
     * @param Core $core Instância do Core
     * 
     */
    private function __construct(Core $core)
    {
        $this->core = $core;
        $this->verify_connection();
    }

    /**
     * 
     * Método estático para obter a instância única da classe database (Singleton)
     * 
     * @param Core $core Instância do Core
     * @return database Instância única da classe database
     * 
     */
    public static function getInstance(Core $core): database
    {
        if (self::$instance === null) {
            self::$instance = new self($core);
        }
        return self::$instance;
    }

    /**
     * 
     * Previne a clonagem da instância
     * 
     */
    private function __clone() {}

    /**
     * 
     * Previne a deserialização da instância
     * 
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }

    /**
     * 
     * Verifica a conexão com o banco de dados
     * 
     * @return void
     * 
     */
    private function verify_connection(): void
    {
        try {
            $db_server = CONFIG['database']['server'];
            $db_port = CONFIG['database']['port'];
            $db_username = CONFIG['database']['username'];
            $db_password = CONFIG['database']['password'];
            $db_name = CONFIG['database']['database'];
            $db_charset = CONFIG['database']['charset'];

            if ($this->connection === null) {
                $dsn = "mysql:host={$db_server};port={$db_port};dbname={$db_name};charset={$db_charset}";

                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_PERSISTENT => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci; SET time_zone = 'America/Sao_Paulo'"
                ];

                $this->connection = new PDO($dsn, $db_username, $db_password, $options);
            }
        } catch (Exception $e) {
            $this->core->log("Error connecting to the database: " . $e->getMessage(), 'error');
            $this->core->error();
        }
    }

    /**
     * 
     * Executa uma consulta SQL no banco de dados
     *
     * @param string $sql Comando SQL a ser executado
     * @param array $params Parâmetros para a consulta SQL
     * @return PDOStatement Retorna o resultado da consulta
     * 
     */
    public function query(string $sql, array $params = []): PDOStatement
    {
        try {
            $connection = $this->connection;
            $statement = $connection->prepare($sql);
            $statement->execute($params);

            return $statement;
        } catch (Exception $e) {
            $this->core->log("Error executing query: " . $e->getMessage(), 'error');
            die("Query error: " . $e->getMessage());
        }
    }

    /**
     * 
     * Recebe todos os resultados de uma consulta SQL
     * 
     * @param string $sql Comando SQL a ser executado
     * @param array $params Parâmetros para a consulta SQL
     * @return array Retorna um array com todos os resultados da consulta
     * 
     */
    public function fetchAll(string $sql, array $params = []): array
    {
        try {
            $statement = $this->query($sql, $params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $this->core->log("Error fetching all: " . $e->getMessage(), 'error');
            die("Fetch error: " . $e->getMessage());
        }
    }

    /**
     * 
     * Captura um único resultado de uma consulta SQL
     * 
     * @param string $sql Comando SQL a ser executado
     * @param array $params Parâmetros para a consulta SQL
     * @return array Retorna um array com o resultado da consulta
     * 
     */
    public function fetchOne(string $sql, array $params = []): array
    {
        try {
            $statement = $this->query($sql, $params);
            return $statement->fetch(PDO::FETCH_ASSOC) ?: [];
        } catch (Exception $e) {
            $this->core->log("Error fetching one: " . $e->getMessage(), 'error');
            die("Fetch one error: " . $e->getMessage());
        }
    }

    /**
     * 
     * Insere um novo registro no banco de dados
     * 
     * @param string $table Nome da tabela onde o registro será inserido
     * @param array $data Dados a serem inseridos no formato de chave-valor
     * @param Core $core Instância do Core para obter a conexão
     * 
     * @return void
     * 
     */
    public static function insert(string $table, array $data, Core $core): void
    {
        try {
            $database = self::getInstance($core);
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";

            $statement = $database->query($sql, $data);
            if ($statement->rowCount() === 0) {
                throw new Exception("Insert failed: No rows affected.");
            }
        } catch (Exception $e) {
            die("Insert error: " . $e->getMessage());
        }
    }

    /**
     * 
     * Atualiza um registro existente no banco de dados
     * 
     * @param string $table Nome da tabela onde o registro será atualizado
     * @param array $data Dados a serem atualizados no formato de chave-valor
     * @param array $conditions Condições para identificar o registro a ser atualizado
     * @param Core $core Instância do Core para obter a conexão
     * 
     * @return int Retorna o número de linhas afetadas pela atualização
     * 
     */
    public static function update(string $table, array $data, array $conditions, Core $core): int
    {
        try {
            $database = self::getInstance($core);
            $setClause = [];
            foreach (array_keys($data) as $column) {
                $setClause[] = "{$column} = :{$column}";
            }
            $setClause = implode(', ', $setClause);

            $whereClause = [];
            foreach (array_keys($conditions) as $column) {
                $whereClause[] = "{$column} = :where_{$column}";
            }
            $whereClause = implode(' AND ', $whereClause);

            $sql = "UPDATE {$table} SET {$setClause} WHERE {$whereClause}";

            // Prefix condition parameters to avoid conflicts
            $params = $data;
            foreach ($conditions as $key => $value) {
                $params["where_{$key}"] = $value;
            }

            $statement = $database->query($sql, $params);

            return $statement->rowCount();
        } catch (\Throwable $th) {
            die("Update error: " . $th->getMessage());
        }
    }

    /**
     * 
     * Inicia a transação no banco de dados
     * 
     * @return bool Retorna true se a transação foi iniciada com sucesso, false caso contrário
     * 
     */
    public function beginTransaction(): bool
    {
        try {
            $this->connection->beginTransaction();
            return true;
        } catch (Exception $e) {
            $this->core->log("Error beginning transaction: " . $e->getMessage(), 'error');
            return false;
        }
    }
}
