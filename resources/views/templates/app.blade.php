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
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    @yield("css")
    @yield("js")
    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js', 'resources/css/Accueil.css','resources/css/Equipes.css','resources/css/login.css','resources/css/catalogue.css','resources/css/show.css'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body>
    <header>
        <div class="logo-nav">
            <img src="../images/logo.png" alt="NaraVerse">
            <nav class="fonctions">
                <a href="{{route('index')}}">Accueil</a>
                <a href=" {{route('histoires.index')}}">Catalogue</a>
                @auth
                <a href="{{route('histoires.create')}}">Créer une histoire</a>
                <a href="{{route('user.profile')}}">{{Auth::user()->name}}</a>
                    <img class="rounded-circle" src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('default_avatar.png') }}" width="50" height="50">
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
            <h2>Navigation</h2>
            <ul>
                <li><a href="{{route('index')}}">Accueil</a></li>
                <li><a href="{{route('histoires.index')}}">Catalogue</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('equipe')}}">Equipe</a></li>
            </ul>
        </div>
        <div class="foot3">
            <h2>Reseaux sociaux</h2>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
            </ul>
        </div>
        <div class="foot2">
            <h2>Liens</h2>
            <ul>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">Conditions d'utilisation</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>