<?php
echo '<h1>aux_validacao.php</h1>';

function fnValidarNomeCompleto(string $nome): bool
{
    if ($nome == '') {
        return false;
    }

    $validos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ';

    for ($i = 0; $i < mb_strlen($nome); $i++) {
        $char = mb_substr($nome, $i, 1);
        if (mb_strpos($validos, $char) === false) {
            return false;
        }
    }

    if (str_word_count($nome) < 2) {
        return false;
    }

    return true;
}

function fnValidarIdade(int|string $number): bool
{
    if (!ctype_digit((string)$number)) {
        return false;
    }

    return $number >= 18 && $number <= 100;
}

function fnValidarDataNascimento(string $dataNascimento, int|string $idade): bool
{
    if (empty($dataNascimento) || !ctype_digit((string)$idade)) {
        return false;
    }

    $dataObj = DateTime::createFromFormat('Y-m-d', $dataNascimento);
    if (!$dataObj) {
        return false;
    }

    $hoje = new DateTime();
    $idadeCalculada = $hoje->diff($dataObj)->y;

    return ((int)$idade == $idadeCalculada);
}


// validando se o arquivo foi chamado atraves do post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome   = $_POST['nome'] ?? '';
    $idade  = $_POST['number'] ?? '';
    $data   = $_POST['data_nasc'] ?? '';

    $valNome  = fnValidarNomeCompleto($nome);
    $valIdade = fnValidarIdade((int)$idade);
    $valData  = fnValidarDataNascimento($data, $idade);

    echo "<h2>Resultado da Validação</h2>";
    echo "<ul>";
    echo "<li><strong>Nome:</strong> "  . ($valNome  ? "✅ válido" : "❌ inválido") . "</li>";
    echo "<li><strong>Idade:</strong> " . ($valIdade ? "✅ válido" : "❌ inválido") . "</li>";
    echo "<li><strong>Data de Nascimento:</strong> "  . ($valData  ? "✅ bate com a idade" : "❌ não bate com a idade") . "</li>";
    echo "</ul>";
}

// impede que pessoas abram o arquivo diretamente
if ($_SERVER['REQUEST_METHOD'] != 'POST' && empty($_GET)) {
    header('location:./');
}
