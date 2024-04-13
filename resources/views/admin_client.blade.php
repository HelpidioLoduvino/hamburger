@extends('main_admin')

@section('content')

<div class="container">
    <nav class="navbar navbar-expand-lg" style="background-color: white;">
        <h4 class="me-2" style="margin-left: 20px;">Clientes</h4>
        <div class="vertical-separator me-2"></div>

        <div class="d-flex align-items-center">
            <form class="d-flex input-group">
                <input type="search" class="form-control rounded" placeholder="Pesquisar" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <button class="btn btn-dark" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
              </form>
        </div>
    </nav>

    <div class="card card-body mt-3" style="border: 0;">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Sobrenome</th>
                        <th class="text-center">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Helpidio</td>
                        <td>Mateus</td>
                        <td>helpidio@gmail.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Josefa</td>
                        <td>Zinga</td>
                        <td>josefa@gmail.com</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Helpidio</td>
                        <td>Mateus</td>
                        <td>helpidio@gmail.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Josefa</td>
                        <td>Zinga</td>
                        <td>josefa@gmail.com</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Helpidio</td>
                        <td>Mateus</td>
                        <td>helpidio@gmail.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Josefa</td>
                        <td>Zinga</td>
                        <td>josefa@gmail.com</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Helpidio</td>
                        <td>Mateus</td>
                        <td>helpidio@gmail.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Josefa</td>
                        <td>Zinga</td>
                        <td>josefa@gmail.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="pagination-container">
            <!-- Botões de paginação serão inseridos aqui -->
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const table = document.querySelector('.table');
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const rowsPerPage = 7; // Defina o número de linhas por página
        const pageCount = Math.ceil(rows.length / rowsPerPage);

        // Função para mostrar as linhas corretas com base na página atual
        function showPage(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });
        }

        // Cria os botões de paginação
        for (let i = 1; i <= pageCount; i++) {
            const btn = document.createElement('button');
            btn.innerText = i;
            btn.addEventListener('click', function() {
                showPage(i);
            });
            document.getElementById('pagination-container').appendChild(btn);
        }

        // Mostra a primeira página por padrão
        showPage(1);
    });
</script>

@endsection
