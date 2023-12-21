@extends("templates.app")

@section('content')
<div class="main">

    <form action="{{route("login")}}" method="post" class="login">
        @csrf
        <div class="title">
            <h2>Connexion</h2>
        </div>
        <div class="email">
            <h3>Email</h3>
            <input type="email" name="email" required placeholder="Email" /><br />
        </div>
        <div class="password">
            <div class="mdp">
                <h3>Mot de Passe</h3>
                <p href="#">Mot de passe oublié ?</p>
            </div>
            <input type="password" name="password" required placeholder="password" /><br />
        </div>
        <div class="remember">
            <p>Se souvenir de moi</p>
            <input type="checkbox" name="remember" id="remember" />
        </div>
        <div class="submit">
            <input type="submit">
        </div>
    </form>
</div>
@endsection