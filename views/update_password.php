<?php $this->title = "Modification mot de passe"; ?>

<main class="total-flex m-h">
    <h1 class="mb-4">Modifier le mot de passe</h1>
    <section class="grid grid-gap-40 login bg-white">

        <form method="post" id="form-login" action="/index.php?route=updatePassword" class="grid grid-gap-20">
            <div class="form-control grid grid-gap-10">
                <label for="password" class="form-control-label">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Jackcélère">
                <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            </div>
        </form>

        <section class="grid grid-gap-20 button-box">
            <input type="submit" value="ettre à jour" class="button-primary" id="submit" name="submit" form="form-login">
            <a href="/index.php" class="button-secondary">Accueil</a>
        </section>

    </section>
</main>