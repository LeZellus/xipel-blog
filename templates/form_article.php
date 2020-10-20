<?php
$route = isset($article) && $article->getId() ? 'editArticle&articleId=' . $article->getId() : 'addArticle';
$submit = $route === 'addArticle' ? 'Ajouter' : 'Mettre à jour';
$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';
$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : '';
$author = isset($article) && $article->getAuthor() ? htmlspecialchars($article->getAuthor()) : '';
$chapo = isset($article) && $article->getChapo() ? htmlspecialchars($article->getChapo()) : '';
$thumb = isset($article) && $article->getThumb() ? htmlspecialchars($article->getThumb()) : 'Choisir une image';
?>

<form method="post" action="/index.php?route=<?= $route; ?>" class="grid grid-gap-20" id="form-add-article" enctype="multipart/form-data">
  <div class="form-control grid grid-gap-10">
    <label for="title" class="form-control-label">Titre</label>
    <input type="text" id="title" name="title" value="<?= $title; ?>">
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
  </div>

  <div class="form-control grid grid-gap-10">
    <label for="chapo" class="form-control-label">Description</label>
    <input type="text" id="chapo" name="chapo" value="<?= $chapo; ?>">
    <?= isset($errors['chapo']) ? $errors['chapo'] : ''; ?>
  </div>

  <div class="form-control grid grid-gap-10">
    <label for="content" class="form-control-label">Contenu</label>
    <textarea id="content" name="content"><?= $content; ?></textarea>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
  </div>

  <div class="form-control grid grid-gap-10">
    <label for="thumb" class="form-control-label">Image d'entête</label>
    <input type="file" id="thumb" name="thumb" value="<?= $thumb; ?>">
    <?= isset($errorsThumb['name']) ? $errorsThumb['name'] : ''; ?>
  </div>
</form>

<div class="grid grid-gap-20 button-box">
  <input type="submit" value="<?= $submit; ?>" id="submit" name="submit" form="form-add-article" class="button-primary">
  <a href="/index.php" class="button-secondary">Accueil</a>
</div>