<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_RickMorty";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    http_response_code(500);
    echo "Erro de conexão: " . $conn->connect_error;
    exit;
}

$id = $_POST['id'] ?? null;
$nome = $_POST['nome'] ?? null;

if (!$id || !$nome) {
    http_response_code(400);
    echo "Dados inválidos";
    exit;
}

// 🔹 Verifica se já existe
$stmt = $conn->prepare("SELECT COUNT(*) as total FROM tb_favoritos WHERE personagem_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if ($result['total'] > 0) {
    echo "existe"; // já está no banco
    exit;
}

// 🔹 Se não existir, insere
$stmt = $conn->prepare("INSERT INTO tb_favoritos (personagem_id, nome) VALUES (?, ?)");
$stmt->bind_param("is", $id, $nome);

if ($stmt->execute()) {
    echo "ok";
} else {
    http_response_code(500);
    echo "Erro: " . $stmt->error;
}

$conn->close();
?>
