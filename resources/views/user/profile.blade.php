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
@endsection