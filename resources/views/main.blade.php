<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/client-profile.css">
    <title>Hamburger</title>
</head>

    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('../Poppins/Poppins-Regular.ttf') format('truetype');
        }
    </style>

<body class="main-body">
    <nav class="my-navbar navbar navbar-expand-lg">
        <div class="container-fluid">
                <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand mt-2 mt-lg-0" style="color: white">
                    <i class="fas fa-hamburger"></i>
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link navbar-content" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-content" href="/encomendas">Encomendas</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex align-items-center">
                <a class="navbar-content me-3" href="/carrinho">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">0</span>
                </a>

                    @if(!session('type'))
                    <a class="navbar-content " href="#" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#loginModal">
                        Entrar
                    </a>
                    @else
                    <div class="dropdown">
                        <a data-mdb-dropdown-init class="navbar-content dropdown-toggle hidden-arrow me-1" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="/perfil">Meu Perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <form action="/sair" method="post">
                                    @csrf
                                    <input type="submit" class="dropdown-item" value="Sair">
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endif
            </div>
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="footer text-center text-lg-start text-muted">
        <section class="social-networks d-flex justify-content-center justify-content-lg-between p-4">
            <div class="container">
                <div class=" d-none d-lg-block" style="margin-left: 85px;">
                    <span>Entre em contacto através das nossas redes sociais:</span>
                </div>
            </div>
            <div>
                <a href="" class="me-4 navbar-content">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 navbar-content">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="" class="me-4 navbar-content">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </section>
        <br>
        <section class="footer-content">
            <div class="container text-center text-md-start" >
                <div class="row">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Inicio</h6>
                        <p>
                            <a href="#!" class="navbar-content">Menu</a>
                        </p>
                        <p>
                            <a href="#!" class="navbar-content">Encomendas</a>
                        </p>
                        <p>
                            <a href="#!" class="navbar-content">Carrinho</a>
                        </p>
                        <p>
                            <a href="#!" class="navbar-content">Meu Perfil</a>
                        </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Mais</h6>
                        <p>
                            <a href="#!" class="navbar-content">Termos</a>
                        </p>
                        <p>
                            <a href="#!" class="navbar-content">Privacidade</a>
                        </p>
                        <p>
                            <a href="#!" class="navbar-content">Ajuda</a>
                        </p>
                        <p>
                            <a href="#!" class="navbar-content">Sobre Nós</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                        <p><i class="fas fa-home me-3"></i>Morro Bento, Luanda</p>
                        <p><i class="fas fa-envelope me-3"></i>helpidio@gmail.com</p>
                        <p><i class="fas fa-phone me-3"></i> (+244) 944 459 953</p>
                        <p><i class="fas fa-phone me-3"></i> (+244) 900 000 000</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4" style="color: white;">
            © 2024 Copyright: Helpidio Mateus
        </div>
    </footer>

    <div class="modal" id="loginModal" data-mdb-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                        <a
                            class="nav-link active"
                            id="tab-login"
                            data-mdb-pill-init
                            href="#pills-login"
                            role="tab"
                            aria-controls="pills-login"
                            aria-selected="true"
                            >Entrar</a
                        >
                        </li>
                        <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="tab-register"
                            data-mdb-pill-init
                            href="#pills-register"
                            role="tab"
                            aria-controls="pills-register"
                            aria-selected="false"
                            >Inscrever-se</a
                        >
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div
                        class="tab-pane fade show active"
                        id="pills-login"
                        role="tabpanel"
                        aria-labelledby="tab-login"
                        >
                            <span class="d-flex justify-content-center mb-3">
                                <i class="fas fa-user" style="font-size: 48px;"></i>
                            </span>
                            <form action="/entrar" method="post">
                                @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" name="email" class="form-control" />
                                    <label class="form-label" for="email">Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control" />
                                    <label class="form-label" for="password">Palavra-Passe</label>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <a href="#!">Esqueceu a sua palavra-passe?</a>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>
                            </form>
                        </div>
                        <div
                        class="tab-pane fade"
                        id="pills-register"
                        role="tabpanel"
                        aria-labelledby="tab-register"
                        >
                            <span class="d-flex justify-content-center mb-3">
                                <i class="fas fa-user-plus" style="font-size: 48px;"></i>
                            </span>
                            <form action="/registrar-cliente" method="post">
                                @csrf
                                <input type="hidden" name="type" value="cliente">
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" name="name" class="form-control" />
                                    <label class="form-label" for="name">Nome</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" name="surname" class="form-control" />
                                    <label class="form-label" for="surname">Sobrenome</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" name="email" class="form-control" />
                                    <label class="form-label" for="email">Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control" />
                                    <label class="form-label" for="password">Palavra-Passe</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="confirm_password" class="form-control" />
                                    <label class="form-label" for="confirmPassword">Confirmar Palavra-Passe</label>
                                </div>
                                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-3">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/script/mdb.umd.min.js"></script>
</body>
</html>
