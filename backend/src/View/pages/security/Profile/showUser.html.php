<?php
	
	use App\Model\Entity\Users;
	
	/** @var Users $user */
?>
<h1>Détails de l'utilisateur</h1>
<p>ID : <?= $user->getId() ?></p>
<p>Nom : <?= $user->getName() ?></p>
<p>Email : <?= $user->getEmail() ?></p>
<a href="/user/edit/<?= $user->getId() ?>">Modifier</a>
<a href="/users">Retour à la liste</a>
