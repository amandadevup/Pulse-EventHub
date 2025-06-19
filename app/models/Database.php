<?php
// Classe responsável por gerenciar a conexão com o banco de dados usando PDO
class Database {
    // Armazena a instância única da classe (Singleton)
    private static $instance = null;
    // Armazena a conexão PDO
    private $conn;

    // Dados de conexão (pegos do config.php)
    private $host = DB_HOST;
    private $db = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    // Construtor privado: impede criar instâncias diretamente
    private function __construct() {
        try {
            // Cria a conexão PDO com o banco MySQL
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4",
                $this->user,
                $this->pass
            );
            // Define o modo de erro para exceção (melhor para debug)
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Se der erro, exibe a mensagem
            die('Erro na conexão: ' . $e->getMessage());
        }
    }

    // Retorna a instância única da classe (Singleton)
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Retorna a conexão PDO para ser usada em queries
    public function getConnection() {
        return $this->conn;
    }
}