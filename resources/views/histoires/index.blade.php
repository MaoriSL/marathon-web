@extends('templates.app')

@section('content')
<div class="global-grid">
    @foreach($histoires as $histoire)
    <div class="Histoire">
        <a href="{{ route('histoires.show', $histoire->id) }}">
            <div>
                <img src="{{ Storage::url($histoire->photo) }}">
            </div>
        </a>
        <div class="Histoire-Info">
            <div class="titre-note">
                <div class="titre">
                    <h3>{{ $histoire->titre }}</h3>
                </div>
            </div>
            @auth
            <div class="desc">
                <p>{{$histoire->pitch}}</p>
            </div>
            @endauth
            <div class="Histoire-genre">
                <p>#{{ $histoire->genre["label"]}}</p>
            </div>

        </div>

    </div>

    @endforeach
    @endsection