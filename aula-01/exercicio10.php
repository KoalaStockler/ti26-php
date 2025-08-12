<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 10</title>
</head>
<body>
    <!-- Imprima os primeiros 10 números da sequência de Fibonacci utilizando um laço de repetição. -->
    <?php
    $f1 = 0;
    $f2 = 1;

    echo "Os primeiros 10 números da sequência de Fibonacci:\n";

    for ($i = 1; $i <= 10; $i++) {
        echo $f1 . " ";

        $proximo = $f1 + $f2;
        $f1 = $f2;
        $f2 = $proximo;
    }
    ?>
</body>
</html>