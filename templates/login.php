<?php $this->title = "Connexion"; ?>
<?= $this->session->show('error_login'); ?>

<main class="wrapper-login total-flex m-h">
    <section class="grid grid-gap-40 login bg-white">
        <h1>Mon blog</h1>
        <a href="../public/index.php?route=register" class="button-secondary">Pas de compte ? Inscrivez-vous</a>
        <form method="post" id="form-login" action="../public/index.php?route=login" class="grid grid-gap-20">
            <div class="form-control grid grid-gap-10">
                <label for="pseudo" class="form-control-label">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Jackcélère">
            </div>
            <div class="form-control grid grid-gap-10">
                <label for="password" class="form-control-label">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********">
            </div>
        </form>
        <div class="grid grid-gap-20 button-box">
            <input type="submit" value="Connexion" class="button-primary" id="submit" name="submit" form="form-login">
            <a href="../public/index.php" class="button-secondary">Retour à l'accueil</a>
        </div>
    </section>
</main>