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
class Database
{
    private static PDO $connection;

    /**
     * 
     * Contrutor da classe Database
     * 
     * @return void
     * 
     */
    public function __construct()
    {
        $this->getInstance();
    }

    private static function connect(): void
    {
        try {
            Config::validateDatabaseConfig();

            $dsn =  sprintf(
                "mysql:host=%s;port=%s;dbname=%s;charset=%s",
                CONFIG['database']['server'],
                CONFIG['database']['port'],
                CONFIG['database']['database'],
                CONFIG['database']['charset'],
            );

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_PERSISTENT => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci; SET time_zone = 'America/Sao_Paulo'"
            ];

            self::$connection = new PDO(
                $dsn,
                CONFIG['database']['username'],
                CONFIG['database']['password'],
                $options
            );
            Core::log("Conexão com o banco de dados estabelecida com sucesso.");
        } catch (Exception $e) {
            Core::log("Erro ao conectar ao banco de dados: " . $e->getMessage());
            Core::error();
        }
    }

    private static function getInstance(): PDO
    {
        if (!isset(self::$connection)) {
            self::connect();
        }
        return self::$connection;
    }

    public static function query(string $sql, array $params = []): PDOStatement
    {
        try {
            $stmt = self::getInstance()->prepare($sql);
            if (!empty($params)) {
                foreach ($params as $key => $value) {
                    $stmt->bindValue($key, $value);
                }
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            Core::log("query execution error: " . $e->getMessage(), 'ERROR');
            Core::error();
            exit;
        }
    }

    public static function fetchAll(string $sql, array $params = []): array
    {
        $stmt = self::query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
