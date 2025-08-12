<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <section class="container">
        <?php
        $nameForm = $_POST['txtName'];
        $userForm = $_POST['txtUser'];
        $tellForm = $_POST['txtTell'];
        $passwordForm = $_POST['txtPassword'];
        $passwordConfirmForm = $_POST['txtConfirm'];
        ?>
        <div>
            <form>
                <label for="">Nome:<span><?= $nameForm ?></span></label>
                <label for="">Usuário:<span><?= $userForm ?></span></label>
                <label for="">Usuário:<span><?= $tellForm ?></span></label>
                <label for="">Senha:<span><?= $passwordForm ?></span></label>
                <label for="">Confirmar senha:<span><?= $passwordConfirmForm ?></span></label>
                <button>Enviar</button>
            </form>
        </div>
    </section>
</body>
</html>