@extends("templates.app")

@section('content')
<div class="main">
    <form action="{{route("register")}}" method="post" class="login">
        @csrf
        <div class="title">
            <h2>Inscription</h2>
        </div>
        <div class="name">
            <h3>Nom</h3>
            <input type="text" name="name" required placeholder="Name" /><br />
        </div>
        <div class="email">
            <h3>Email</h3>
            <input type="email" name="email" required placeholder="Email" /><br />
        </div>
        <div class="password">
            <h3>Mot de Passe</h3>
            <input type="password" name="password" required placeholder="password" /><br />
        </div>
        <div class="password">
            <h3>Confirmation du mot de passe</h3>
            <input type="password" name="password_confirmation" required placeholder="password" /><br />
        </div>
        <div class="remember">
            <label for="remember">J’accepte, en créant un compte, les conditions générales d’utilisation</label>
            <input type="checkbox" name="remember" id="remember" />
        </div>
        <div class="submit">
            <input type="submit">
        </div>
        <p style="text-align: center;">Déjà un compte ? <a href="{{route("login")}}">Connectez vous</a></p>
    </form>
</div>
@endsection