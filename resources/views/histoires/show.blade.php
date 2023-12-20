
@extends('templates.app')

@section('content')
    <div>
        <h1>{{ $histoire->titre }}</h1>
        <p>{{ $histoire->pitch }}</p>
        <img src="{{ Storage::url($histoire->photo) }}">
        <p>Author: {{ $histoire->user->name }}</p>
        <p>Genre: {{ $histoire->genre->name }}</p>
        <p>Number of completed readings: {{ $histoire->terminees->count() }}</p>
        <p>Number of positive reviews: {{ $histoire->avis->where('positive', true)->count() }}</p>
        @if(!empty($histoire->premier()->id))
            <a href="{{ route('chapitres.show', ['chapitre' => $histoire->premier()->id]) }}">Start Reading</a>
        @endif
    </div>
@endsection