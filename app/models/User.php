<?php
class User {
    private $db;

    public function __construct() {
        // Obtém a instância do banco de dados
        $this->db = Database::getInstance()->getConnection();
    }

   
    // Método para registrar um novo usuário
    public function register($nome, $email,$senha){
         //criptograva a senha antes de salvar 
         $senhaHash = password_hash($senha,PASSWORD_DEFAULT);
         // Prepara o SQL para inserir o usuário
         $sql="INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $this->db->prepare($sql);
        
        // Executa o SQL com os dados
     return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaHash
        ]);
    }
    //Método para buscar usuário por email
    
    public function findByEmail($email)
    {
        // Prepara o SQL para buscar o usuário pelo email
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        
        // Executa a query
        $stmt->execute([':email' => $email]);
        
        // Retorna o usuário encontrado ou null se não existir
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }   
}