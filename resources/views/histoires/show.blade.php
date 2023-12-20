@extends('templates.app')

@section('content')
<div>
    <h1>{{ $histoire->titre }}</h1>
    @auth
    @if($isFavorite)
    <form method="POST" action="{{ route('favoris.remove', $histoire->id) }}">
        @csrf
        <button type="submit" style="background: none; border: none; padding: 0; color: #e3342f;">
            ❤️
        </button>
    </form>
    @else
    <form method="POST" action="{{ route('favoris.add', $histoire->id) }}">
        @csrf
        <button type="submit" style="background: none; border: none; padding: 0; color: #e3342f;">
            🤍
        </button>
    </form>
    @endif
    @endauth
    <p>{{ $histoire->pitch }}</p>
    <img src="{{ Storage::url($histoire->photo) }}">
    <p>Author: <a href="{{ route('user.show', $histoire->user->id) }}">{{ $histoire->user->name }}</a></p>
    <p>Genre: {{ $histoire->genre->name }}</p>
    <p>Number of completed readings: {{ $histoire->terminees->count() }}</p>
    <p>Number of positive reviews: {{ $histoire->avis->where('positive', true)->count() }}</p>
    @if(!empty($histoire->premier()->id))
    <a href="{{ route('chapitres.show', ['chapitre' => $histoire->premier()->id]) }}">Start Reading</a>
    @endif
</div>
@endsection