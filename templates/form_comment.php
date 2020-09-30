<?php

$author = $this->session->get('pseudo');

?>

<form method="post" action="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()); ?>">
  
  <?php if (!$this->session->get('pseudo')) {?>

    <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo" value="">
    <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>

  <?php } else { ?>

    <div style="display: none;">
      <input type="text" id="pseudo" name="pseudo" value="<?= $author ?>">
      <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    </div>

  <?php } ?>

  <label for="content">Message</label>
  <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea>
  <?= isset($errors['content']) ? $errors['content'] : ''; ?>

  <input type="submit" value="Ajouter un commentaire" id="submit" name="submit">
</form>