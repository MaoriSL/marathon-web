@extends('templates.app')

@section('content')
<div class="User-Info">
    <div class="User-Info-Photo">
        <img src="{{ asset('images/default.png') }}" alt="">
    </div>
    <div class="User-Info-Text">
        <h1>{{ $user->name }}</h1>
    </div>
</div>
<div class="profil-global">
    <div class="profil-grid">
        <div class="profil-fav">
            <div class="profil-h1">
                <h1>Mes favoris</h1>
            </div>
            @if(count($favorites) > 0)
            @foreach($favorites as $favorite)
            <div class="fav-hist">
                <div class="fav-titre">
                    <h1>
                        <a href="{{ route('histoires.show', $favorite->id) }}">{{ $favorite->titre }}</a>
                    </h1>
                </div>
                <!-- img -->
                <div class="fav-img">
                    <img src="@if($favorite->photo){{ Storage::url($favorite->photo) }} @else{{ asset('images/default.png') }}@endif" alt="">
                </div>
                <!-- titre -->
            </div>
            @endforeach
            @else
            <p>Aucun favori trouvé</p>
            @endif
        </div>
        <div class="profil">
            <div class="profil-h1">
                <h1>Mes histoires</h1>
            </div>
            @if(count($histoires) > 0)
            @foreach($histoires as $histoire)
            <div class="user-histoire">
                <div class="user-histoire-titre">
                    <h1><a href="{{ route('histoires.show', $histoire->id) }}">{{ $histoire->titre }}</a></h1>
                </div>
                <div class="user-histoire-img">
                    <img src="@if($histoire->photo){{ Storage::url($histoire->photo) }} @else{{ asset('images/default.png') }}@endif" alt="">
                </div>
            </div>
            @endforeach
            @else
            <p>Aucune histoire trouvée</p>
            @endif
        </div>
    </div>
</div>
@endsection