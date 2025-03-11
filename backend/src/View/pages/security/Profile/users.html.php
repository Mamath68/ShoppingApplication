<?php
	
	use App\Model\Entity\Users;
	
	/** @var Users $users */
?>


<h1>Liste des utilisateurs</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
		foreach( $users as $user ): ?>
            <tr>
                <th><?= $user->getId() ?></th>
                <td><?= $user->getName() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td>
                    <a href="/user/show/<?= $user->getId() ?>">Voir</a> |
                    <a href="/user/edit/<?= $user->getId() ?>">Modifier</a> |
                    <a href="/user/delete/<?= $user->getId() ?>"
                       onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                </td>
            </tr>
		<?php endforeach; ?>
    </tbody>
</table>
<a href="/register">Créer un utilisateur</a>
