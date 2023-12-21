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

    {{-- Valide --}}
    <h2>Histoire</h2>
    <div>
        @if($histoire->active)
            <form method="POST" action="{{ route('histoires.makePrivate', $histoire->id) }}">
                @csrf
                <button type="submit">Rendre privée</button>
            </form>
        @else
            <form method="POST" action="{{ route('histoires.makePublic', $histoire->id) }}">
                @csrf
                <button type="submit">Rendre publique</button>
            </form>
        @endif
    </div>
    <h2>Chapitres</h2>
    @foreach($histoire->chapitres as $chapitre)
        <div>
            <h3>{{ $chapitre->titre }}</h3>
            <p>{{ $chapitre->texte }}</p>
            <p>{{ $chapitre->question }}</p>
        </div>
    @endforeach

    <h2>Ajouter un chapitre</h2>
    <form method="POST" action="{{route('chapitre.store', $histoire->id)}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="titre">
                <input type="text" name="titre" placeholder="Titre du chapitre">
            </label>
        </div>

        <div>
            <label for="titrecourt">
                <input type="text" name="titrecourt" placeholder="Titre court du chapitre">
            </label>
        </div>

        <div>
            <label for="text">
                <textarea type="text" name="text" placeholder="Texte du chapitre"></textarea>
            </label>
        </div>

        <div>
            <label for="question">
                <input type="text" name="question" placeholder="Question">
            </label>
        </div>

        <div>
            <label for="media">
                <input type="file" name="media" accept="image/*">
            </label>
        </div>

        <div>
            <label for="active">premier
                <input type="checkbox" name="active" value="1">
            </label>
        </div>
        <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
        <button type="submit">ajouter chapitre</button>
    </form>

    <h2>Lier les chapitres</h2>
    <form action="{{route('chapitres.link')}}" method="POST">
        @csrf
        <div>
            <label for="origin">
                <select name="chapitre_source_id">
                    <option value="All">Origin</option>
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}">{{ $chapitre->titrecourt }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div>
            <label for="dest">
                <select name="chapitre_destination_id">
                    <option value="All">Destination</option>
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}">{{ $chapitre->titrecourt }}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div>
            <label for="reponse">
                <input type="text" name="reponse" placeholder="Réponse">
            </label>
        </div>
        <button type="submit">lier</button>
    </form>
    <div>
        @foreach($chapitres as $link)
            @foreach($link->suivants as $suivant)
                <p>{{ $link->id }} : {{ $link->titrecourt }}</p>
                <p>{{ $suivant->pivot->reponse }}</p>
                <p>{{ $suivant->id }} : {{$suivant->titrecourt}}</p>
            @endforeach
        @endforeach
    </div>
@endsection