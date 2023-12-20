@extends('templates.app')

@section('content')
    <h1>{{ $user->name }}</h1>

    <h2>Histoires</h2>
    @if($histoires && count($histoires) > 0)
        @foreach($histoires as $histoire)
            <p><a href="{{ route('histoires.show', $histoire->id) }}">{{ $histoire->titre }}</a></p>
        @endforeach
    @else
        <p>Aucune histoire</p>
    @endif
@endsection