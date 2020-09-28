<?php $this->title = 'Article'; ?>
<h1>Article</h1>
<p>En construction</p>
<div>
    <h2><?= htmlspecialchars($article->getTitle()); ?></h2>
    <p><?= htmlspecialchars($article->getContent()); ?></p>
    <p><?= htmlspecialchars($article->getAuthor()); ?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></p>
</div>

<?php if ($this->session->get('role') === 'admin') { ?>
    <div class="actions">
        <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
    </div>
<?php } ?>

<a href="../public/index.php">Retour à l'accueil</a>