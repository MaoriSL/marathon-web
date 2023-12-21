@extends('templates.app')

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @auth
    <form action="{{route('histoires.store')}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div >
            <h3>Ajout d'une Histoire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            {{-- Titre --}}
            <label for="titre"><strong>Titre : </strong></label>
            <input type="text" name="titre" id="titre" value="{{ old('title') }}">
        </div>

        <div>
            {{-- Pitch --}}
            <label for="pitch"><strong>Pitch :</strong></label>
            <textarea name="pitch" id="pitch" placeholder="Pitch..">{{ old('pitch') }}</textarea>
        </div>

        <div>
            {{-- Genre --}}
            <label for="genre"><strong>Genre :</strong></label>
            <select name="genre_id" id="genre">
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->label }}</option>
                @endforeach
            </select>
        </div>

        {{-- Ajoutez le champ user_id avec la valeur de l'utilisateur connecté --}}
        <input type="hidden" name="user_id" value="{{Auth::id()}}">

        <input type="hidden" name="active" value="0">
        <div>
            {{-- Photo --}}
            <label for="photo"><strong>Photo :</strong></label>
            <input type="file" name="photo" accept="image/*">
        </div>

        {{-- Valide --}}
        <div>
            <label for="active"><strong>Publique :</strong></label>
            <input type="checkbox" name="active" id="active" value="1">
        </div>
        <div>
            <button type="submit">Valider</button>
        </div>
    </form>
    @endauth
@endsection