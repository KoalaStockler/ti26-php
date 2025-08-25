<?php
include './template/db.php';

if ($_POST) {
    $sala_id = $_POST['sala_id'];
    $docente = $_POST['docente'];
    $turma = $_POST['turma'];
    $descricao = $_POST['descricao'];
    $data_hora = $_POST['data_hora'];

    $check_sql = "SELECT * FROM reservas 
                  WHERE sala_id = '$sala_id' 
                  AND data_hora = '$data_hora'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>
                alert('⚠️ Já existe uma reserva para esta sala neste horário!');
                window.location.href = 'index.php';
              </script>";
        exit;
    }

    $sql = "INSERT INTO reservas (sala_id, docente, turma, descricao, data_hora) 
            VALUES ('$sala_id', '$docente', '$turma', '$descricao', '$data_hora')";
    $conn->query($sql);
}

header("Location: index.php");
exit;
?>
