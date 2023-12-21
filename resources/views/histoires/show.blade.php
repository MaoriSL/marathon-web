@extends('templates.app')

@section('content')
<div class="Histoire-show">
    <div class="Titre-auteur">
        <h1>{{ $histoire->titre }}</h1>
        <p>par <a href="{{ route('user.show', $histoire->user->id) }}">{{ $histoire->user->name }}</a></p>
    </div>
    <div class="global-infos">
        <div class="Histoires-img">
            <img src="{{ Storage::url($histoire->photo) }}" alt="image histoire">
        </div>
        <div class="Histoires-infos">
            <div class="Histoire-desc">
                <p>{{ $histoire->pitch }}</p>
            </div>
            <p>
                <i class="fas fa-marker"></i>
                Genre: {{ $histoire->genre["label"] }}
            </p>
            <p>
                <i class=" fas fa-check"></i>
                Number of completed readings: {{ $histoire->terminees->count() }}
            </p>
            <p>
                <i class="commentaire">
                    <i class="fas fa-comment-dots"></i>
                </i>
                Number of reviews: {{ $histoire->avis->count() }}
            </p>
            @auth
            @if($isFavorite)
            <form method="POST" action="{{ route('favoris.remove', $histoire->id) }}" class="favoris">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0; color: #e3342f;">
                    ❤️
                </button>
            </form>
            @else
            <form method="POST" class="favoris" action="{{ route('favoris.add', $histoire->id) }}">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0; color: #e3342f;">
                    🤍
                </button>
            </form>
            @endif
            @endauth
            <div class="Lire">
                @if(!empty($histoire->premier()->id))
                <a href="{{ route('chapitres.show', ['chapitre' => $histoire->premier()->id]) }}">Commencer la lecture</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="global-avis">
    <div class="avis">
        <div class="avis-titre">
            <h3>Commentaires</h3>
        </div>
        @foreach($histoire->avis as $avis)
        <div class="avis-desc">
            <p> <a href="{{route('user.show', $histoire->user->id)}}">{{$avis->user->name}}</a></p><br>
            <p class="membres"> Membres Ecrivains</p>
            <p>{{ $avis->contenu }}</p>
            <p>Posté le {{ $avis->created_at}}</p>
        </div>
        @endforeach
    </div>

    <div class="Add-avis">
        @if(auth()->check())
        <form method="POST" action="{{ route('histoires.storeComment') }}" class="form-avis">
            @csrf
            <label for="contenu">
                <textarea name="contenu" placeholder="Ecrivez votre commentaire..."></textarea>
            </label>
            <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
            <button type="submit">Ajouter un commentaire</button>
        </form>
        @else
        <b>Vous devez être connecté pour ajouter un commentaire</b>
        @endif
    </div>
</div>
@endsection