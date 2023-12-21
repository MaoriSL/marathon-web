@extends('templates.app')  {{-- Assurez-vous d'ajuster le nom du layout selon votre configuration --}}

@section('content')
    <h1>Test Markdown</h1>
    <div>{!! $htmlText !!}</div>
@endsection