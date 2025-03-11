<?php
	
	use App\Core\SessionManager;

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?= /** @var string $title */
				$title ?? 'Mon Framework PHP' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= STYLE_DIR ?>/style.css">

    <!-- UIkit JS -->
</head>
<body class="d-flex flex-column vh-100">
<header>
    <nav class="navbar bg-secondary navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/"><?= $title ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?= $title ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link <?php echo( $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ); ?>"
                               aria-current="page" href="/">Home</a>
                        </li>
						<?php if( SessionManager::isAdmin() ): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo( $_SERVER['REQUEST_URI'] == '/users' ? 'active' : '' ); ?>"
                                   aria-current="page" href="/users">Les Utilisateurs</a>
                            </li>
						<?php endif; ?>
                    </ul>
                    <div>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
							<?php if( SessionManager::isLoggedIn() ): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
										<?= SessionManager::getUser()->getName() ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="/user/show/<?= SessionManager::getUser()->getId() ?>">Profile</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form method="POST" action="/logout">
                                                <button class="dropdown-item">Deconnecter</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
							<?php else: ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        Connectique
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/loginForm">Login</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/registerForm">Register</a></li>
                                    </ul>
                                </li>
							<?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>

<main class="flex-grow-1 container">
	<?php
		if( $success = SessionManager::get( 'success' ) ): ?>
            <div class="alert alert-success">
				<?= $success; ?>
            </div>
			<?php SessionManager::remove( 'success' ); ?>
		<?php endif;
		if( $error = SessionManager::get( 'error' ) ): ?>
            <div class="alert alert-waring">
				<?= $error; ?>
            </div>
			<?php SessionManager::remove( 'error' ); ?>
		<?php endif;
		/** @var mixed $content */ ?>
	<?= $content ?>
</main>

<footer class="bg-secondary">
    <div class="container p-4">
        <p class="text-black">© 2025 - Projet Expo x PHP</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="<?= SCRIPT_DIR ?>/script.js"></script>
</body>
</html>
