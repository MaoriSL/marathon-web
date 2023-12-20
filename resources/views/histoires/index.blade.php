@extends('templates.app')

@section('content')
    @foreach($histoires as $histoire)
        <a href="{{ route('histoires.show', $histoire->id) }}">
            <div>
                <img src="{{ Storage::url($histoire->photo) }}">
                <p>{{ $histoire->titre }}</p>
            </div>
        </a>
    @endforeach
@endsection