<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<title><?= $title ?> • Xipel, de l'imagination à la conception d'un jeu.</title>
	<meta name="description" content="Voici un exemple de description, elle est encore un peu courte mais va surement changer dans les prochains jours. Elle permet d&#x27;écrire une description" />
	<link rel="stylesheet" href="/css/style.css">
</head>

<body class="m-h">
	<header>
		<nav>
			<a href="/index.php">
				<img src="uploads/LeZellus.gif" alt="Logo de Mathéo en Pixel art" class="logo logo-nav">
			</a>


			<ul class="nav-link-items" id="nav-link-items">
				<li>
					<a class="nav-link-item" href="/index.php?route=blog">
						Blog
					</a>
				</li>
				<?php if ($this->session->get('pseudo')) { ?>
					<?php if ($this->session->get('role') === 'admin') { ?>
						<li>
							<a class="nav-link-item" href="/index.php?route=administration">
								<img src="/icons/cog.svg" alt="Icon engrenage" class="icon">
								Admin
							</a>
						</li>
					<?php } ?>

					<li>
						<a class="nav-link-item" href="/index.php?route=profile">
							<img src="/icons/user.svg" alt="Icon utilisateur" class="icon">
							Profil
						</a>
					</li>
					<li>
						<a class="nav-link-item" href="/index.php?route=logout">
							<img src="/icons/logout.svg" alt="Icon déconnexion" class="icon">
							Déconnexion
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

			<div class="nav-burger" id="nav-burger">
				<div class="nav-burger-bar"></div>
				<div class="nav-burger-bar"></div>
			</div>
		</nav>
	</header>

	<?= $content ?>

	<footer>
		<script src="https://cdn.tiny.cloud/1/rw78ruup0slekfnq1t5ss54hodg15wxelpobpasmfafy88c3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script src="/js/app.js"></script>
	</footer>
</body>

</html>