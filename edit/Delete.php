<?php
require_once __DIR__ . "/../model/Cadastro.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Criando uma instância da classe Cadastro
    $delete = new Cadastro();

    // Chama o método de deletação
    $delete->deletar($id);

    // Verifica se o registro foi realmente excluído, verificando o número de linhas afetadas
    $pdo = (new Banco())->getConnection(); // Conecte-se ao banco para verificar a exclusão
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM cadastro WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Se o número de registros encontrados for zero, a exclusão foi bem-sucedida
    if ($stmt->fetchColumn() == 0) {
        header("Location: ../Realizado.php");
        exit();
    } else {
        echo "Erro ao deletar cadastro!";
    }
}
