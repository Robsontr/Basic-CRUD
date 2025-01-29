<?php

require_once 'model/Cadastro.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cadastro = new Cadastro();
    $cadastro->setId($_POST['id']);
    $cadastro->setNome($_POST['nome']);
    $cadastro->setDataNasc($_POST['data_nasc']);

    $cadastro->atualizar($cadastro);
}
