<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "NaraVerse"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- boxicons -->
    <link rel="stylesheet" href="https://boxicons.com/css/boxicons.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- link font  -->
    @yield("css")
    @yield("js")
    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js', 'resources/css/Accueil.css','resources/css/Equipes.css','resources/css/login.css','resources/css/catalogue.css','resources/css/show.css'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body>
    <header>
        <div class="logo-nav">
            <img src="/~but23_groupe8/images/logo-nara.png" alt="Logo de l'entreprise">
            <nav class="fonctions">
                <a href="{{route('index')}}">Accueil</a>
                <a href=" {{route('histoires.index')}}">Catalogue</a>
                @auth
                <a href="{{route('histoires.create')}}">Créer une histoire</a>
                <a href="{{route('user.profile')}}">{{Auth::user()->name}}</a>
                <a href="{{route("logout")}}" onclick="document.getElementById('logout').submit(); return false;">Logout</a>
                <form id="logout" action="{{route("logout")}}" method="post">
                    @csrf
                </form>
                @else
            </nav>
        </div>
        <nav>
            <div class="nav">
                <div class="login">
                    <a href="{{route("register")}}" class="register">S'inscrire</a>
                    <a href="{{route("login")}}">Se connecter</a>
                </div>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        @yield("content")
    </main>

    <footer class="foot">
        <div class="foot1">
            <img src="../images/Logo-nara.png" alt="Nara">
        </div>
        <div class="foot3">
            <ul>
                <li>
                    <a href="#">Facebook</a>
                    <a href="#">Instagram</a>
                    <a href="#">Twitter</a>
                </li>
                <li>
                </li>
            </ul>
        </div>
        <div class="foot2">
            <ul>
                <li><a href="#">Nous contacter</a></li>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">Copyright © 2023 Naraverse. Tous droits réservés.</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>