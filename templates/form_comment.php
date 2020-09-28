<?php 

$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';
$this->session->show('add_comment'); 

?>

<form method="post" action="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()); ?>">
  <label for="pseudo">Pseudo</label>
  <input type="text" id="pseudo" name="pseudo">

  <label for="content">Message</label>
  <textarea id="content" name="content"></textarea>

  <input type="submit" value="Ajouter" id="submit" name="submit">
</form>