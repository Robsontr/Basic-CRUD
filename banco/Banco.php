<?php

class Banco
{
    private $host = 'localhost';
    private $db_name = 'teste';  // Nome do banco de dados
    private $db_user = 'postgres'; // Usuário do banco de dados
    private $db_pass = 'admin'; // Senha do banco de dados
    private $pdo;

    public function __construct()
    {
        try {
            // Conecta ao banco de dados PostgreSQL
            $this->pdo = new PDO("pgsql:host=$this->host;port=5433;dbname=$this->db_name", $this->db_user, $this->db_pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            // echo "Conectado ao banco de dados!!!";
        } catch (PDOException $e) {
            echo "Falha ao conectar ao banco de dados. <br/>";
            die($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
