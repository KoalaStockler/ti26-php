<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rick e Morty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Rick e Morty</h1>

        <!-- Barra de Pesquisa -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 d-flex gap-2 flex-column flex-sm-row">
                <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar..." />
                <select id="filterSelect" class="form-select" style="max-width: 200px">
                    <option value="name">Nome</option>
                    <option value="id">ID</option>
                    <option value="status">Status</option>
                    <option value="species">Espécie</option>
                    <option value="gender">Gênero</option>
                    <option value="origin">Origem</option>
                    <option value="location">Localização</option>
                </select>
            </div>
        </div>

        <!-- Cards -->
        <div id="personagem-container" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4"></div>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal-overlay">
        <div class="modal-content-custom">
            <div class="modal-header-custom text-center">
                <h2 id="modalNome" class="mb-3"></h2>
                <span class="close-btn" onclick="fecharModal()">&times;</span>
            </div>

            <div class="modal-body-custom text-center">
                <img id="modalImagem" src="" alt="" class="img-fluid mb-3" style="border-radius: 12px; max-height: 250px; object-fit: cover;">

                <div class="modal-info">
                    <div class="card-subtitle mb-2">ID #<span id="modalId"></span></div>
                    <div class="info-badges mb-2">
                        <span id="modalStatus" class="badge-custom"></span>
                        <span id="modalEspecie" class="badge-custom bg-secondary text-white"></span>
                        <span id="modalGenero" class="badge-custom bg-secondary text-white"></span>
                    </div>
                    <div class="text-info-line"><strong>Origem:</strong> <span id="modalOrigem"></span></div>
                    <div class="text-info-line"><strong>Localização:</strong> <span id="modalLocalizacao"></span></div>
                </div>
            </div>

            <div class="modal-footer-custom">
                <form id="formSalvar" class="m-0">
                    <input type="hidden" name="id" id="formId">
                    <input type="hidden" name="nome" id="formNome">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
                <button class="btn btn-secondary" onclick="fecharModal()">Fechar</button>
            </div>

            <!-- Mensagem de sucesso -->
            <div id="mensagemSucesso" class="alert alert-success mt-3 text-center" style="display:none;">
                ✅ Personagem salvo com sucesso!
            </div>

        </div>
    </div>


    <script>
        const container = document.getElementById('personagem-container');
        const searchInput = document.getElementById('searchInput');
        const filterSelect = document.getElementById('filterSelect');
        let personagens = [];

        function procurarPersonagem(id) {
            return fetch("https://rickandmortyapi.com/api/character/" + id)
                .then(resposta => resposta.json());
        }

        function statusBadgeClass(status) {
            if (status === "Alive") return "badge-status-alive";
            if (status === "Dead") return "badge-status-dead";
            return "badge-status-unknown";
        }

        function renderizarPersonagens(lista) {
            container.innerHTML = '';

            lista.forEach(personagem => {
                const {
                    name,
                    id,
                    image,
                    status,
                    species,
                    gender,
                    origin,
                    location
                } = personagem;

                const coluna = document.createElement('div');
                coluna.className = 'col';

                coluna.innerHTML = `
                    <div class="card h-100 personagem-card" data-id="${id}">
                        <img src="${image}" alt="${name}" class="img-fluid">
                        <div class="card-body text-center">
                            <div class="card-subtitle">ID #${id}</div>
                            <h5 class="card-title">
                                ${name}
                                <span class="badge-custom ${statusBadgeClass(status)}">${status}</span>
                            </h5>
                            <div class="info-badges">
                                <span class="badge-custom bg-secondary text-white">${species}</span>
                                <span class="badge-custom bg-secondary text-white">${gender}</span>
                            </div>
                            <div class="text-info-line"><strong>Origem:</strong> ${origin.name}</div>
                            <div class="text-info-line"><strong>Localização:</strong> ${location.name}</div>
                        </div>
                    </div>
                `;

                // Clique abre modal
                coluna.querySelector(".personagem-card").addEventListener("click", () => abrirModal(personagem));

                container.appendChild(coluna);
            });
        }

        async function carregarPersonagem() {
            for (let i = 1; i <= 30; i++) { // pode aumentar para 826
                const personagem = await procurarPersonagem(i);
                personagens.push(personagem);
            }
            renderizarPersonagens(personagens);
        }

        function aplicarFiltro() {
            const termo = searchInput.value.toLowerCase();
            const filtro = filterSelect.value;

            const filtrados = personagens.filter(p => {
                if (filtro === "name") return p.name.toLowerCase().includes(termo);
                if (filtro === "id") return p.id.toString().includes(termo);
                if (filtro === "status") return p.status.toLowerCase().includes(termo);
                if (filtro === "species") return p.species.toLowerCase().includes(termo);
                if (filtro === "gender") return p.gender.toLowerCase().includes(termo);
                if (filtro === "origin") return p.origin.name.toLowerCase().includes(termo);
                if (filtro === "location") return p.location.name.toLowerCase().includes(termo);
                return true;
            });

            renderizarPersonagens(filtrados);
        }

        function abrirModal(personagem) {
            document.getElementById("modalNome").textContent = personagem.name;
            document.getElementById("modalImagem").src = personagem.image;
            document.getElementById("modalId").textContent = personagem.id;
            document.getElementById("modalStatus").textContent = personagem.status;
            document.getElementById("modalEspecie").textContent = personagem.species;
            document.getElementById("modalGenero").textContent = personagem.gender;
            document.getElementById("modalOrigem").textContent = personagem.origin.name;
            document.getElementById("modalLocalizacao").textContent = personagem.location.name;

            // Preenche form
            document.getElementById("formId").value = personagem.id;
            document.getElementById("formNome").value = personagem.name;

            document.getElementById("modal").style.display = "flex";
        }

        function fecharModal() {
            document.getElementById("modal").style.display = "none";
        }

        searchInput.addEventListener('input', aplicarFiltro);
        filterSelect.addEventListener('change', aplicarFiltro);

        carregarPersonagem();

        function abrirModal(personagem) {
            document.getElementById("modalNome").textContent = personagem.name;
            document.getElementById("modalImagem").src = personagem.image;
            document.getElementById("modalId").textContent = personagem.id;

            let statusSpan = document.getElementById("modalStatus");
            statusSpan.textContent = personagem.status;
            statusSpan.className = "badge-custom " + statusBadgeClass(personagem.status);

            document.getElementById("modalEspecie").textContent = personagem.species;
            document.getElementById("modalGenero").textContent = personagem.gender;
            document.getElementById("modalOrigem").textContent = personagem.origin.name;
            document.getElementById("modalLocalizacao").textContent = personagem.location.name;

            // Preenche form
            document.getElementById("formId").value = personagem.id;
            document.getElementById("formNome").value = personagem.name;

            document.getElementById("modal").style.display = "flex";
        }

        // Captura o submit do form sem recarregar a página
        document.getElementById("formSalvar").addEventListener("submit", async function(e) {
            e.preventDefault();

            const id = document.getElementById("formId").value;
            const nome = document.getElementById("formNome").value;

            try {
                let resposta = await fetch("salvar.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `id=${encodeURIComponent(id)}&nome=${encodeURIComponent(nome)}`
                });

                let texto = await resposta.text();
                let mensagem = document.getElementById("mensagemSucesso");

                if (texto.includes("ok")) {
                    mensagem.textContent = "✅ Personagem salvo com sucesso!";
                    mensagem.className = "alert alert-success mt-3 text-center";
                    mensagem.style.display = "block";

                    setTimeout(() => {
                        mensagem.style.display = "none";
                    }, 3000);
                } else if (texto.includes("existe")) {
                    mensagem.textContent = "⚠️ Este personagem já foi salvo!";
                    mensagem.className = "alert alert-warning mt-3 text-center";
                    mensagem.style.display = "block";

                    setTimeout(() => {
                        mensagem.style.display = "none";
                    }, 3000);
                } else {
                    alert("Erro ao salvar: " + texto);
                }
            } catch (error) {
                alert("Erro de conexão com o servidor!");
            }
        });
    </script>
</body>

</html>