@extends('templates.app')

@section('content')
    @foreach($histoires as $histoire)
        <a href="{{ route('histoires.show', $histoire->id) }}">
            <div>
                <img src="{{ $histoire->photo }}" alt="{{ $histoire->titre }}">
                <p>{{ $histoire->titre }}</p>
            </div>
        </a>
    @endforeach
@endsection