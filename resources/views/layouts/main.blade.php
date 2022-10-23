<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/c64a25508a.js" crossorigin="anonymous"></script>
    </head>
    <body class="d-flex flex-column h-100">
        <div class="header-bg">
            <div class="container">
                <header class="d-flex flex-wrap justify-content-center mb-4">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                        <span class="fs-4">LOGO</span>
                    </a>

                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="/noticias/create" class="nav-link">Cadastrar Notícias</a></li>
                        <li class="nav-item"><a href="/noticias" class="nav-link">Exibir Notícias</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 form-search" action="/" method="GET">
                        <div class="input-group rounded">
                            <input type="text" class="form-control rounded" placeholder="Pesquisar..." aria-label="Search" aria-describedby="search-addon" name="search" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </form>            
                </header>
            </div>
        </div>

        <main class="flex-shrink-0 bg-main">
            <div class="container">
                @yield('content')
            </div>
        </main>        

        <footer class="footer mt-auto py-3">
            <div class="container">
                <p class="text-center text-muted">&copy; {{ now()->year }} - Desenvolvido por: <b>Douglas A. de Oliveira</b></p>
            </div>
        </footer>        
    </body>
</html>
