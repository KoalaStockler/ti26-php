<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 01</title>
</head>
<body>
    <!-- Escreva um programa que verifique se um número fornecido pelo usuário é positivo, negativo ou zero. -->
    <?php
    $numero = 0;
    
    if ($numero < 0){
        echo "O número $numero é negativo";
    }else if ($numero > 0){
        echo "O número $numero é positivo";
    }else{
        echo "O número escolhido foi ZERO!!!";
    }
    ?>
</body>
</html>