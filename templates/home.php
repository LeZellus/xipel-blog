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
<a href="../public/index.php?route=blog">Blog</a>


<?php
foreach ($articles as $article) {
?>
    <div>
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>"><?= htmlspecialchars($article->getTitle()); ?></a></h2>
        <p>Description : <?= htmlspecialchars($article->getChapo()); ?></p>
        <p><?= htmlspecialchars($article->getAuthor()); ?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></p>
        <p>Modifié le : <?= htmlspecialchars($article->getUpdatedAt()); ?></p>
    </div>
    <br>
<?php
}
?>