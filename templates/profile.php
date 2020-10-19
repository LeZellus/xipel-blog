<?php $this->title = 'Mon profil'; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <h2><?= $this->session->get('pseudo'); ?></h2>
    <p><?= $this->session->get('id'); ?></p>
    <a href="/index.php?route=updatePassword">Modifier son mot de passe</a>
    <a href="/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<br>
<a href="/index.php">Retour à l'accueil</a>