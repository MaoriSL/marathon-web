@extends("templates.app")

@section('content')


@foreach($histoires as $histoire)
<div>
    <a href="{{route('histoires.show',$histoire->id)}}">
        <h3>{{ $histoire->titre }}</h3>
    </a>
    <p>{{ $histoire->pitch }}</p>
    <p>{{ $histoire->user->name }}</p>
</div>
@endforeach
<h2>{{ $genre->label }}</h2>

@endsection