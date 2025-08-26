<?php
include './template/db.php';

if(isset($_POST['id'])){
    $id = (int)$_POST['id'];
    $conn->query("DELETE FROM tb_reservas WHERE sala_id = $id");
    $conn->query("DELETE FROM tb_salas WHERE id = $id");
}

header("Location: index.php");
exit;
?>
