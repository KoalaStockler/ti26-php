<?php
include './template/header.php';

$dsn = 'mysql:dbname=db_cadastro;host=127.0.0.1';
$usuario = 'root';
$senha = '';

$conexaoBanco = new PDO($dsn, $usuario, $senha);

$scriptConsulta = 'SELECT * FROM tb_cadastro';

$resultadoConsulta = $conexaoBanco->query($scriptConsulta)->fetchAll();

?>
<main class="conteudo-principal container d-flex justify-content-center align-items-center">
    <section class="formulario bg-white p-4">
        <h1 class="fs-2 text-center">Tabela de usuario</h1>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Ações</th>
                    </tr>
                <tbody class="text-center">
                    <?php foreach ($resultadoConsulta as $linha) { ?>
                        <tr>
                            <th scope="row"><?= $linha['id'] ?></th>
                            <td><?= $linha['nome'] ?></td>
                            <td><?= $linha['telefone'] ?></td>
                            <td><?= $linha['usuario'] ?></td>
                            <td>
                                <a href="./impressao.php?idConsulta=<?= $linha['id'] ?>" class="btn btn-primary btn-sm">Abrir</a>
                                <a class="btn btn-warning btn-sm">Editar</a>
                                <a class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php
include './template/footer.php';
?>