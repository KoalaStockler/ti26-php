<?php
include './template/db.php';

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = $conn->real_escape_string($_POST['nome']);
    $conn->query("INSERT INTO tb_salas (nome) VALUES ('$nome')");
}

header("Location: index.php");
exit;
?>
