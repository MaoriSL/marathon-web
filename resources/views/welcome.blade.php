@extends("templates.app")

@section('content')
<div class="container">
    <div class="top">
        <div class="Intro">
            <h1>Bienvenue sur NaraVerse</h1>
            <p>Le site de référence pour les histoires dont vous êtes le héros</p>
            <p class="lorem">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="href">
            <a href="{{route('histoires.index')}}">Découvrir le catalogue</a>
            @auth
            <a href="#">Voir mes lectures</a>
            @endauth
        </div>
    </div>
    <div class="global-swiper">
        <h2>
            Histoires aléatoires
        </h2>
        <div class="swiper swiper1">
            <div class="swiper-wrapper">
                @foreach($histoires as $histoire)
                <a class="swiper-slide tuile" href="{{ route('histoires.show', $histoire->id) }}">
                    <div class="infos">
                        <img src="/~but23_groupe8/images/storage/{{ $histoire->photo }}" alt="{{ $histoire->titre }}">
                        <p>{{ $histoire->titre }}</p>
                        <div class="overlay"></div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="Infos" style="display: flex;">
        <div class="Left">
            <h2>C'est quoi NaraVerse</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="Right">
            <h2> Fonctionnalitées des membres </h2>
            <ul class="Fonction">
                <li>Lire des Histoires</li>
                <li>Commenter des Histoires</li>
                <li>Reprendre la lecture</li>
                <li>Créer sa propre aventure</li>
                <a class="register" href="{{route('register')}}">
                    <li>S'inscrire</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="genre">
        <h2>Genres</h2>
        <div class="swiper swiper2">
            <div class="swiper-wrapper">
                @foreach($genres as $genre)

                <a class="swiper-slide" href="{{route('histoires.indexGenre', $genre->id)}} ">
                    <div class="genre-txt">

                        <p>{{ $genre->label }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    const swiper = new Swiper('.swiper1', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        slidesPerView: 3,
        spaceBetween: 500,
        speed: 2000,
        autoplay: {
            delay: 600,
        },
        smooth: true,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20
            },
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
    });

    const swiper2 = new Swiper('.swiper2', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        slidesPerView: 3,
        spaceBetween: 50,
        speed: 2000,
        autoplay: {
            delay: 600,
        }
    });
</script>
@endsection