<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<title><?= $title ?></title>
	<link rel="stylesheet" href="../public/css/style.css">
	<link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
	<header>
		<nav>
			
			<?php
			if ($this->session->get('pseudo')) {
			?>
				<a href="../public/index.php?route=logout">Déconnexion</a>
				<a href="../public/index.php?route=profile">Profil</a>
				<?php if ($this->session->get('role') === 'admin') { ?>
					<a href="../public/index.php?route=administration">Administration</a>
				<?php } ?>
			<?php
			} else {
			?>
				<a href="../public/index.php?route=register">Inscription</a>
				<a href="../public/index.php?route=login">Connexion</a>
			<?php
			}
			?>
			<a href="../public/index.php?route=blog">Blog</a>
		</nav>
	</header>

	<?= $content ?>
</body>

</html>