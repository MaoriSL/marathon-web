@extends('templates.app')

@section('content')
    <div>
        <h1>{{ $chapitre->titrecourt }}</h1>
        <p>{{ $chapitre->texte }}</p>
        <img src="{{ $chapitre->media }}">
        <p>{{ $chapitre->question }}</p>
    </div>
@endsection