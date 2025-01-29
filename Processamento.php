<?php

require_once 'model/Cadastro.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cadastro = new Cadastro();
    $cadastro->setNome($_POST['nome']);
    $cadastro->setDataNasc($_POST['dataNasc']);

    $cadastro->salvar($cadastro);
}
