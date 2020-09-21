<?php $this->title = "Accueil"; ?>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('update_password'); ?>
<?= $this->session->show('delete_account'); ?>

<h1>App Retour</h1>
<p>En construction</p>

<?php
if ($this->session->get('pseudo')) {
?>
    <a href="../public/index.php?route=logout">Déconnexion</a>
    <a href="../public/index.php?route=profile">Profil</a>
    <?php if ($this->session->get('role') === 'admin') { ?>
        <a href="../public/index.php?route=administration">Administration</a>
        <a href="../public/index.php?route=addArticle">Ajouter un article</a>
    <?php } ?>
<?php
} else {
?>
    <a href="../public/index.php?route=register">Inscription</a>
    <a href="../public/index.php?route=login">Connexion</a>
<?php
}
?>