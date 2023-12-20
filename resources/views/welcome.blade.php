@extends("templates.app")

@section('content')
    @foreach($histoires as $histoire)
            <a href="{{ route('histoires.show', $histoire->id) }}">
                    <img src="{{ $histoire->photo }}" alt="{{ $histoire->titre }}">
                    <p>{{ $histoire->titre }}</p>
            </a>
    @endforeach

    @foreach($genres as $genre)
        <a href="{{route('histoires.indexGenre', $genre->id)}}"><p>{{ $genre->label }}</p></a>
    @endforeach

@endsection