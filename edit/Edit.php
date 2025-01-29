<!DOCTYPE html>
<html lang="pt">

<?php
require_once "../banco/Banco.php";

require_once __DIR__ . "/../model/Cadastro.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Supondo que $pdo seja sua conexão ao banco de dados
    $pdo = (new Banco())->getConnection(); // Certifique-se de que essa linha está correta no seu contexto

    $sql = "SELECT * FROM cadastro WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Vincula o parâmetro :id à variável $id
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Recupera os dados como um array associativo
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Atualização</h2>
    <div style="margin-left: 200px; margin-top: -20px;">
        <button type="button" onclick="window.history.back();" class="button-link">Voltar</button>
    </div>

    <?php if (isset($resultados) && !empty($resultados)): ?>
        <table border="1">

            <tbody>
                <?php foreach ($resultados as $row): ?>
                    <form action="../Processamento2.php" method="POST">

                        <label>Id:</label><br>
                        <input type="text" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" readonly hidden>
                        <input type="text" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" readonly disabled><br><br>
                        <label>Nome:</label><br>
                        <input type="text" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>"><br><br>
                        <label>Data Nascimento:</label><br>
                        <input type="date" name="data_nasc" value="<?php echo htmlspecialchars($row['data_nasc']); ?>"><br>

                        <div style="margin-top: 20px; display: inline-block;">
                            <button type="submit">Atualizar</button>
                        </div>
                    </form>

                <?php endforeach; ?>
            </tbody>



        </table>
    <?php else: ?>
        <p>Nenhum resultado encontrado.</p>
    <?php endif; ?>
</body>

</html>