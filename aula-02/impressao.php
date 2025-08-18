    <?php
    include './template/header.php';

    $dsn = 'mysql:dbname=db_cadastro;host=127.0.0.1';
    $usuario = 'root';
    $senha = '';

    $conexaoBanco = new PDO($dsn, $usuario, $senha);

    $id = (int) $_GET['idConsulta'];

    $scriptExibir = "SELECT * FROM tb_usuario where id = $id";

    $resultadoExibir = $conexaoBanco->query($scriptExibir)->fetch();

    ?>
    <main class="conteudo-principal container d-flex justify-content-center align-items-center">
        <section class="formulario d-flex flex-column justify-content-center bg-white p-4">
            <h1 class="fs-2 text-center mb-3">Impressão</h1>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <h3 class="fs-6 text-dark">Nome</h3>
                    <span class="text-dark-emphasis fs-5"><?= $resultadoExibir['nome'] ?></span>
                </div>
                <div class="col-md-6">
                    <h3 class="fs-6 text-dark">Telefone</h3>
                    <span class="text-dark-emphasis fs-5"><?= $resultadoExibir['telefone'] ?></span>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <h3 class="fs-6 text-dark">Usuário</h3>
                    <span class="text-dark-emphasis fs-5"><?= $resultadoExibir['usuario'] ?></span>
                </div>
                <div class="col-md-6">
                    <h3 class="fs-6 text-dark">Senha</h3>
                    <span class="text-dark-emphasis fs-5"><?= $resultadoExibir['senha'] ?></span>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <h3 class="fs-6 text-dark">Confirmar Senha</h3>
                    <span class="text-dark-emphasis fs-5"><?= $resultadoExibir['senha']  ?></span>
                </div>
            </div>

            <div class="grouo-btn d-flex justify-content-between">
                <a href="./tabela.php" class="btn btn-Light">Voltar</a>
                <a class="btn btn-primary">Enviar</a>
            </div>
        </section>
    </main>
<?php
include './template/footer.php';
?>