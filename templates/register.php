<?php $this->title = "Inscription"; ?>
<main class="wrapper-register bg-white">
    <section class="grid grid-gap-40">
        <h1>Inscription</h1>

        <form method="post" class="grid grid-gap-20" action="../public/index.php?route=register">
            <div class="form-control grid grid-gap-10">
                <label for="pseudo" class="form-control-label">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo">
                <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
            </div>
            <div class="form-control grid grid-gap-10">
                <label for="firstName" class="form-control-label">Prénom</label>
                <input type="text" id="firstName" name="firstName">
                <?= isset($errors['firstName']) ? $errors['firstName'] : ''; ?>
            </div>
            <div class="form-control grid grid-gap-10">
                <label for="lastName" class="form-control-label">Nom</label>
                <input type="text" id="lastName" name="lastName">
                <?= isset($errors['lastName']) ? $errors['lastName'] : ''; ?>
            </div>
            <div class="form-control grid grid-gap-10">
                <label for="email" class="form-control-label">Email</label>
                <input type="text" id="email" name="email">
                <?= isset($errors['email']) ? $errors['email'] : ''; ?>
            </div>
            <div class="form-control grid grid-gap-10">
                <label for="password" class="form-control-label">Mot de passe</label>
                <input type="password" id="password" name="password">
                <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            </div>

            <div class="form-control">
                <input type="submit" value="Inscription" id="submit" name="submit">
            </div>
        </form>
        <a href="../public/index.php">Retour à l'accueil</a>
    </section>
</main>