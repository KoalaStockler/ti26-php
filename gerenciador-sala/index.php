<?php include './template/db.php'; 

$sql = "SELECT s.id, s.nome, r.id AS reserva_id, r.docente, r.turma, r.descricao, r.data_hora
        FROM tb_salas s
        LEFT JOIN reservas r ON s.id = r.sala_id
        ORDER BY s.id ASC";
$result = $conn->query($sql);

$salas = $conn->query("SELECT * FROM tb_salas ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Salas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center flex-grow-1">Gerenciador de Salas</h1>
            <button class="btn btn-success ms-3" data-bs-toggle="modal" data-bs-target="#reservaModal">Reservar</button>
        </div>

        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Sala</th>
                    <th>Ocupação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): 
                    $ocupacao = $row['reserva_id'] ? $row['docente'] . " - " . $row['turma'] : "VAZIA";
                ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nome']); ?></td>
                        <td><?= htmlspecialchars($ocupacao); ?></td>
                        <td>
                            <?php if ($row['reserva_id']): ?>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#consultarModal<?= $row['reserva_id']; ?>">Consultar</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirModal<?= $row['reserva_id']; ?>">Excluir</button>
                            <?php else: ?>
                                <span class="text-muted">Sem ações</span>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <!-- Modal Consultar -->
                    <?php if ($row['reserva_id']): ?>
                        <div class="modal fade" id="consultarModal<?= $row['reserva_id']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Detalhes da Reserva</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Docente:</strong> <?= htmlspecialchars($row['docente']); ?></p>
                                        <p><strong>Turma:</strong> <?= htmlspecialchars($row['turma']); ?></p>
                                        <p><strong>Descrição:</strong> <?= htmlspecialchars($row['descricao']); ?></p>
                                        <p><strong>Data e Hora:</strong> <?= date('d/m/Y H:i', strtotime($row['data_hora'])); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Excluir -->
                        <div class="modal fade" id="excluirModal<?= $row['reserva_id']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Excluir Reserva</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza que deseja excluir a reserva de <b><?= htmlspecialchars($row['docente']); ?> - <?= htmlspecialchars($row['turma']); ?></b>?
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="excluir.php">
                                            <input type="hidden" name="id" value="<?= $row['reserva_id']; ?>">
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                        </form>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Reservar -->
    <div class="modal fade" id="reservaModal" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="reserva.php">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Reservar Sala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Sala</label>
                        <select class="form-select" name="sala_id" required>
                            <option value="">Selecione</option>
                            <?php while ($s = $salas->fetch_assoc()): ?>
                                <option value="<?= $s['id']; ?>"><?= htmlspecialchars($s['nome']); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Docente</label>
                        <select class="form-select" name="docente" required>
                            <option value="">Selecione</option>
                            <option>Paulo</option>
                            <option>Vagner</option>
                            <option>Guto</option>
                            <option>Frank</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Turma</label>
                        <select class="form-select" name="turma" required>
                            <option value="">Selecione</option>
                            <option>TI24</option>
                            <option>TI26</option>
                            <option>Backend</option>
                            <option>TI22</option>
                            <option>TI20</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control" name="descricao" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data e Hora</label>
                        <input type="datetime-local" class="form-control" name="data_hora" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Reservar</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
