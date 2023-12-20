@extends("templates.app")

@section('content')
        <div style="display: flex;align-items: center; justify-content: center">
                <div>
                        <b>Le marathon du WEB 2023 !!!</b>
                </div>
        </div>

        @foreach($histoires as $histoire)
                <a href="{{ route('histoire.show', $histoire->id) }}">
                        <img src="{{ $histoire->photo }}" alt="{{ $histoire->titre }}">
                        <p>{{ $histoire->titre }}</p>
                </a>
        @endforeach
@endsection