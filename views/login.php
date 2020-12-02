<?php $this->title = "Connexion"; ?>

<main class="total-flex m-h">
    <h1 class="mb-4">Connexion</h1>
    <section class="grid grid-gap-40 login bg-white">

        <a href="/index.php?route=register" class="button-secondary">Pas de compte ? Inscrivez-vous</a>

        <form method="post" id="form-login" action="/index.php?route=login" class="grid grid-gap-20">
            <div class="form-control grid grid-gap-10">
                <label for="pseudo" class="form-control-label">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Jackcélère">
            </div>
            <div class="form-control grid grid-gap-10">
                <label for="password" class="form-control-label">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********">
            </div>
        </form>

        <?php if($this->session->show('error_login')){ ?>
            <p class="error-text">
                <?php echo $this->session->show('error_login'); ?>
            </p>
        <?php } ?>

        <section class="grid grid-gap-20 button-box">
            <input type="submit" value="Connexion" class="button-primary" id="submit" name="submit" form="form-login">
            <a href="/index.php" class="button-secondary">Accueil</a>
        </section>

    </section>
</main>