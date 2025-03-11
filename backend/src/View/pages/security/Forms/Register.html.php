<h1>Créer un utilisateur</h1>

<form method="POST" action="/register">
    <div class="form-group mb-3">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" required class="form-control"/>
    </div>

    <div class="form-group mb-3">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required class="form-control"/>
    </div>

    <div class="form-group mb-3">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required class="form-control"/>
    </div>

    <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
    <h3> Déjà un compte ?
        <a href="/loginForm">Connectez-vous !</a>
    </h3>
</form>
