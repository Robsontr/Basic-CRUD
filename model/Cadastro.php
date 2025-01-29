<?php

chdir(__DIR__);  // Muda o diretório de trabalho para o diretório atual do arquivo PHP.
require_once __DIR__ . "/../banco/Banco.php";

class Cadastro
{

    private $id;
    private $nome;
    private $dataNasc;
    private $conn;

    public function setId($id)
    {

        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {

        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setDataNasc($dataNasc)
    {

        $this->dataNasc = $dataNasc;
    }

    public function getDataNasc()
    {
        return $this->dataNasc;
    }


    public function __construct()
    {
        $banco = new Banco();
        $this->conn = $banco->getConnection();
    }

    public function salvar($cadastro)
    {

        $sql = "INSERT INTO cadastro (nome, data_nasc) VALUES (:nome, :dataNasc)";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([

            ':nome' => $cadastro->getNome(),
            ':dataNasc' => $cadastro->getDataNasc()

        ]);

        echo "<meta http-equiv='refresh' content='0;url=Realizado.php'>";
        exit;
    }

    public function deletar($id)
    {
        $pdo = (new Banco())->getConnection(); // Certifique-se de que essa linha está correta no seu contexto
        $sql = "DELETE FROM cadastro WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind do parâmetro de id
        $stmt->execute();
    }

    public function atualizar($cadastro)
    {
        $sql = "UPDATE cadastro SET nome = :nome, data_nasc = :dataNasc WHERE id = :id";

        // Prepara a consulta
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $cadastro->getId(), // ID do cadastro a ser atualizado
            ':nome' => $cadastro->getNome(),
            ':dataNasc' => $cadastro->getDataNasc()
        ]);

        // Redirecionamento após a atualização
        echo "<meta http-equiv='refresh' content='0;url=Realizado.php'>";
        exit;
    }
}
