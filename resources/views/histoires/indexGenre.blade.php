@extends("templates.app")

@section('content')
<div class="global-filmGenre">
    <h2>{{ $genre->label }}</h2>
    <div class="grid-filmGenre">
        @foreach($histoires as $histoire)
        <div class="FilmGenre">
            <div class="img">
                <img src="
                @if($histoire->photo)
                {{ Storage::url($histoire->photo) }}
                @else
                {{ asset('images/default.png') }}
                @endif
                " alt="">
            </div>
            <div class="link">
                <a href="{{route('histoires.show',$histoire->id)}}">
                    Regarde cette histoire
                </a>
            </div>
            <h3>{{ $histoire->titre }}</h3>
            </a>
            <p>{{ $histoire->pitch }}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection