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

    /**
     * 
     * Construtor da classe database
     * 
     * @param Core $core Instância do Core
     * 
     */
    public function __construct(Core $core)
    {
        $this->core = $core;
        $this->verify_connection();
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
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
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
}
