<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="row g-0">
        <div class="col-md-3">
            <div class="sidebar card card-body" style="height: 700px;">
                <div class="user-img d-flex justify-content-center">
                    <i class="user-icon fas fa-user-circle"></i>
                </div>
                @if ($admin)
                    <h5 class="card-title d-flex justify-content-center mt-3">{{$admin->name}} {{$admin->surname}}</h5>
                    <p class="card-text d-flex justify-content-center">{{$admin->type}}</p>
                @endif

                <ul style="list-style: none;" id="focus">
                    <li class="sidebar-menu">
                        <div class="d-flex item-focus">
                            <i class="fas fa-home me-2 mt-1"></i>
                            <a class="nav-link" href="/admin">Inicio</a>
                        </div>
                    </li>

                    <li class="sidebar-menu">
                        <div class="d-flex item-focus">
                            <i class="fas fa-circle-arrow-down me-2 mt-1"></i>
                            <a class="nav-link" href="/admin-encomendas">Encomendas</a>
                        </div>
                    </li>

                    <li class="sidebar-menu">
                        <div class="d-flex item-focus">
                            <i class="fa-solid fa-bag-shopping me-2 mt-1"></i>
                            <a class="nav-link" href="/admin-vendas">Vendas</a>
                        </div>
                    </li>

                    <li class="sidebar-menu">
                        <div class="d-flex item-focus">
                            <i class="fa-solid fa-hamburger me-2 mt-1"></i>
                            <a class="nav-link" href="/admin-produtos">Produtos</a>
                        </div>
                    </li>

                    <li class="sidebar-menu">
                        <div class="d-flex item-focus">
                            <i class="fa-solid fa-chart-simple me-2 mt-1"></i>
                            <a class="nav-link" href="/admin-estoque">Estoque</a>
                        </div>
                    </li>

                    <li class="sidebar-menu">
                        <div class="d-flex item-focus">
                            <i class="fa-solid fa-users me-2 mt-1"></i>
                            <a class="nav-link" href="/admin-clientes">Clientes</a>
                        </div>
                    </li>
                    <br><br><br>
                    <li class="sidebar-menu">
                        <div class="d-flex">
                            <i class="fa-solid fa-arrow-right-from-bracket me-2 mt-1"></i>
                            <form action="/sair" method="post">
                                @csrf
                                <input type="submit" class="nav-link" value="Sair">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col">
            <div class="main card card-body" style="height: 700px;">
                <div class="container">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/script/mdb.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var destaque = document.querySelectorAll('#focus li .item-focus');
            console.log(destaque)
            destaque.forEach(function(item) {
                item.addEventListener("click", function() {
                    // Define a cor de fundo para o item clicado
                    this.classList.add("text-change");

                    // Armazena o índice do item clicado no armazenamento local do navegador
                    localStorage.setItem("selectedItemIndex", Array.from(destaque).indexOf(item));
                });
                // Verifica se há um item previamente selecionado e destaca-o
                var selectedItemIndex = localStorage.getItem("selectedItemIndex");
                if (selectedItemIndex !== null) {
                    destaque[selectedItemIndex].classList.add("text-change");
                }
            })
        })
    </script>

</body>
</html>
