<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/blog">Blog <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog/index">Liste des articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Administration</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-link nav-link" type="submit">Se déconnecter</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('auth.login') }}">Se connecter</a>
                    </li>
                @endguest
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0" action="{{ route('admin.index') }}">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" id="search" name="search"
                            value="{{ request()->search }}" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>
