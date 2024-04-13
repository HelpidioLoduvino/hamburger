@extends('main')

@section('content')
    <div id="carouselMaterialStyle" class="carousel" data-mdb-ride="carousel" data-mdb-carousel-init>
        <div class="carousel-inner shadow-4-strong">
            <div class="carousel-item active banner">
                <img src="{{asset('img/banner05.webp')}}" alt="" class="d-block w-100 banner-img">
                <div class="banner-text">
                    O melhor hamburger <br> da banda vc encontra <br> aqui
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <h5 class="title mt-5">Hamburger</h5>
        <div class="title-separator mb-3"></div>
        <div class="d-flex justify-content-center">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card mx-auto h-100" style="width: 20rem; background-color:blanchedalmond;">
                        <div class="card-header border-danger">
                            <span class="d-flex justify-content-center">
                                <img src="{{asset('img/img1.png')}}" class="card-img-top" style="width: 200px; height: auto;">
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-hamburger me-2 mt-1"></i>
                                <h5 class="card-title">Hamburger</h5>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fa-solid fa-dollar-sign me-2 mt-1"></i>
                                <p class="card-text">2000,00 A0A</p>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fas fa-circle-info me-2 mt-1"></i>
                                <p class="text-muted">Hamburger duplo + gasosa + batata frita</p>
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <span class="">
                                <form action="/adicionar-ao-carrinho"  method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mx-auto h-100" style="width: 20rem; background-color:blanchedalmond;">
                        <div class="card-header border-danger">
                            <span class="d-flex justify-content-center">
                                <img src="{{asset('img/img1.png')}}" class="card-img-top" style="width: 200px; height: auto;">
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-hamburger me-2 mt-1"></i>
                                <h5 class="card-title">Hamburger</h5>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fa-solid fa-dollar-sign me-2 mt-1"></i>
                                <p class="card-text">2000,00 A0A</p>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fas fa-circle-info me-2 mt-1"></i>
                                <p class="text-muted">Hamburger duplo + gasosa + batata frita</p>
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <span class="">
                                <form action="/adicionar-ao-carrinho"  method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mx-auto h-100" style="width: 20rem; background-color:blanchedalmond;">
                        <div class="card-header border-danger">
                            <span class="d-flex justify-content-center">
                                <img src="{{asset('img/img1.png')}}" class="card-img-top" style="width: 200px; height: auto;">
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-hamburger me-2 mt-1"></i>
                                <h5 class="card-title">Hamburger</h5>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fa-solid fa-dollar-sign me-2 mt-1"></i>
                                <p class="card-text">2000,00 A0A</p>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fas fa-circle-info me-2 mt-1"></i>
                                <p class="text-muted">Hamburger duplo + gasosa + batata frita</p>
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <span class="">
                                <form action="/adicionar-ao-carrinho"  method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="title mt-5">Refrigerante</h5>
        <div class="title-separator mb-3"></div>
        <div class="d-flex justify-content-center">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card mx-auto h-100" style="width: 20rem; background-color:blanchedalmond;">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fa-solid fa-bottle-water me-2 mt-1"></i>
                                <h5 class="card-title">Sumol de Laranja</h5>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fas fa-dollar me-2 mt-1"></i>
                                <p class="card-text">500,00 AOA</p>
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <span class="">
                                <form action="/adicionar-ao-carrinho"  method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mx-auto h-100" style="width: 20rem; background-color:blanchedalmond;">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fa-solid fa-bottle-water me-2 mt-1"></i>
                                <h5 class="card-title">Sprite em lata</h5>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fas fa-dollar me-2 mt-1"></i>
                                <p class="card-text">500,00 AOA</p>
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <span class="">
                                <form action="/adicionar-ao-carrinho"  method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mx-auto h-100" style="width: 20rem; background-color:blanchedalmond;">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fa-solid fa-bottle-water me-2 mt-1"></i>
                                <h5 class="card-title">Fanta em lata</h5>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <i class="fas fa-dollar me-2 mt-1"></i>
                                <p class="card-text">500,00 AOA</p>
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <span class="">
                                <form action="/adicionar-ao-carrinho"  method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
