<?php use App\Core\SessionManager; ?>
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

</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<main class="container">
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="<?= SCRIPT_DIR ?>/script.js"></script>
</body>
</html>
