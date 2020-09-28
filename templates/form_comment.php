<?php
$author = isset($article) && $article->getAuthor() ? htmlspecialchars($article->getAuthor()) : '';
?>
<form method="post" action="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()); ?>">
  <label for="pseudo">Pseudo</label><br>
  <input type="text" id="pseudo" name="pseudo" value="<?= $author ?>"><br>
  <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
  <label for="content">Message</label><br>
  <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea><br>
  <?= isset($errors['content']) ? $errors['content'] : ''; ?>
  <input type="submit" value="Ajouter un commentaire" id="submit" name="submit">
</form>