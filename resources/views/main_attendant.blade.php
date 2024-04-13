<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <title>Hamburger</title>
</head>
<body>
    <nav class="navbar bg-white">
        <div class="container-fluid">
            <a class="navbar-brand me-2" href="/atendente">
                Hamburguer
            </a>
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button data-mdb-dropdown-init type="button" class="btn btn-dark dropdown-toggle hidden-arrow" aria-expanded="false" id="userMenu">
                        <i class="fas fa-user-circle"></i>
                        @if ($attendant)
                            {{$attendant->name}} {{$attendant->surname}}
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li>
                            <form action="/sair" method="post">
                                @csrf
                                <input type="submit" class="dropdown-item" value="Sair">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </nav>

    <div class="row g-0">
        <div class="col-md-4">
            <div class="container mt-3">
                <div class="card card-body" style="height: 600px;">
                    <div class="table-responsive" style="height: 400px;">
                        <table class="table table-striped" id="saleTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Quantidade</th>
                                    <th class="text-center">Preço</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="mb-3 mt-3">
                        <hr>
                        <h4 id="total" class="d-flex justify-content-end" style="color: green"></h4>
                        <h6 id="paid" class="d-flex justify-content-end"></h6>
                        <h6 id="change" class="d-flex justify-content-end"></h6>
                        <h6>FORMA DE PAGAMENTO</h6>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="payment_method" id="payment_method" onclick="uncheckOthers(this)">
                            <label class="form-check-label">Dinheiro</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="payment_method" onclick="uncheckOthers(this)">
                            <label class="form-check-label">Cartão Multicaixa</label>
                        </div>
                    </div>
                    <ul class="" style="list-style: none; display: flex;">
                        <li class="me-2">
                            <a class="btn btn-danger" href="#">Cancelar</a>
                        </li>
                        <li class="me-2">
                            <a class="btn btn-warning" href="#">Pendente</a>
                        </li>
                        <li>
                            <a class="btn btn-success" href="#">Pagar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="container mt-3">
                <div class="card card-body" style="height: 600px;">
                    <div class="d-flex justify-content-end mb-4">
                        <form action="/procurar-produto" method="post" class="d-flex input-group w-auto">
                            @csrf
                            <input
                                type="search"
                                class="form-control rounded"
                                placeholder="Procurar Produto"
                                aria-label="Search"
                                aria-describedby="search-addon"
                            />
                            <span class="input-group-text border-0" id="search-addon">

                                <button class="btn  btn-success">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                            </form>
                    </div>
                    <div style="overflow-y: auto; height:400px; max-height: 400px; overflow-x:hidden;">
                        <div class="tab-content" id="menu">
                            <div class="tab-pane fade show active" id="hamburger" role="tabpanel" aria-labelledby="hamburger">
                                <div class="row g-0">
                                    <div class="col mb-4">
                                        <button type="button" class="bg-transparent border-0" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#addToList">
                                            <div class="card" style="width: 15rem;">
                                                <div class="card-header border-0">
                                                    <span class="d-flex justify-content-center">
                                                        <img src="{{asset('img/img1.png')}}" width="150">
                                                    </span>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="name" class="card-title">Hamburger</h5>
                                                    <p class="price" class="card-text">2500</p>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="soda" role="tabpanel" aria-labelledby="soda">
                                <div class="row g-0">
                                    <div class="col mb-4">
                                        <button type="button" class="bg-transparent border-0" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#addToList">
                                            <div class="card card-body" style="width: 15rem;">
                                                <h5 class="name">Sumol Ananas</h5>
                                                <h5 class="price">500</h5>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="sale" role="tabpanel" aria-labelledby="sale">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item(s)</th>
                                                <th>Quantidade</th>
                                                <th>Preço(Total)</th>
                                                <th>Preço(Pago)</th>
                                                <th>Data</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="pendent" role="tabpanel" aria-labelledby="pendent">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item(s)</th>
                                                <th>Quantidade</th>
                                                <th>Preço(Total)</th>
                                                <th>Data</th>
                                                <th>Confirmar</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="stock" role="tabpanel" aria-labelledby="stock">
                                Tab 5 content
                            </div>
                        </div>
                    </div>
                    <div class="card card-body" style="border-radius: 0;">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-tabs" role="tablist" style="list-style: none; display: flex;">
                                <li class="nav-item" role="presentation">
                                    <a data-mdb-tab-init class="nav-link active" id="hamburger" role="tab" aria-controls="hamburger" aria-selected="true" href="#hamburger"><i class="fas fa-hamburger fa-fw me-2"></i>Hamburguer</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a data-mdb-tab-init class="nav-link" id="soda" role="tab" aria-controls="soda" aria-selected="false" href="#soda"><i class="fas fa-bottle-water fa-fw me-2"></i>Refrigerante</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a data-mdb-tab-init class="nav-link" id="sale" role="tab" aria-controls="sale" aria-selected="false" href="#sale"><i class="fas fa-chart-pie fa-fw me-2"></i>Vendas</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a data-mdb-tab-init class="nav-link" id="pendent" role="tab" aria-controls="pendent" aria-selected="false" href="#pendent"><i class="fas fa-file-lines fa-fw me-2"></i>Pendente</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a data-mdb-tab-init class="nav-link" id="stock" role="tab" aria-controls="stock" aria-selected="false" href="#stock"><i class="fas fa-chart-simple fa-fw me-2"></i>Estoque</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addToList" tabindex="-1" aria-labelledby="addToList" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <label for="qty">Quantidade:</label>
                    <input type="number" class="form-control" name="qty" id="qty">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" onclick="addToList()" data-mdb-ripple-init data-mdb-dismiss="modal">Adicionar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Valor Pago:</label>
                        <input type="number" class="form-control" id="totalPaid">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="confirmPaidValue()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/bootstrap/script/bootstrap.min.js"></script>
    <script src="bootstrap/script/mdb.umd.min.js"></script>

    <script>
        var total = 0;

        document.getElementById('total').textContent = "Total: " + total.toFixed(2) + " " + "AOA";

        function addToList(){
            var quantity = document.getElementById('qty').value;
            var name = document.querySelector('.tab-pane.active .name').textContent;
            var price = parseFloat(document.querySelector('.tab-pane.active .price').textContent);
            var priceQuantity = quantity * price;
            total += priceQuantity;

            var newRow = document.createElement('tr');

            var nameCell = document.createElement('td');
            var priceCell = document.createElement('td');
            var qtyCell = document.createElement('td');

            nameCell.style.textAlign = 'center';
            priceCell.style.textAlign = 'center';
            qtyCell.style.textAlign = 'center';

            nameCell.textContent = name;
            qtyCell.textContent = quantity;
            priceCell.textContent = priceQuantity;

            newRow.appendChild(nameCell);
            newRow.appendChild(qtyCell);
            newRow.appendChild(priceCell);

            document.getElementById('saleTable').getElementsByTagName('tbody')[0].appendChild(newRow);

            document.getElementById('qty').value = '';

            document.getElementById('total').textContent = "Total: " + total.toFixed(2) + " " + "AOA";
        }

        function uncheckOthers(clickedCheckbox) {
            var checkboxes = document.getElementsByName(clickedCheckbox.name);

            if(clickedCheckbox.id === "payment_method"){
                var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                myModal.show();
            }
            checkboxes.forEach(function(checkbox) {
                if (checkbox !== clickedCheckbox) {
                    checkbox.checked = false;
                }
            });
        }

        function confirmPaidValue(){
            var paidValue = parseFloat(document.getElementById('totalPaid').value);
            var currentTotal = parseFloat(total);
            var change = paidValue - currentTotal;
            document.getElementById('paid').textContent = "Valor Pago: " + paidValue.toFixed(2) + " " + "AOA";
            document.getElementById('change').textContent = "Troco: " + change.toFixed(2) + " " + " AOA";
        }
    </script>
</body>
</html>
