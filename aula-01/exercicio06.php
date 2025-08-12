<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 06</title>
</head>
<body>
    <!-- Calcule a soma de todos os números de 1 a 100 utilizando um laço de repetição.(5050) -->
    <?php
    $numero = 1;
    $index = 2;
    $soma = $numero + $index;

    while ($index < 100){
        $numero = $numero + 1;
        $index = $index + 1;
        $soma = $soma + $index;
    }

    echo "A soma dos inteiros de 1 à 100 é: $soma";
    ?>
</body>
</html>