@extends('main_admin')

@section('content')

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

@endsection
