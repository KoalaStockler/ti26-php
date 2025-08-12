<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayZ</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <section class="dayz">
        <?php

        $lista = array(
            array('Item' => 'Sistema Operacional', 'Requisito' => 'Windows 10', 'Preço' => 'R$400'),
            array('Item' => 'Processador', 'Requisito' => 'Intel Core i5-4430 ou AMD FX-8320', 'Preço' => 'R$400'),
            array('Item' => 'Memória RAM', 'Requisito' => '8 GB', 'Preço' => 'R$400'),
            array('Item' => 'Placa de Vídeo', 'Requisito' => 'NVIDIA GeForce GTX 760 ou AMD R9 270X (com 2 GB de VRAM)', 'Preço' => 'R$400'),
            array('Item' => 'Armazenamento', 'Requisito' => '16 GB de espaço livre', 'Preço' => 'R$400'),
        );
        ?>

        <h1>DayZ</h1>
        <div class="imagens">
            <img src="./img/capaDayZ.jpg" alt="Capa do DayZ">
            <img src="./img/dayZthumb.png" alt="Sniper de Ghille no DayZ">
        </div>
        <p>
            DayZ é um jogo de sobrevivência hardcore em mundo aberto, onde a morte é permanente e cada decisão é crucial. O jogo coloca os jogadores em um cenário pós-soviético devastado por um vírus que transformou grande parte da população em infectados agressivos. O objetivo principal é sobreviver o máximo de tempo possível, explorando o ambiente, enfrentando desafios e interagindo com outros jogadores de maneiras imprevisíveis.
        </p>
        <h2>Requisitos mínimos:</h2>
        <table border="1">
        <thead>
        <tr>
            <th>Item</th>
            <th>Requisito</th>
            <th>Preço</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < 1; $i++) {
            for ($j = 0; $j < count($lista); $j++) {
                echo "<tr><td>{$lista[$j]['Item']}</td><td>{$lista[$j]['Requisito']}</td><td>{$lista[$j]['Preço']}</td></tr>";
            }
        }
        ?>
        </tbody>
        </table>
        <h1>Lista de exercícios de PHP</h1>
        <ul class="atividades">
            <li><a href="./exercicio01.php" target="_blank">Exercício 01</a></li>
            <li><a href="./exercicio02.php" target="_blank">Exercício 02</a></li>
            <li><a href="./exercicio03.php" target="_blank">Exercício 03</a></li>
            <li><a href="./exercicio04.php" target="_blank">Exercício 04</a></li>
            <li><a href="./exercicio05.php" target="_blank">Exercício 05</a></li>
            <li><a href="./exercicio06.php" target="_blank">Exercício 06</a></li>
            <li><a href="./exercicio07.php" target="_blank">Exercício 07</a></li>
            <li><a href="./exercicio08.php" target="_blank">Exercício 08</a></li>
            <li><a href="./exercicio09.php" target="_blank">Exercício 09</a></li>
            <li><a href="./exercicio10.php" target="_blank">Exercício 10</a></li>
            <li><a href="./exercicio11.php" target="_blank">Exercício 11</a></li>
        </ul>
    </section>
</body>
</html>
