<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Cep</title>
</head>

<body>
    <h3>Consulta Cep</h3>

    <button type="button" onclick="window.location.href = '../Realizado.php';" class="button-link">Lista de cadastrados</button><br>

    <br>
    <!-- Formulário para envio do CEP -->
    <form action="" method="GET">
        <label>Consultar Cep:</label>
        <input type="text" id="cep" name="cep" value="<?php echo $_GET['cep'] ?? ''; ?>" required>
        <input type="submit" value="Consultar">
    </form>

    <?php
    // Inclua o arquivo necessário (certifique-se de que o caminho esteja correto)
    require_once "../model/Cep.php";

    class ConsultaCep
    {
        public function recebeCep($numeroCep)
        {
            // Constrói a URL para a API do ViaCEP
            $url = "http://viacep.com.br/ws/" . $numeroCep . "/json/";

            // Inicializa a requisição cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna o resultado como string
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desabilita a verificação SSL (não recomendado para produção)

            // Executa a requisição e armazena o resultado
            $resultado = curl_exec($ch);

            // Fecha a conexão cURL
            curl_close($ch);

            if (!empty($resultado)) {
                // Converte o JSON para array associativo
                $retorno = json_decode($resultado, true);

                // Verifica se a chave 'logradouro' existe no array (você pode ajustar conforme as necessidades)
                if (isset($retorno)) {
                    return $retorno;
                } else {
                    echo "<p>Cep não encontrado.</p>";
                    return null;
                }
            } else {
                echo "<p>Erro ao consultar o CEP.</p>";
                return null;
            }
        }
    }

    // Se o CEP foi enviado, chama o método e armazena o resultado na variável $retorno
    if (isset($_GET['cep'])) {
        $numeroCep = $_GET['cep'];
        $consulta = new ConsultaCep();
        $retorno = $consulta->recebeCep($numeroCep);
    }
    ?>

    <!-- Exibe os dados nos campos de input somente se houver retorno -->
    <?php if (isset($retorno) && !empty($retorno)) : ?>
        <br><br>
        <label>Rua:</label>
        <input type="text" name="logradouro" value="<?php echo $retorno['logradouro'] ?? ''; ?>" readonly><br><br>

        <label>Bairro:</label>
        <input type="text" name="bairro" value="<?php echo $retorno['bairro'] ?? ''; ?>" readonly><br><br>

        <label>Cidade:</label>
        <input type="text" name="localidade" value="<?php echo $retorno['localidade'] ?? ''; ?>" readonly><br><br>

        <label>Uf:</label>
        <input type="text" name="uf" value="<?php echo $retorno['uf'] ?? ''; ?>" readonly><br><br>

        <!-- Se a API retornar 'estado' ou 'regiao', exiba-os -->
        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $retorno['estado'] ?? ''; ?>" readonly><br><br>

        <label>Regiao:</label>
        <input type="text" name="regiao" value="<?php echo $retorno['regiao'] ?? ''; ?>" readonly><br><br>

        <label>DDD:</label>
        <input type="text" name="ddd" value="<?php echo $retorno['ddd'] ?? ''; ?>" readonly><br><br>
    <?php endif; ?>

</body>

</html>