<?php $this->title = "Inscription"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=register">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>

        <label for="firstName">Prénom</label><br>
        <input type="text" id="firstName" name="firstName"><br>
        <?= isset($errors['firstName']) ? $errors['firstName'] : ''; ?>

        <label for="lastName">Nom</label><br>
        <input type="text" id="lastName" name="lastName"><br>
        <?= isset($errors['lastName']) ? $errors['lastName'] : ''; ?>

        <label for="email">Email</label><br>
        <input type="text" id="email" name="email"><br>
        <?= isset($errors['email']) ? $errors['email'] : ''; ?>

        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>

        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>