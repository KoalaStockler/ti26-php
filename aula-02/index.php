<?php
include './template/header.php';
?>

if (isset($_GET['erro']) && $_GET['erro'] == 'sim') {
    echo '<div class="alert alert-danger" role="alert">
        A senha que você digitou não confere.
    </div>'
}

<main class="conteudo-principal container d-flex justify-content-center align-items-center">
    <section class="formulario bg-white p-4">
        <h1 class="fs-2 text-center">Formulario</h1>
        <form action="./form-cadastro.php" method="POST">
            <div class="mb-3">
                <label for="txtNome" class="form-label">Nome</label>
                <input name="txtNome" type="text" class="form-control" id="txtNome" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="txtTelefone" class="form-label">Telefone</label>
                <input name="txtTelefone" type="numeber" class="form-control" id="txtTelefone" placeholder="(xx) xxxxx-xxxx" required>
            </div>
            <div class="mb-3">
                <label for="txtUsuario" class="form-label">Usuario</label>
                <input name="txtUsuario" type="text" class="form-control" id="txtUsuario" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="txtSenha" class="form-label">Senha</label>
                <input name="txtSenha" type="password" class="form-control" id="txtSenha" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="txtConfirmarSenha" class="form-label">Confirmar Senha</label>
                <input name="txtConfirmarSenha" type="password" class="form-control" id="txtConfirmarSenha" placeholder="" required>
            </div>
            <div class="group-button d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </section>
</main>
<?php
include './template/footer.php';
?>