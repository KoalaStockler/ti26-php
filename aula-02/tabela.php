<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/tabela.css">
</head>
<?php
$dsn = 'mysql:dbname=db_cadastro;host=127.0.0.1';
$usuario = 'root';
$senha = '';
$conexaoBanco = new PDO($dsn, $usuario, $senha);
$scriptConsulta = 'SELECT * FROM tb_usuario';
$resultadoConsulta = $conexaoBanco->query($scriptConsulta)->fetchAll();
?>
<body class="p-4">
    <div class="container">
        <h2 class="mb-4 text-center">Lista de Usuários</h2>
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultadoConsulta as $linha) {?>
                <tr>
                    <th scope="row"> <?= $linha['id']?> </th>
                    <td><?= $linha['nome']?></td>
                    <td><?= $linha['usuario']?></td>
                    <td><?= $linha['telefone']?></td>
                    <td>
                        <button class='btn btn-primary btn-sm'><i class='bi bi-folder2-open'></i> Abrir</button>
                        <button class='btn btn-warning btn-sm text-white'><i class='bi bi-pencil-square'></i> Editar</button>
                        <button class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Deletar</button></td>
                </tr>    
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>