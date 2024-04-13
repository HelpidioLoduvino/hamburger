@extends('main_admin')

@section('content')


<div class="container">
    <nav class="navbar navbar-expand-lg" style="background-color: white;">
        <h4 class="me-2" style="margin-left: 20px;">Encomendas</h4>
        <div class="vertical-separator"></div>
    </nav>

    <div class="card card-body mt-3" style="border-radius: 0;">
        <div style="max-height: 500px; overflow: auto; overflow-x: hidden;">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link active actived" aria-current="page" href="#" onclick="showAll(this)">Todas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link actived" href="#" onclick="showUnattended(this)">Por Atender</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link actived" href="#" onclick="showAttended(this)">Atendido</a>
                </li>
            </ul>

            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead class="table-dark" id="fixed-header">
                        <tr class="unattended">
                            <th class="text-center">ID</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Produto</th>
                            <th class="text-center">Unidade</th>
                            <th class="text-center">Preço</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="unattended">
                            <td>40</td>
                            <td>Josefa Zinga</td>
                            <td>Hamburger <br> Gasosa</td>
                            <td>2 <br> 1 </td>
                            <td>2000,00</td>
                            <td>Por Atender</td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-success" value="Atender">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="pagination-container">
                <!-- Botões de paginação serão inseridos aqui -->
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const table = document.querySelector('.table');
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const rowsPerPage = 4; // Defina o número de linhas por página
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

<script>
    function showAll(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.querySelectorAll('tr').forEach(function(row) {
            row.style.display = '';
        });
    }

    function showUnattended(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.querySelectorAll('tr').forEach(function(row) {
            if (row.classList.contains('unattended')) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function showAttended(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.querySelectorAll('tr').forEach(function(row) {
            if (row.classList.contains('attended')) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function resetActiveTabs() {
        document.querySelectorAll('.actived').forEach(function(item) {
            item.classList.remove('active');
        });
    }
</script>

@endsection
