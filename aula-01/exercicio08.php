<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 08</title>
</head>
<body>
    <!-- Escreva um programa que leia um mês do ano e informe quantos dias ele tem. -->
    <?php 
    $mes = 2;
  
    switch($mes){
        case 1: case 3: case 5:
        case 7: case 8: case 10: case 12:
        echo "Mês $mes tem 31 dias";
        break;
        case 4: case 6:
        case 9: case 11:
        echo "Mês $mes tem 30 dias";
        break;   
        case 2:
        echo "Mês $mes tem 28 dias";
        break;
        default:
        echo "Mês inexistente";
    }
    ?>
</body>
</html>