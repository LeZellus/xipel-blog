<?php $this->title = "Inscription"; ?>
<main class="total-flex m-h">
    <h1 class="mb-4">Inscription</h1>
    <section class="grid grid-gap-40 register bg-white">
        <a href="/index.php?route=login" class="button-secondary">Déjà inscrit? Connectez-vous</a>
        <form id="form-register" method="post" class="grid grid-gap-20" action="/index.php?route=register">
            <div class="form-control grid grid-gap-10">
                <label for="pseudo" class="form-control-label">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Jackcélère">
                <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
            </div>

            <div class="form-control grid grid-gap-10">
                <label for="firstName" class="form-control-label">Prénom</label>
                <input type="text" id="firstName" name="firstName" placeholder="Jack">
                <?= isset($errors['firstName']) ? $errors['firstName'] : ''; ?>
            </div>

            <div class="form-control grid grid-gap-10">
                <label for="lastName" class="form-control-label">Nom</label>
                <input type="text" id="lastName" name="lastName" placeholder="Pot">
                <?= isset($errors['lastName']) ? $errors['lastName'] : ''; ?>
            </div>

            <div class="form-control grid grid-gap-10">
                <label for="email" class="form-control-label">Email</label>
                <input type="text" id="email" name="email" placeholder="jackpot@exemple.fr">
                <?= isset($errors['email']) ? $errors['email'] : ''; ?>
            </div>

            <div class="form-control grid grid-gap-10">
                <label for="password" class="form-control-label">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********">
                <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            </div>

        </form>
        <div class="grid grid-gap-20 button-box">
            <input type="submit" value="Inscription" id="submit" class="button-primary" form="form-register" name="submit">
            <a href="/index.php" class="button-secondary">Retour à l'accueil</a>
        </div>

    </section>
</main>