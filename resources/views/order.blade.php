@extends('main')

@section('content')
    <div class="container mb-5">
        <h5 class="title mt-5">Minhas Encomendas</h5>
        <div class="title-separator mb-3"></div>

        <div class="table-responsive">
            <table class="table">
                <thead class="">
                  <tr>
                    <th style="background-color:blanchedalmond;">ID</th>
                    <th style="background-color:blanchedalmond;">Produto</th>
                    <th style="background-color:blanchedalmond;">Unidade</th>
                    <th style="background-color:blanchedalmond;">Preço</th>
                    <th style="background-color:blanchedalmond;">Total</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background-color:blanchedalmond;">1</td>
                        <td style="background-color:blanchedalmond;">Duplo <br> <hr> Sumol de laranja </td>
                        <td style="background-color:blanchedalmond;">2 <br> <hr> 1</td>
                        <td style="background-color:blanchedalmond;">6200,00 <br> <hr> 500,00</td>
                        <th style="background-color:blanchedalmond;">6700,00 </th>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
