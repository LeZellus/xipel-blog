<?php $this->title = "Nouvel article"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=addArticle">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title">

        <label for="content">Contenu</label>
        <textarea id="content" name="content"></textarea>

        <label for="author">Auteur</label>
        <input type="text" id="author" name="author">

        <label for="chapo">Chapo</label>
        <input type="text" id="chapo" name="chapo">

        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>