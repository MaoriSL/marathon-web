@extends('templates.app')

@section('content')
    <h1>Mes histoires</h1>
    @if($histoires)
        @foreach($histoires as $histoire)
            <p>{{ $histoire->titre }}</p>
        @endforeach
    @else
        <p>Aucune histoire trouvée</p>
    @endif

    <h1>Mes favoris</h1>
    @if(count($favorites) > 0)
        @foreach($favorites as $favorite)
            @if($favorite)
                <p>{{ $favorite->titre }}</p>
            @endif
        @endforeach
    @else
        <p>Aucun favori trouvé</p>
    @endif
@endsection