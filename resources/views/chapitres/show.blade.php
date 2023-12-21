@extends('templates.app')

@section('content')
    <div>
        <h1>{{ $chapitre->titre }}</h1>
        <h1>{{ $chapitre->titrecourt }}</h1>
        <div>{!! $chapitre->texte_html !!}</div>
        <img src="{{ $chapitre->media }}">
        <p>{{ $chapitre->question }}</p>
        @foreach($chapitre->suivants as $suivant)
            <a href="{{ route('chapitres.show', $suivant->id) }}">{{ $suivant->pivot->reponse }}</a>
        @endforeach
    </div>
@endsection