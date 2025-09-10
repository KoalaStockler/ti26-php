<?php
// Conexão com o banco
function conectarBanco()
{
    $host = "localhost";
    $dbname = "db_gerenciador_sala";
    $user = "root";
    $pass = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
}

// Inserir docente
function inserirDocente($nome, $area, $ra_docente)
{
    $pdo = conectarBanco();
    $sql = "INSERT INTO tb_docente (nome, area, ra_docente) VALUES (:nome, :area, :ra)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        'nome' => $nome,
        'area' => $area,
        'ra'   => $ra_docente
    ]);
}

// Listar docentes
function listarDocentes()
{
    $pdo = conectarBanco();
    $sql = "SELECT * FROM tb_docente";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// Buscar docente por ID
function buscarDocentePorId($id)
{
    $pdo = conectarBanco();
    $sql = "SELECT * FROM tb_docente WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Excluir docente (exclui reservas relacionadas primeiro)
function excluirDocente($id)
{
    $pdo = conectarBanco();

    // Excluir reservas relacionadas
    $sqlReservas = "DELETE FROM tb_reserva_sala WHERE docente_id = :id";
    $stmtReservas = $pdo->prepare($sqlReservas);
    $stmtReservas->execute(['id' => $id]);

    // Excluir docente
    $sqlDocente = "DELETE FROM tb_docente WHERE id = :id";
    $stmtDocente = $pdo->prepare($sqlDocente);
    return $stmtDocente->execute(['id' => $id]);
}
