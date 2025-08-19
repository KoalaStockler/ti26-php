<?php

echo '<h1 class="text-center">Form-cadastro.php</h1>';
var_dump($_POST);

$formNome           = $_POST['txtNome'];
$formTelefone       = $_POST['txtTelefone'];
$formUsuario        = $_POST['txtUsuario'];
$formSenha          = $_POST['txtSenha'];
$formConfirmarSenha = $_POST['txtConfirmarSenha'];

$dsn      = 'mysql:dbname=db_cadastro;host=127.0.0.1';
$usuario  = 'root';
$password = '';

$conn = new PDO($dsn, $usuario, $password);

$scriptCadastro = "";