@extends("templates.app")

@section('content')


    <h2>{{ $genre->label }}</h2>
    @foreach($histoires as $histoire)
        <div>
            <h3>{{ $histoire->titre }}</h3>
            <p>{{ $histoire->pitch }}</p>
            <p>{{ $histoire->user->name }}</p>
        </div>
    @endforeach

@endsection