<?php $this->title = 'Article'; ?>

<?= $this->session->show('edit_article'); ?>

<main class="total-flex m-h">
    <h1 class="mb-4"><?= htmlspecialchars($article->getTitle()); ?></h1>
    <section class="grid grid-gap-40 article bg-white">
        <p class="article-content"><?= htmlspecialchars($article->getContent()); ?></p>
        <span class="article-created">
            Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?> par
            <span class="article-author"><?= htmlspecialchars($article->getAuthor()); ?></span>
        </span>
        <span class="article-updated">Modifié le : <?= htmlspecialchars($article->getUpdatedAt()); ?></span>
        <?php if ($this->session->get('role') === 'admin') { ?>
            <section class="grid grid-gap-20 button-box">
                <a href="/index.php?route=editArticle&articleId=<?= $article->getId(); ?>" class="button-secondary">Modifier</a>
                <a href="/index.php?route=removeArticle&articleId=<?= $article->getId(); ?>" class="button-secondary">Supprimer</a>
            </section>
        <?php } ?>
    </section>

    <section class="grid grid-gap-40 article bg-white">
        <h2>Ajouter un commentaire :</h2>
        <?php include 'form_comment.php'; ?>
        
        <h2>Commentaires :</h2>
        <?php foreach ($comments as $comment) { ?>
            <?php if (htmlspecialchars($comment->getFlag()) === "1") { ?>
                <h3>Écrit par : <?= htmlspecialchars($comment->getPseudo()); ?></h3>
                <p><?= htmlspecialchars($comment->getContent()); ?></p>
                <p>Posté le <?= htmlspecialchars($comment->getCreatedAt()); ?></p>
            <?php } ?>
        <?php } ?>
    </section>
</main>