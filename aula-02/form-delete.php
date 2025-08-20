<?php
echo '<h1>form-delete.php</h1>';

$id = $_GET['idDelete'];

var_dump($id);

$dsn = 'mysql:dbname=db_cadastro;host=127.0.0.1';
$usuario = 'root';
$senha = '';

$conn = new PDO($dsn, $usuario, $senha);

$scriptDelete = 'DELETE FROM tb_cadastro WHERE id = :id';

$scriptPreparado = $conn->prepare($scriptDelete);
$scriptPreparado->execute([':id' => $id]);

if ($scriptPreparado->rowCount() > 0) {
    echo 'Registro apagado com sucesso!';
    header('location:tabela.php');
}else{
    echo 'Algo deu errado! Entre em contato com o @vitinho!';
}
?>