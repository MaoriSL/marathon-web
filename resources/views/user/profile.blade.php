@extends('templates.app')

@section('content')
    <h1>Mes favoris</h1>
    @if(count($favorites) > 0)
        @foreach($favorites as $favorite)
            <p><a href="{{ route('histoires.show', $favorite->id) }}">{{ $favorite->titre }}</a></p>
        @endforeach
    @else
        <p>Aucun favori trouvé</p>
    @endif

    <h1>Mes histoires</h1>
    @if(count($histoires) > 0)
        @foreach($histoires as $histoire)
            <p><a href="{{ route('histoires.show', $histoire->id) }}">{{ $histoire->titre }}</a></p>
        @endforeach
    @else
        <p>Aucune histoire trouvée</p>
    @endif

    <div>
        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('default_avatar.png') }}">
        <form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" accept="image/*">
            <button type="submit">Modifier l'avatar</button>
        </form>
        <form action="{{ route('profile.deleteAvatar') }}" method="POST">
            @csrf
            <button type="submit">Supprimer l'avatar</button>
        </form>
    </div>
@endsection