<?php
include './template/db.php';

if ($_POST) {
    $id = $_POST['id'];
    $conn->query("DELETE FROM tb_reservas WHERE id = $id");
}

header("Location: index.php");
exit;
?>
