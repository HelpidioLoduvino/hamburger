<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/admin-main.css">
    <link rel="stylesheet" href="css/admin-home.css">
    <title>Hamburger</title>
</head>

<style>
    @font-face {
        font-family: 'Poppins';
        src: url('../Poppins/Poppins-Regular.ttf') format('truetype');
    }
</style>

<body>
    <div class="row g-0" style="position:relative; overflow:hidden;">
        <div class="col-md-3">
            <div class="sidebar card card-body" style="height: 700px;">
                <div class="user-img d-flex justify-content-center">
                    <i class="user-icon fas fa-user-circle"></i>
                </div>
                @if ($admin)
                    <h5 class="card-title d-flex justify-content-center mt-3">{{$admin->name}} {{$admin->surname}}</h5>
                    <p class="card-text d-flex justify-content-center">{{$admin->type}}</p>
                @endif

                <div class="nav flex-column nav-tabs text-center" id="menu" role="tablist" aria-orientation="vertical">
                    <a style="color: white;" data-mdb-tab-init class="menu-link nav-link active" href="#home" role="tab" id="home-tab" aria-controls="home" aria-selected="true">
                        <i class="fas fa-home me-2 mt-1"></i>
                        Inicio
                    </a>
                    <a style="color: white;" data-mdb-tab-init class="menu-link nav-link" href="#order" role="tab" id="order-tab" aria-controls="order" aria-selected="false">
                        <i class="fas fa-circle-arrow-down me-2 mt-1"></i>
                        Encomendas
                    </a>
                    <a style="color: white;" data-mdb-tab-init class="menu-link nav-link" href="#sale" role="tab" id="sale-tab" aria-controls="sale" aria-selected="false">
                        <i class="fa-solid fa-chart-pie me-2 mt-1"></i>
                        Vendas
                    </a>
                    <a style="color: white;" data-mdb-tab-init class="menu-link nav-link" href="#product" role="tab" id="product-tab" aria-controls="product" aria-selected="false">
                        <i class="fa-solid fa-hamburger me-2 mt-1"></i>
                        Produtos
                    </a>
                    <a style="color: white;" data-mdb-tab-init class="menu-link nav-link" href="#stock" role="tab" id="stock-tab" aria-controls="stock" aria-selected="false">
                        <i class="fa-solid fa-chart-simple me-2 mt-1"></i>
                        Estoque
                    </a>
                    <a style="color: white;" data-mdb-tab-init class="menu-link nav-link" href="#client" role="tab" id="client-tab" aria-controls="client" aria-selected="false">
                        <i class="fa-solid fa-users me-2 mt-1"></i>
                        Clientes
                    </a>
                    <a style="color: white;" data-mdb-tab-init class="menu-link nav-link" href="#attendant" role="tab" id="attendant-tab" aria-controls="attendant" aria-selected="false">
                        <i class="fa-solid fa-user me-2 mt-1"></i>
                        Atendente
                    </a>

                    <form action="/sair" method="post">
                        @csrf
                        <input type="submit" class="btn btn-danger mt-5" value="Sair">
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="main card card-body" style="height: 700px;">
                <div class="tab-content" id="content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-8">
                                <nav class="navbar navbar-expand-lg" style="background-color: white;">
                                    <h4 class="me-2" style="margin-left: 20px;">Inicio</h4>
                                    <div class="vertical-separator"></div>
                                </nav>

                                <div class="card card-body mt-3" style="border-radius: 0; height: 368px;">
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
                                <div class="card card-body mt-3" style="border-radius: 0; height: 250px;">
                                    <h5 class="card-title d-flex justify-content-center">Detalhes do perfil</h5>
                                    <p class="card-text">Email: {{$admin->email}}</p>

                                    <a class="btn btn-dark" href="#">Editar</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="order" role="tabpanel" aria-labelledby="order-tab">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg" style="background-color: white;">
                                <h4 class="me-2" style="margin-left: 20px;">Encomendas</h4>
                                <div class="vertical-separator"></div>
                            </nav>

                            <div class="card card-body mt-3" style="border-radius: 0;">
                                <div style="max-height: 500px; overflow: auto; overflow-x: hidden;">
                                    <ul class="nav nav-tabs mb-3"  id="orderMenu" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a data-mdb-tab-init class="nav-link active" href="#pendingOrder" id="pending-order-tab" role="tab" aria-controls="pendingOrder" aria-selected="true">Por Atender</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a data-mdb-tab-init class="nav-link" href="#doneOrder" id="done-order-tab" role="tab" aria-controls="doneOrder" aria-selected="false">Atendido</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="orderContent">
                                        <div class="tab-pane fade show active" id="pendingOrder" role="tabpanel" aria-labelledby="pending-order-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="table-dark">
                                                        <tr>
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
                                                        <tr>
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
                                        <div class="tab-pane fade show" id="doneOrder" role="tabpanel" aria-labelledby="done-order-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th class="text-center">ID</th>
                                                            <th class="text-center">Nome</th>
                                                            <th class="text-center">Produto</th>
                                                            <th class="text-center">Unidade</th>
                                                            <th class="text-center">Preço</th>
                                                            <th class="text-center">Data</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg" style="background-color: white;">
                                <h4 class="me-2" style="margin-left: 20px;">Vendas</h4>
                                <div class="vertical-separator"></div>
                            </nav>

                            <div class="card card-body mt-3" style="border-radius: 0;">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Produto</th>
                                                <th>Unidade</th>
                                                <th>Preço</th>
                                                <th>Data</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="product" role="tabpanel" aria-labelledby="product-tab">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg" style="background-color: white;">
                                <h4 class="me-2" style="margin-left: 20px;">Produtos</h4>
                                <div class="vertical-separator"></div>
                            </nav>

                            <div class="card card-body mt-3" style="border-radius: 0;">
                                <ul class="nav nav-tabs mb-3" id="product" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a data-mdb-tab-init class="nav-link active" href="#addProduct" id="add-product-tab" role="tab" aria-controls="addProduct" aria-selected="true">Adicionar</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a data-mdb-tab-init class="nav-link" href="#listProduct" id="list-product-tab" role="tab" aria-controls="listProduct" aria-selected="false">Listar</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="addProduct" role="tabpanel" aria-labelledby="add-product-tab">
                                        <ul class="nav nav-tabs mb-3 d-flex justify-content-center" id="item" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a data-mdb-tab-init class="nav-link active" href="#addBurger" id="add-burger-tab" role="tab" aria-controls="addBurger" aria-selected="true">Hamburger</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a data-mdb-tab-init class="nav-link" href="#addSoda" id="add-soda-tab" role="tab" aria-controls="addSoda" aria-selected="false">Refrigerante</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="addBurger" role="tabPanel" aria-labelledby="add-burger-tab">
                                                <i class="fas fa-hamburger d-flex justify-content-center" style="font-size: 50px;"></i>
                                                <div class="d-flex justify-content-center">
                                                    <form action="/adicionar-hamburguer" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="burger_name" placeholder="Nome do produto" class="form-control mt-3">
                                                        <textarea name="burger_descr" cols="5" rows="2" placeholder="Descrição" class="form-control mt-3"></textarea>
                                                        <input type="number" name="burger_price" step="0.01" min="0.01" class="form-control mt-3" placeholder="Preço">
                                                        <input type="file" name="burger_img" accept="image/*" class="form-control mt-3">
                                                        <span class="d-flex justify-content-center">
                                                            <input type="submit" class="btn btn-success mt-3" value="Adicionar">
                                                        </span>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="addSoda" role="tabPanel" aria-labelledby="add-soda-tab">
                                                <i class="fas fa-bottle-water d-flex justify-content-center" style="font-size: 48px;"></i>
                                                <div class="d-flex justify-content-center">
                                                    <form action="/adicionar-refrigerante" method="post">
                                                        @csrf
                                                        <select name="drink_name" class="form-control mt-3">
                                                            <option value="">-- Refrigerante --</option>
                                                            @if ($soft_drinks->count() > 0)
                                                                @foreach ($soft_drinks as $soft_drink)
                                                                    <option value="{{$soft_drink->item}}">{{$soft_drink->item}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <input type="number" name="drink_price" step="0.01" min="0.01" class="form-control mt-3" placeholder="Preço">
                                                        <span class="d-flex justify-content-center">
                                                            <input type="submit" class="btn btn-success mt-3" value="Adicionar">
                                                        </span>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show" id="listProduct" role="tabpanel" aria-labelledby="list-product-tab">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th class="text-center">Nome</th>
                                                        <th class="text-center">Preço</th>
                                                        <th class="text-center">Editar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($hamburgers->count() > 0)
                                                        @foreach ($hamburgers as $burger)
                                                            <tr>
                                                                <td>{{$burger->burger_name}}</td>
                                                                <td>{{$burger->burger_price}}</td>
                                                                <td>
                                                                    <div class="d-flex justify-content-center">
                                                                        <a class="btn btn-primary me-2" href="#">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <form action="/apagar-produto" method="post">
                                                                            @csrf
                                                                            <button class="btn btn-danger" type="submit">
                                                                                <i class="fas fa-trash-alt"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    @if ($soft_drinks->count() > 0)
                                                    @foreach ($soft_drinks as $drink)
                                                        <tr>
                                                            <td>{{$drink->drink_name}}</td>
                                                            <td>{{$drink->drink_price}}</td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <a class="btn btn-primary me-2" href="#">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="/apagar-produto" method="post">
                                                                        @csrf
                                                                        <button class="btn btn-danger" type="submit">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade show" id="stock" role="tabpanel" aria-labelledby="stock-tab">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg" style="background-color: white;">
                                <h4 class="me-2" style="margin-left: 20px;">Estoque</h4>
                                <div class="vertical-separator"></div>
                            </nav>

                            <div class="card card-body mt-3" style="border-radius: 0;">
                                <ul class="nav nav-tabs mb-3" id="stock" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a data-mdb-tab-init class="nav-link active" id="add-stock-tab" href="#addStock" role="tab" aria-controls="addStock" aria-selected="true">Adicionar</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a data-mdb-tab-init class="nav-link" id="list-stock-tab" href="#listStock" role="tab" aria-controls="listStock" aria-selected="false">Listar</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="addStock" role="tabpanel" aria-labelledby="add-stock-tab">
                                        <div class="container d-flex justify-content-center">
                                            <form action="/adicionar-estoque" method="post">
                                                @csrf
                                                <input type="text" name="item" class="form-control mb-3" placeholder="Item">

                                                <input type="number" name="total" class="form-control mb-3" placeholder="Quantidade">

                                               <select name="item_type" class="form-control mb-3">
                                                <option value="">-- Categoria --</option>
                                                    <option value="Carne De Hamburguer">Carne De Hamburguer</option>
                                                    <option value="Refrigerante">Refrigerante</option>
                                               </select>

                                                <input type="hidden" name="date" id="dateInput" value="">

                                                <input type="submit" value="Adicionar" class="btn btn-success">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="listStock" role="tabpanel" aria-labelledby="list-stock-tab">
                                        <div class="container">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th class="text-center">ID</th>
                                                            <th class="text-center">Item</th>
                                                            <th class="text-center">Total</th>
                                                            <th class="text-center">Disponível</th>
                                                            <th class="text-center">Data</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($stock->isNotEmpty())
                                                            @foreach ($stock as $item)
                                                                <tr>
                                                                    <td>{{$item->id}}</td>
                                                                    <td>{{$item->item}}</td>
                                                                    <td>{{$item->total}}</td>
                                                                    <td>{{$item->available}}</td>
                                                                    <td>{{$item->date}}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td><h5>Nenhum Item encontrado</h5></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>

                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade show" id="client" role="tabpanel" aria-labelledby="client-tab">

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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/script/mdb.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<script>
    // Obtém a data atual
    var dataAtual = new Date();

    // Formata a data no formato 'YYYY-MM-DD'
    var ano = dataAtual.getFullYear();
    var mes = (dataAtual.getMonth() + 1).toString().padStart(2, '0'); // Mês é baseado em zero, então é necessário adicionar 1
    var dia = dataAtual.getDate().toString().padStart(2, '0');
    var dataFormatada = ano + '-' + mes + '-' + dia;

    // Define o valor formatado no input
    document.getElementById('dateInput').value = dataFormatada;
</script>

</body>
</html>
