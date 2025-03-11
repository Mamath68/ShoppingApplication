<?php
	
	use App\Model\Entity\Users;
	
	/** @var Users $user */
?>
<h1>Modifier l'utilisateur</h1>
<form method="POST">
    <div class="form-group mb-3">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="<?= $user->getName() ?>" required class="form-control"/>
    </div>

    <div class="form-group mb-3">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?= $user->getEmail() ?>" required class="form-control"/>
    </div>

    <div class="form-group mb-3">
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" class="form-control"/>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
<a href="/users">Retour</a>
