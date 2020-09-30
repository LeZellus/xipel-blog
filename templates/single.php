<?php $this->title = 'Article'; ?>

<?= $this->session->show('edit_article'); ?>

<h1>Article</h1>
<p>En construction</p>
<div>
    <h2><?= htmlspecialchars($article->getTitle()); ?></h2>
    <p><?= htmlspecialchars($article->getContent()); ?></p>
    <p><?= htmlspecialchars($article->getAuthor()); ?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></p>
    <p>Modifié le : <?= htmlspecialchars($article->getUpdatedAt()); ?></p>
</div>

<?php if ($this->session->get('role') === 'admin') { ?>
    <div class="actions">
        <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
        <a href="../public/index.php?route=removeArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
    </div>
<?php } ?>

<a href="../public/index.php">Retour à l'accueil</a>

<div>
    <h3>Ajouter un commentaire</h3>
    <?php include 'form_comment.php'; ?>
    <h3>Commentaires</h3>

    <?php foreach ($comments as $comment) { ?>
        <?php if (htmlspecialchars($comment->getFlag()) === "1") { ?>
            <h4><?= htmlspecialchars($comment->getPseudo()); ?></h4>
            <p><?= htmlspecialchars($comment->getContent()); ?></p>
            <p>Posté le <?= htmlspecialchars($comment->getCreatedAt()); ?></p>
            <p>Flag : <?= htmlspecialchars($comment->getFlag()); ?></p>
        <?php } ?>
    <?php } ?>
</div>