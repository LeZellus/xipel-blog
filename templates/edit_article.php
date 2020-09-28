<?php $this->title = "Modifier l'article"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
  <form method="post" action="../public/index.php?route=editArticle&articleId=<?= htmlspecialchars($article->getId()); ?>">
    <label for="title">Titre</label>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($article->getTitle()); ?>">

    <label for="content">Contenu</label>
    <textarea id="content" name="content"><?= htmlspecialchars($article->getContent()); ?></textarea>

    <label for="author">Auteur</label>
    <input type="text" id="author" name="author" value="<?= htmlspecialchars($article->getAuthor()); ?>">

    <label for="chapo">Chapo</label>
    <input type="text" id="chapo" name="chapo" value="<?= htmlspecialchars($article->getChapo()); ?>">

    <input type="submit" value="Mettre à jour" id="submit" name="submit">
  </form>
  <a href="../public/index.php">Retour à l'accueil</a>
</div>