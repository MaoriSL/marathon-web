@extends("templates.app")

@section('content')
    <div style="display: flex;align-items: center; justify-content: center">
        <div>
            <b>Le marathon du WEB 2023 !!!</b>
        </div>
    </div>

    @foreach($genres as $genre)
        <a href="{{route('histoires.indexGenre', $genre->id)}}"><p>{{ $genre->label }}</p></a>
    @endforeach

@endsection