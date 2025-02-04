<!DOCTYPE html>
<html lang="pt">

<?php
require_once "model/Cadastro.php";
require_once "edit/Delete.php";

// Supondo que $pdo seja sua conexão ao banco de dados
$pdo = (new Banco())->getConnection(); // Certifique-se de que essa linha está correta no seu contexto

$sql = "SELECT * FROM cadastro";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Recupera os dados como um array associativo

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizado</title>

</head>

<body>

    <h2>Lista de Cadastros</h2>
    <div style="display: flex; align-items: flex-start;">
        <table border="1" style="margin-top: 50px; margin-left: -175px;">
            <button type="button" onclick="window.location.href = 'index.html';" class="button-link">Cadastrar</button> <button type="button" onclick="window.location.href = 'consultaCep/ConsultaCep.php';" class="button-link">Consultar Cep</button><br>


            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td><?php echo htmlspecialchars($row['data_nasc']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Botões de exclusão fora da tabela -->
        <div style="margin-top: 68px; ">
            <?php foreach ($resultados as $row): ?>
                <div style="display: flex; gap: 7px; margin-bottom: -8px; margin-left: 5px; ">
                    <form action="edit/Delete.php" method="POST" style="margin-top: 10px;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                        <button type="submit" style="height: 22px;">Excluir</button>
                    </form>

                    <form action="edit/Edit.php" method="POST" style="margin-top: 10px; ">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                        <button type="submit" style="height: 22px;">Editar</button>
                    </form>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

</body>



</html>