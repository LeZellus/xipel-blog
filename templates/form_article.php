<?php
$route = isset($article) && $article->getId() ? 'editArticle&articleId=' . $article->getId() : 'addArticle';
$submit = $route === 'addArticle' ? 'Ajouter' : 'Mettre à jour';
$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';
$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : '';
$author = isset($article) && $article->getAuthor() ? htmlspecialchars($article->getAuthor()) : '';
$chapo = isset($article) && $article->getChapo() ? htmlspecialchars($article->getChapo()) : '';
?>

<form method="post" action="/index.php?route=<?= $route; ?>">
  <label for="title">Titre</label>
  <input type="text" id="title" name="title" value="<?= $title; ?>">
  <?= isset($errors['title']) ? $errors['title'] : ''; ?>

  <label for="content">Contenu</label>
  <textarea id="content" name="content"><?= $content; ?></textarea>
  <?= isset($errors['content']) ? $errors['content'] : ''; ?>

  <label for="chapo">Description</label>
  <input type="text" id="chapo" name="chapo" value="<?= $chapo; ?>">
  <?= isset($errors['chapo']) ? $errors['chapo'] : ''; ?>

  <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>