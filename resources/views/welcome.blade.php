@extends("templates.app")

@section('content')
<div class="container">
    <div class="Intro">
        <h1>Bienvenue sur NaraVerse</h1>
        <p>Le site de référence pour les histoires dont vous êtes le héros</p>
    </div>
    <div class="global-swiper">
        <h2>
            Histoires aléatoires
        </h2>
        <div class="swiper swiper1">
            <div class="swiper-wrapper">
                @foreach($histoires as $histoire)
                <a class="swiper-slide tuile" href="{{ route('histoires.show', $histoire->id) }}">
                    <img src="{{ $histoire->photo }}" alt="{{ $histoire->titre }}" data-swiper-material-scale="1.25">
                    <p>{{ $histoire->titre }}</p>
                    <div class="overlay"></div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="Infos" style="display: flex;">
        <div class="Left">
            <h2>C'est quoi NaraVerse</h2>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab vel doloribus vitae animi, eos unde alias aut architecto tempora expedita quos dolores qui asperiores est, iste rerum quis similique iusto.
        </div>
        <div class="Right">
            <h2> Fonctionnalitées des membres </h2>
            <ul class="Fonction">
                <li>Lire des Histoires</li>
                <li>Commenter des Histoires</li>
                <li>Reprendre la lecture</li>
                <li>Créer sa propre aventure</li>
            </ul>
        </div>
    </div>
    <div class="genre">
        <h2>Genres</h2>
        <div class="swiper swiper2">
            <div class="swiper-wrapper">
                @foreach($genres as $genre)
                <a class="swiper-slide" href="{{route('histoires.indexGenre', $genre->id)}}">
                    <p>{{ $genre->label }}</p>
                    <div class="text-h">
                        <p class="text-h1">{{ $genre->label }}</p>
                        <p class="text-h2">{{ $genre->label }}</p>
                        <p class="text-h3">{{ $genre->label }}</p>
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
        spaceBetween: 500,
        speed: 2000,
        autoplay: {
            delay: 600,
        }
    });
</script>
@endsection