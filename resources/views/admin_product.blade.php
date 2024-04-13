@extends('main_admin')

@section('content')

<div class="container">
    <nav class="navbar navbar-expand-lg" style="background-color: white;">
        <h4 class="me-2" style="margin-left: 20px;">Produtos</h4>
        <div class="vertical-separator"></div>
    </nav>

    <div class="card card-body mt-3" style="border-radius: 0;">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link active actived" aria-current="page" href="#" onclick="addProduct(this)">Adicionar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link actived" href="#" onclick="showProduct(this)">Listar</a>
            </li>
        </ul>

        <div id="addProduct" style="display: block;">

            <ul class="nav nav-tabs mb-3 d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active actived" aria-current="page" href="#" onclick="addBurger(this)">Hamburger</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link actived" href="#" onclick="addSoda(this)">Refrigerante</a>
                </li>
            </ul>

            <div id="addBurger">
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

            <div id="addSoda" style="display: none;">
                <i class="fas fa-bottle-water d-flex justify-content-center" style="font-size: 48px;"></i>
                <div class="d-flex justify-content-center">
                    <form action="/adicionar-refrigerante" method="post">
                        @csrf
                        <input type="text" name="soda_name" placeholder="Nome do produto" class="form-control mt-3">
                        <textarea name="soda_descr" cols="5" rows="2" placeholder="Descrição" class="form-control mt-3"></textarea>
                        <input type="number" name="soda_price" step="0.01" min="0.01" class="form-control mt-3" placeholder="Preço">
                        <span class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-success mt-3" value="Adicionar">
                        </span>
                    </form>
                </div>
            </div>
        </div>

        <div id="showProduct" style="display: none;">

        </div>


    </div>
</div>

<script>
    function addProduct(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.getElementById('addProduct').style.display = 'block';
        document.getElementById('showProduct').style.display = 'none';
    }

    function showProduct(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.getElementById('addProduct').style.display = 'none';
        document.getElementById('showProduct').style.display = 'block';
    }

    function resetActiveTabs() {
        document.querySelectorAll('.actived').forEach(function(item) {
            item.classList.remove('active');
        });
    }
</script>

<script>
    function addBurger(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.getElementById('addBurger').style.display = 'block';
        document.getElementById('addSoda').style.display = 'none';
    }

    function addSoda(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.getElementById('addBurger').style.display = 'none';
        document.getElementById('addSoda').style.display = 'block';
    }

    function resetActiveTabs() {
        document.querySelectorAll('.actived').forEach(function(item) {
            item.classList.remove('active');
        });
    }
</script>


@endsection
