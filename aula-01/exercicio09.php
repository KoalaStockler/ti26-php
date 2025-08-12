<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 09</title>
</head>
<body>
    <!-- Escreva um programa que leia o salário de um funcionário e aplique um aumento de acordo com a seguinte regra: salários menores que R$1000 recebem 20% de aumento, entre R$1000 e R$2000 recebem 15%, e acima de R$2000 recebem 10%. -->
    <?php
    $salario = 3000;
    $aumento;

    if ($salario <= 1000){
        $aumento = $salario + (0.2 * $salario);
        echo "Seu salário aumentou para: $aumento";
    }else if ($salario <= 2000){
        $aumento = $salario + (0.15 * $salario);
        echo "Seu salário aumentou para: $aumento";
    }else{
        $aumento = $salario + (0.1 * $salario);
        echo "Seu salário aumentou para: $aumento";
    }
    ?>
</body>
</html>