<?php
echo '<h1>Aula 03</h1>';

function calculaNumero($num1, $num2)
{
    $resultado = $num1 + $num2;

    echo "A soma de {$num1} + {$num2} = " . $resultado;
}

function consultarTabelas($tabela = 'tb_turma', $conn2) : string
{
    if (empty($conn2) || $conn2 == '') {
        echo 'Conexão<br>';

        return false;
    }


    $script = 'SELECT * FROM ' . $tabela;

    $res = $conn2->query($script)->fetch();

    echo '<pre>';
    var_dump($res);

    return 'Banco consultado com sucesso!';
}

function conexao()
{
    $dsn = "mysql:dbname=db_gerenciador_sala;host=localhost";
    $usuario = 'root';
    $senha = '';

    return new PDO($dsn, $usuario, $senha);
}

consultarTabelas('tb_docente', conexao());
consultarTabelas('tb_reserva_sala', conexao());
consultarTabelas('tb_sala', conexao());
consultarTabelas();

calculaNumero(22, 12);
