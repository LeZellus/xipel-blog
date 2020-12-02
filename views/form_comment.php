<?php

$author = $this->session->get('pseudo');

?>

<form method="post" action="/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()); ?>" class="grid grid-gap-20" id="form-add-comment">

  <?php if (!$this->session->get('pseudo')) { ?>

    <div class="form-control grid grid-gap-10">
      <label for="pseudo" class="form-control-label">Pseudo</label>
      <input type="text" id="pseudo" name="pseudo" value="">
      <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    </div>

  <?php } else { ?>

    <div style="display: none;">
      <input type="text" id="pseudo" name="pseudo" value="<?= $author ?>">
      <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    </div>

  <?php } ?>

  <div class="form-control grid grid-gap-10">
    <label for="content" class="form-control-label">Message :</label>
    <textarea id="content" name="content" class="comment"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
  </div>

  <div>
    <input type="submit" value="Ajouter un commentaire" id="submit" name="submit" form="form-add-comment" class="button-primary">
  </div>
</form>