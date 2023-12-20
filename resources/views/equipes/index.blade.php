<x-layout>
<h1>{{ $equipes['nomEquipe'] }}</h1>
<img src="{{ $equipes['logo'] }}" alt="Logo de l'équipe">
<p>{{ $equipes['slogan'] }}</p>
<p>{{ $equipes['localisation'] }}</p>

<h2>Membres de l'équipe</h2>
<ul>
    @foreach($equipes['membres'] as $membre)
        <li>
            <img src="{{ $membre['image'] }}" alt="Image de {{ $membre['prenom'] }} {{ $membre['nom'] }}">
            <h3>{{ $membre['prenom'] }} {{ $membre['nom'] }}</h3>
            <p>Fonctions : {{ implode(', ', $membre['fonctions']) }}</p>
        </li>
    @endforeach
</ul>

<p>{{ $equipes['autres'] }}</p>
</x-layout>