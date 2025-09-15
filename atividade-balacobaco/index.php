<?php
include "funcoes_numeros.php";
include "funcoes_escritas.php";
include "funcoes_banco.php";

$post = $_POST;

// Inserir docente
if (isset($post['acao']) && $post['acao'] == 'inserir') {
    $novoNome = $post['novo_nome'] ?? '';
    $novoArea = $post['novo_area'] ?? '';
    $novoRa = $post['novo_ra'] ?? '';
    if ($novoNome && $novoArea && $novoRa) {
        inserirDocente($novoNome, $novoArea, $novoRa);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Excluir docente
if (isset($post['excluir_id'])) {
    excluirDocente($post['excluir_id']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Listar docentes atualizados
$docentes = listarDocentes();

// Funções de Números
$boasVindasInput = $post['nome'] ?? '';
$boasVindas = $boasVindasInput ? boasVindas($boasVindasInput) : '';

$somaA = $post['soma_a'] ?? '';
$somaB = $post['soma_b'] ?? '';
$soma = ($somaA != '' && $somaB != '') ? soma($somaA, $somaB) : '';

$parImparValor = $post['par_impar'] ?? '';
$parImpar = ($parImparValor != '') ? parOuImpar($parImparValor) : '';

$maior1 = $post['maior1'] ?? '';
$maior2 = $post['maior2'] ?? '';
$maior3 = $post['maior3'] ?? '';
$maior = ($maior1 != '' && $maior2 != '' && $maior3 != '') ? maiorNumero($maior1, $maior2, $maior3) : '';

$mediaArray = $post['media'] ?? '';
$media = $mediaArray ? media(explode(',', $mediaArray)) : '';

$tabuadaValor = $post['tabuada'] ?? '';
$tabuada = $tabuadaValor ? tabuada($tabuadaValor) : '';

$cpfInput = $post['cpf'] ?? '';
$cpfFormatado = $cpfInput ? formatarCPF($cpfInput) : '';

$real = $post['real'] ?? '';
$cotacao = $post['cotacao'] ?? '';
$conversao = ($real != '' && $cotacao != '') ? converterRealParaDolar($real, $cotacao) : '';

// Funções de Escrita
$stringInverter = $post['inverter'] ?? '';
$invertida = $stringInverter ? inverterString($stringInverter) : '';

$stringVogais = $post['vogais'] ?? '';
$qtdVogais = $stringVogais ? contarVogais($stringVogais) : '';

$senhaTamanho = $post['senha_tamanho'] ?? '';
$senha = $senhaTamanho ? gerarSenha($senhaTamanho) : '';

// Busca docente por ID
$buscaId = $post['docente_id'] ?? '';
$docente1 = $buscaId ? buscarDocentePorId($buscaId) : null;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Atividade do Balacobaco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center mb-5"> Atividade do Balacobaco </h1>

        <form method="POST">
            <!-- Funções Numéricas -->
            <div class="card mb-5 shadow-sm card-numbers">
                <div class="card-header">Funções Numéricas</div>
                <div class="card-body">
                    <div class="mb-4">
                        <label>Seu nome para boas-vindas:</label>
                        <input type="text" name="nome" class="form-control" value="<?= $boasVindasInput ?>">
                        <?php if ($boasVindas) echo "<div class='result-card'> $boasVindas </div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Soma de dois números:</label>
                        <div class="d-flex gap-2">
                            <input type="number" name="soma_a" placeholder="Número 1" value="<?= $somaA ?>" class="form-control">
                            <input type="number" name="soma_b" placeholder="Número 2" value="<?= $somaB ?>" class="form-control">
                        </div>
                        <?php if ($soma != '') echo "<div class='result-card'>Resultado: $soma</div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Par ou Ímpar:</label>
                        <input type="number" name="par_impar" value="<?= $parImparValor ?>" class="form-control">
                        <?php if ($parImpar) echo "<div class='result-card'>Resultado: $parImpar</div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Maior número entre três valores:</label>
                        <div class="d-flex gap-2">
                            <input type="number" name="maior1" placeholder="Valor 1" value="<?= $maior1 ?>" class="form-control">
                            <input type="number" name="maior2" placeholder="Valor 2" value="<?= $maior2 ?>" class="form-control">
                            <input type="number" name="maior3" placeholder="Valor 3" value="<?= $maior3 ?>" class="form-control">
                        </div>
                        <?php if ($maior != '') echo "<div class='result-card'>Resultado: $maior</div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Média de números (separados por vírgula):</label>
                        <input type="text" name="media" value="<?= $mediaArray ?>" class="form-control">
                        <?php if ($media != '') echo "<div class='result-card'>Resultado: $media</div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Tabuada de um número:</label>
                        <input type="number" name="tabuada" value="<?= $tabuadaValor ?>" class="form-control">
                        <?php if ($tabuada) echo "<div class='result-card'><pre>$tabuada</pre></div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Formatar CPF:</label>
                        <input type="text" name="cpf" value="<?= $cpfInput ?>" class="form-control" placeholder="12345678901">
                        <?php if ($cpfFormatado) echo "<div class='result-card'>$cpfFormatado</div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Converter Real para Dólar:</label>
                        <div class="d-flex gap-2">
                            <input type="number" name="real" placeholder="Valor em R$" value="<?= $real ?>" class="form-control">
                            <input type="number" step="0.01" name="cotacao" placeholder="Cotação do dólar" value="<?= $cotacao ?>" class="form-control">
                        </div>
                        <?php if ($conversao != '') echo "<div class='result-card'>Resultado: $" . number_format($conversao, 2) . " USD</div>"; ?>
                    </div>
                </div>
            </div>

            <!-- Funções de Escrita -->
            <div class="card mb-5 shadow-sm card-writing">
                <div class="card-header">Funções de Escrita</div>
                <div class="card-body">
                    <div class="mb-4">
                        <label>Inverter string:</label>
                        <input type="text" name="inverter" value="<?= $stringInverter ?>" class="form-control">
                        <?php if ($invertida) echo "<div class='result-card'>Resultado: $invertida</div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Contar vogais:</label>
                        <input type="text" name="vogais" value="<?= $stringVogais ?>" class="form-control">
                        <?php if ($qtdVogais) echo "<div class='result-card'>Resultado: $qtdVogais</div>"; ?>
                    </div>

                    <div class="mb-4">
                        <label>Gerar senha:</label>
                        <input type="number" name="senha_tamanho" placeholder="Tamanho" value="<?= $senhaTamanho ?>" class="form-control">
                        <?php if ($senha) echo "<div class='result-card'>Senha: $senha</div>"; ?>
                    </div>
                </div>
            </div>

            <!-- Banco de Dados -->
            <div class="card mb-5 shadow-sm card-database">
                <div class="card-header">Banco de Dados - Docentes</div>
                <div class="card-body">
                    <!-- Lista de docentes com botão de excluir -->
                    <h5 class="mb-3">Lista de Docentes:</h5>
                    <ul class="list-group mb-4">
                        <?php foreach ($docentes as $docente): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $docente['id'] ?> - <?= $docente['nome'] ?> (<?= $docente['area'] ?>) - RA: <?= $docente['ra_docente'] ?>
                                <button type="submit" name="excluir_id" value="<?= $docente['id'] ?>" class="btn btn-sm btn-danger">Excluir</button>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Inserir novo docente -->
                    <h5 class="mb-3">Adicionar Docente:</h5>
                    <input type="text" name="novo_nome" placeholder="Nome" class="form-control mb-2">
                    <input type="text" name="novo_area" placeholder="Área" class="form-control mb-2">
                    <input type="text" name="novo_ra" placeholder="RA" class="form-control mb-2">
                    <button type="submit" name="acao" value="inserir" class="btn btn-success w-100 mb-4">Inserir Docente</button>

                    <!-- Buscar docente por ID -->
                    <h5 class="mb-3">Buscar docente por ID:</h5>
                    <input type="number" name="docente_id" value="<?= $buscaId ?>" class="form-control mb-2">
                    <?php if ($docente1): ?>
                        <div class="result-card mt-2"><strong><?= $docente1['nome'] ?></strong> - <?= $docente1['area'] ?> - RA: <?= $docente1['ra_docente'] ?></div>
                    <?php elseif ($buscaId !== ''): ?>
                        <div class="result-card mt-2 text-danger">Docente não encontrado.</div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-light w-100">Processar Tudo</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>