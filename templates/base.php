<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<title><?= $title ?>| </title>
	<link rel="stylesheet" href="/css/style.css">
	<link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="m-h">
	<header>
		<nav>
			<a href="/index.php">
				<i class='bx bx-md bx-cookie'></i>
			</a>


			<ul class="nav-link-items">
				<li>
					<a class="nav-link-item" href="/index.php?route=blog">Blog</a>
				</li>
				<?php if ($this->session->get('pseudo')) { ?>
					<?php if ($this->session->get('role') === 'admin') { ?>
						<li>
							<a class="nav-link-item" href="/index.php?route=administration">
								<i class='bx bx-cog bx-spin-hover'></i>
							</a>
						</li>
					<?php } ?>

					<li>
						<a class="nav-link-item" href="/index.php?route=profile">
							<i class='bx bx-user'></i>
						</a>
					</li>
					<li>
						<a class="nav-link-item" href="/index.php?route=logout">
							<i class='bx bx-log-in'></i>
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