<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<title><?= $title ?>| </title>
	<link rel="stylesheet" href="/css/style.css">
</head>

<body class="m-h">
	<header>
		<nav>
			<a href="/index.php">
				<img src="uploads/LeZellus.gif" alt="Logo de Mathéo en Pixel art" class="logo logo-nav">
			</a>


			<ul class="nav-link-items">
				<li>
					<a class="nav-link-item" href="/index.php?route=blog">Blog</a>
				</li>
				<?php if ($this->session->get('pseudo')) { ?>
					<?php if ($this->session->get('role') === 'admin') { ?>
						<li>
							<a class="nav-link-item" href="/index.php?route=administration">
								<img src="/icons/cog.svg" alt="Icon engrenage" class="icon">
							</a>
						</li>
					<?php } ?>

					<li>
						<a class="nav-link-item" href="/index.php?route=profile">
							<img src="/icons/user.svg" alt="Icon utilisateur" class="icon">
						</a>
					</li>
					<li>
						<a class="nav-link-item" href="/index.php?route=logout">
							<img src="/icons/logout.svg" alt="Icon déconnexion" class="icon">
						</a>
					</li>
				<?php } else { ?>
					<li>
						<a class="nav-link-item" href="/index.php?route=register">Inscription</a>
					</li>
					<li>
						<a class="nav-link-item" href="/index.php?route=login">Connexion</a>
					</li>
				<?php } ?>
			</ul>
		</nav>
	</header>

	<?= $content ?>
</body>

</html>