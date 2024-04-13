@extends('main')

@section('content')

@if($client)

<div class="container mt-5">
    <div class="card mb-5 d-flex" style="max-width: 600px; background-color:blanchedalmond;">
        <div class="row g-0">
            <div class="col-md-4">
                <i class="user-icon fas fa-user-circle"></i>
            </div>
            <div class="col-md-6 mt-5">
                <h5 class="card-title">Nome: <strong>{{$client->name}} {{$client->surname}}</strong></h5>
                <h5 class="card-title">Email: <strong>{{$client->email}}</strong> </h5>

                <a href="#" class="btn btn-dark">Editar</a>
            </div>
        </div>
    </div>
</div>

@endif

@endsection
