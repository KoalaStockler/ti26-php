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

$scriptCadastro = "INSERT INTO 
    tb_cadastro (
        nome, 
        telefone, 
        usuario, 
        senha
    ) 
    VALUES (
        :nome, 
        :telefone, 
        :usuario, 
        :senha
    )";

$scriptPreparado = $conn->prepare($scriptCadastro);

$scriptPreparado->execute([
        ':nome' => $formNome,
        ':telefone' => $formTelefone,
        ':usuario' => $formUsuario,
        ':senha' => $formSenha
    ]);