<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 07</title>
</head>
<body>
    <!-- Escreva um programa que verifique se uma letra fornecida pelo usuário é uma vogal ou uma consoante. -->
    <?php
    $letra = "k";

    if ($letra == "a" or $letra == "e" or $letra == "i" or $letra == "o" or $letra == "u"){
        echo "A letra $letra é uma vogal";
    }else{
        echo "A letra $letra é uma consoante";
    }
    ?>
</body>
</html>