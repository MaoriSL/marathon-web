@extends('templates.app')


@section('content')
<!-- <img src="/~but23_groupe8/images/logo.jpg" alt="Logo de l'entreprise"> -->
<div class="Info-equpes">
    <h1>{{ $equipes['nomEquipe'] }}</h1>
    <img src="/~but23_groupe8/images/equipe/{{ $equipes['logo'] }}" alt="Logo de l'équipe">
    <p>{{ $equipes['slogan'] }}</p>
    <p>{{ $equipes['localisation'] }}</p>
</div>
<div class="Membres">

    <h2>Membres de l'équipe</h2>
    <ul>
        <div class="Grid-Membres">

            @foreach($equipes['membres'] as $membre)
            <div class="Membres-Infos">

                <li>
                    <img src="/~but23_groupe8/images/equipe/{{ $membre['image'] }}" alt="Image de {{ $membre['prenom'] }} {{ $membre['nom'] }}">
                    <h3>{{ $membre['prenom'] }} {{ $membre['nom'] }}</h3>
                    <p>Fonctions : {{ implode(', ', $membre['fonctions']) }}</p>
                </li>
            </div>
            @endforeach
        </div>
    </ul>

    <p>{{ $equipes['autres'] }}</p>
</div>
@endsection