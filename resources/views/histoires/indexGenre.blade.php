@extends("templates.app")

@section('content')


@foreach($histoires as $histoire)
<div>
    <a href="{{route('histoires.show',$histoire->id)}}">
        <h3>{{ $histoire->titre }}</h3>
    </a>
    <p>{{ $histoire->pitch }}</p>
    <img src="
    @if($histoire->photo)
    {{ Storage::url($histoire->photo) }}
    @else
    {{ asset('images/default.png') }}
    @endif
    " alt="">
</div>
@endforeach
<h2>{{ $genre->label }}</h2>

@endsection