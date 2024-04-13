@extends('main_admin')

@section('content')

<div class="container">
    <nav class="navbar navbar-expand-lg" style="background-color: white;">
        <h4 class="me-2" style="margin-left: 20px;">Estoque</h4>
        <div class="vertical-separator"></div>
    </nav>

    <div class="card card-body mt-3" style="border-radius: 0;">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link active actived" aria-current="page" href="#" onclick="addStock(this)">Adicionar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link actived" href="#" onclick="showStock(this)">Listar</a>
            </li>
        </ul>

        <div id="addStock" style="display: block;">
            <div class="container d-flex justify-content-center">
                <form action="/adicionar-stock" method="post">
                    @csrf
                    <input type="text" name="stock_name" class="form-control mb-3" placeholder="Item">

                    <input type="number" name="quantity" class="form-control mb-3" placeholder="Quantidade">

                    <input type="submit" value="Adicionar" class="btn btn-success">
                </form>
            </div>
        </div>

        <div id="showStock" style="display: none;">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Item</th>
                                <th>Quantidade</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addStock(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.getElementById('addStock').style.display = 'block';
        document.getElementById('showStock').style.display = 'none';
    }

    function showStock(element) {
        resetActiveTabs();
        element.classList.add('active');
        document.getElementById('addStock').style.display = 'none';
        document.getElementById('showStock').style.display = 'block';
    }

    function resetActiveTabs() {
        document.querySelectorAll('.actived').forEach(function(item) {
            item.classList.remove('active');
        });
    }
</script>

@endsection
