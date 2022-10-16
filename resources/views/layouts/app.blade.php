<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="https://icon-icons.com/fr/icone/lettre-p/151244" />

<style type="text/css">
 .task-done {
      text-decoration: line-through;
    }

</style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('tasks.index') }}">
                 PLANIFY
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto">
                        @auth

                            <li class="nav-item">
                                <a class="nav-link active fs-4 fw-bold me-3" aria-current="page" href="javascript:void(0)">  {{auth()->user()->identifiant}}</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('logout.perform') }}" class="nav-link btn btn-danger me-2 text-white shadow-0">Déconnexion</a>
                            </li>
                        @endauth

                        @guest
                            <div class="text-end">
                            <a href="{{ route('login.perform') }}" class="btn btn-outline-success me-2">Connexion</a>
                            <a href="{{ route('register.perform') }}" class="btn btn-warning">Inscription</a>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container justify-content-center">
            @include('partials.messages')
          </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
