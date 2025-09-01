<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Personagem não encontrado.");
}

// Buscar personagem na API
$apiUrl = "https://rickandmortyapi.com/api/character/" . $id;
$data = file_get_contents($apiUrl);
$personagem = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $personagem['name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-5">
    <h1><?= $personagem['name'] ?></h1>
    <img src="<?= $personagem['image'] ?>" alt="<?= $personagem['name'] ?>" class="img-fluid mb-3">

    <ul>
        <li><strong>ID:</strong> <?= $personagem['id'] ?></li>
        <li><strong>Status:</strong> <?= $personagem['status'] ?></li>
        <li><strong>Espécie:</strong> <?= $personagem['species'] ?></li>
        <li><strong>Gênero:</strong> <?= $personagem['gender'] ?></li>
        <li><strong>Origem:</strong> <?= $personagem['origin']['name'] ?></li>
        <li><strong>Localização:</strong> <?= $personagem['location']['name'] ?></li>
    </ul>

    <form method="POST" action="salvar.php">
        <input type="hidden" name="id" value="<?= $personagem['id'] ?>">
        <input type="hidden" name="nome" value="<?= $personagem['name'] ?>">
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>

    <br>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</body>
</html>
