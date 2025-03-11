<h1>Se Connecter</h1>

<form method="POST" action="/login">
    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required/>
    </div>
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required/>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <h3> Pas encore de compte ?
        <a href="/registerForm">Inscrivez-vous !</a>
    </h3>
</form>
