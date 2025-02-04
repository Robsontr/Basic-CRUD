<?php

require_once "../model/Cep.php";
require_once "ConsultaCep.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $consulta = new ConsultaCep();
    $consulta->recebeCep($_POST['cep']);
}
