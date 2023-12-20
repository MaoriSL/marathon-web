
@extends('templates.app')

@section('content')
    <div>
        <h1>{{ $histoire->titre }}</h1>
        <p>{{ $histoire->pitch }}</p>
        <img src="{{ Storage::url($histoire->photo) }}" alt="image histoire">
        <p>Author: {{ $histoire->user->name }}</p>
        <p>Genre: {{ $histoire->genre->name }}</p>
        <p>Number of completed readings: {{ $histoire->terminees->count() }}</p>
        <p>Number of positive reviews: {{ $histoire->avis->where('positive', true)->count() }}</p>
        @if(!empty($histoire->premier()->id))
            <a href="{{ route('chapitres.show', ['chapitre' => $histoire->premier()->id]) }}">Start Reading</a>
        @endif
    </div>

    <h3>Commentaires</h3>
    @foreach($histoire->avis as $avis)
        <div>
            <p>{{ $avis->contenu }}</p>
            <p>Posté le {{ $avis->created_at}}</p>
            <p>Posté par : {{$avis->user->name}}</p><br>
        </div>
    @endforeach


    <h3>Ajouter un commentaire</h3>
    @if(auth()->check())
    <form method="POST" action="{{ route('histoires.storeComment') }}">
        @csrf
        <label for="contenu">
            <textarea name="contenu"></textarea>
        </label>
        <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
        <button type="submit">Ajouter un commentaire</button>
    </form>
    @else
        <b>Vous devez être connecté pour ajouter un commentaire</b>
    @endif
@endsection