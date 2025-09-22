<?php
include './class/Animais.php';

$animais = new Animais();

$resul = $animais->consultarAnimaisById(4);

if($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['cadastro'])){
    $nomeAnimal = $_POST['nome_animal'];
    $localTemp = $_FILES['foto_animal']['tmp_name'];
    $nomeArquivo = $_FILES['foto_animal']['name'];

    $tipoArquivo = explode('.', $nomeArquivo);
    $tipoArquivo = '.' . end($tipoArquivo);

    $novoNome = uniqid() . date('YmdHis') . $tipoArquivo;

    $caminho_arquivo = 'animais/' . $novoNome;

    if(move_uploaded_file($localTemp, './img/' . $caminho_arquivo)){
        $animais->cadastroAnimais($nomeAnimal, $novoNome, $tipoArquivo, $caminho_arquivo);
        echo '<h1>Imagem salva com sucesso!</h1>';
    }
}