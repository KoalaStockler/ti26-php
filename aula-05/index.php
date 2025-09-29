<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Validação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center py-4">
                        <h3 class="mb-0">
                            <i class="bi bi-person-plus-fill me-2"></i>
                            Cadastro de Usuário
                        </h3>
                        <p class="mb-0 mt-2 opacity-75">Preencha os dados abaixo</p>
                    </div>
                    <div class="card-body p-4">
                        <form action="aux_validacao.php" method="POST" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="nome">
                                        <i class="bi bi-person me-2 text-primary"></i>Nome Completo:
                                    </label>
                                    <input class="form-control form-control-lg"
                                        type="text"
                                        name="nome"
                                        id="nome"
                                        placeholder="Digite seu nome completo">
                                    <div class="invalid-feedback">
                                        Por favor, informe seu nome completo.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold" for="idade">
                                        <i class="bi bi-calendar-heart me-2 text-primary"></i>Idade:
                                    </label>
                                    <input class="form-control form-control-lg"
                                        type="text"
                                        name="number"
                                        id="idade"
                                        placeholder="Ex: 25"
                                        min="1"
                                        max="120">
                                    <div class="invalid-feedback">
                                        Por favor, informe uma idade válida.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold" for="data_nasc">
                                        <i class="bi bi-calendar-date me-2 text-primary"></i>Data de Nascimento:
                                    </label>
                                    <input class="form-control form-control-lg"
                                        type="date"
                                        name="data_nasc"
                                        id="data_nasc">
                                    <div class="invalid-feedback">
                                        Por favor, selecione sua data de nascimento.
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    <i class="bi bi-check-circle me-2"></i>
                                    Validar Dados
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>