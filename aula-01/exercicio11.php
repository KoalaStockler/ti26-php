<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 11</title>
</head>
<body>
    <!-- Inverter uma String, implemente um programa que inverte uma String fornecida pelo usuário utilizando um laço de repetição. -->
    <?php
    $entrada = "keno";

    $invertida = "";

    for ($i = strlen($entrada) - 1; $i >= 0; $i--) {
        $invertida .= $entrada[$i];
    }

    echo "String invertida: " . $invertida . PHP_EOL;
    ?>
</body>
</html>