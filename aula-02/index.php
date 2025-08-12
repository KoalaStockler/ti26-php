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
        <div>
            <form action="./impressao.php" method="POST">
                <input type="text" placeholder="Nome" id="name" name="txtName">
                <input type="text" placeholder="Usuário" id="user" name="txtUser">
                <input type="number" placeholder="Telefone" id="tell" name="txtTell">
                <input type="password" placeholder="Senha" id="password" name="txtPassword">
                <input type="password" placeholder="Confirmar senha" id="passwordConfirm" name="txtConfirm">
                <button type="submit">Enviar</button>
            </form>
        </div>
    </section>
</body>
</html>