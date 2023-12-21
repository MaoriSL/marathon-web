@extends("templates.app")

@section('content')
<div class="container">
    <div class="top">
        <div class="Intro">
            <h1>Bienvenue sur NarraVerse</h1>
            <p>Le site de référence pour les histoires dont vous êtes le héros</p>
            <p class="lorem">NarraVerse est bien plus qu'une simple plateforme d'histoires. C'est un univers dynamique où chaque décision que vous prenez influence le cours de l'histoire. <br> Plongez dans des récits captivants, explorez des mondes fantastiques, et forgez votre propre destinée. <br>
                NarraVerse met le pouvoir entre vos mains. <br> À chaque tournant, à chaque croisée des chemins, vous prenez des décisions qui sculptent l'intrigue. <br> Soyez le héros de votre propre histoire et explorez les multiples facettes de chaque scénario.</p>
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
                        <img src="{{url($histoire->photo)}}" alt="{{ $histoire->titre }}">
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
            <h2>C'est quoi NarraVerse</h2>
            <p>NaraVerse est plus qu'une simple plateforme d'histoires interactives. C'est un voyage où chaque clic, chaque mot, chaque choix, façonne une expérience unique. Préparez-vous à vivre des récits qui transcendent l'ordinaire et plongez dans l'infini des possibilités narratives.
                Prêt à écrire votre histoire dans NaraVerse ? Rejoignez-nous dès aujourd'hui et commencez votre aventure !</p>
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