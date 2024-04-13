@extends('main_admin')

@section('content')

<div class="row">
    <div class="col-md-8">
        <nav class="navbar navbar-expand-lg" style="background-color: white;">
            <h4 class="me-2" style="margin-left: 20px;">Inicio</h4>
            <div class="vertical-separator"></div>
        </nav>

        <div class="card card-body mt-3" style="border-radius: 0;">
            <h5 class="card-title d-flex justify-content-center">Vendas por Mês</h5>
            <canvas id="graficoVendas"></canvas>
        </div>

        <div class="card card-body mt-3" style="border-radius: 0;">
            <h5 class="card-title d-flex justify-content-center">Geral</h5>
            <div class="d-flex">
                <i class="fa-solid fa-users me-2 mt-1" style="color: goldenrod;"></i>
                <p class="card-title mb-3">Clientes: 50</p>
            </div>
            <div class="d-flex">
                <i class="fas fa-circle-arrow-down me-2 mt-1" style="color: orange;"></i>
                <p class="card-title mb-3">Encomendas: 7</p>
            </div>
            <div class="d-flex">
                <i class="fa-solid fa-bag-shopping me-2 mt-1" style="color: green;"></i>
                <p class="card-title">Vendas: 10</p>
            </div>

        </div>
    </div>
    <div class="col">
        <div class="card card-body" style="border-radius: 0;">
            <h5 class="title" style="color: blue;">Calendário</h5>
            <span id="currentMonth"></span>
            <table class="calendar-table mt-3">
                <thead>
                    <tr>
                        <th>Dom</th>
                        <th>Seg</th>
                        <th>Ter</th>
                        <th>Qua</th>
                        <th>Qui</th>
                        <th>Sext</th>
                        <th>Sáb</th>
                    </tr>
                </thead>
                <tbody id="calendar-body">
                    <!-- Dias do mês serão adicionados dinamicamente aqui -->
                </tbody>
            </table>
        </div>

        <div class="card card-body mt-3" style="border-radius: 0;">
            <h5 class="d-flex justify-content-center" id="clock"></h5>
        </div>

        @if ($admin)
        <div class="card card-body mt-3" style="border-radius: 0;">
            <h5 class="card-title d-flex justify-content-center">Detalhes do perfil</h5>
            <p class="card-text mt-3">Nome: {{$admin->name}}</p>
            <p class="card-text">Sobrenome: {{$admin->surname}}</p>
            <p class="card-text">Email: {{$admin->email}}</p>

            <a class="btn btn-dark" href="#">Editar</a>
        </div>
        @endif
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const calendarBody = document.getElementById("calendar-body");
        const currentMonthDiv = document.getElementById("currentMonth");

        // Obter informações da data atual
        const currentDate = new Date();
        const currentMonth = currentDate.toLocaleString('default', { month: 'long' });
        const currentYear = currentDate.getFullYear();

        // Atualizar o texto do mês na div
        currentMonthDiv.textContent = `${currentMonth} ${currentYear}`;

        // Configurar a data para o primeiro dia do mês
        const firstDayOfMonth = new Date(currentYear, currentDate.getMonth(), 1);

        // Obter o número de dias no mês, considerando se é fevereiro e se é um ano bissexto
        let daysInMonth;
        if (currentDate.getMonth() === 1) {
            daysInMonth = (currentYear % 4 === 0 && currentYear % 100 !== 0) || (currentYear % 400 === 0) ? 29 : 28;
        } else {
            daysInMonth = new Date(currentYear, currentDate.getMonth() + 1, 0).getDate();
        }

        // Preencher dinamicamente os dias do mês na tabela
        let day = 1;
        for (let i = 0; i < 6; i++) {
            const row = document.createElement("tr");

            for (let j = 0; j < 7; j++) {
                const cell = document.createElement("td");

                if (i === 0 && j < firstDayOfMonth.getDay()) {
                    // Células vazias antes do primeiro dia do mês
                    cell.textContent = "";
                } else if (day <= daysInMonth) {
                    cell.textContent = day;
                    if (
                        currentDate.getDate() === day &&
                        currentDate.getMonth() === currentDate.getMonth() &&
                        currentDate.getFullYear() === currentYear
                    ) {
                        // Adiciona a classe "current-day" ao dia atual
                        cell.classList.add("current-day");
                    }
                    day++;
                } else {
                    // Células vazias após o último dia do mês
                    cell.textContent = "";
                }

                row.appendChild(cell);
            }

            calendarBody.appendChild(row);
        }
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('graficoVendas').getContext('2d');
        var vendasPorMes = ['10', '20', '30', '10', '20', '30', '10', '20', '30', '10', '20', '30' ];
        var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Quantidade de Vendas',
                    data: vendasPorMes,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>

<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Adiciona um zero à esquerda se os minutos ou segundos forem menores que 10
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        var timeString = hours + ":" + minutes + ":" + seconds;

        document.getElementById("clock").textContent = timeString;

        // Atualiza o relógio a cada segundo
        setTimeout(updateClock, 1000);
    }

    // Inicia o relógio
    updateClock();
</script>

@endsection
