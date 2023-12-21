@extends('templates.app')

@section('content')
    <div>
        <h1>{{ $chapitre->titrecourt }}</h1>
        <p>{{ $chapitre->texte }}</p>
        <img src="{{ $chapitre->media }}">
        <p>{{ $chapitre->question }}</p>
        <h1>{{ $chapitre->titre }}</h1>
        <div>{!! $chapitre->texte_html !!}</div>

    @foreach($chapitre->suivants as $suivant)

        @endforeach
    </div>
@endsection