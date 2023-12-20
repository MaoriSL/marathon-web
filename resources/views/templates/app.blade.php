<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "NaraVerse"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("css")
    @yield("js")
    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js', 'resources/js/histoirescroll.js', 'resources/css/Accueil.css','resources/css/Equipes.css'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body>
    <header>
        <img src="" alt="NaraVerse">
        <nav>
            <a href="{{route('index')}}">Accueil</a>

            @auth
            <a href="">{{Auth::user()->name}}</a>
            <a href="{{route("logout")}}" onclick="document.getElementById('logout').submit(); return false;">Logout</a>
            <form id="logout" action="{{route("logout")}}" method="post">
                @csrf
            </form>
            @else
            <a href="{{route("login")}}">Login</a>
            <a href="{{route("register")}}">Register</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield("content")
    </main>

    <footer>IUT de Lens</footer>
</body>

</html>