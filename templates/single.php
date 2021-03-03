<?php $this->title = 'Article'; ?>

<?= $this->session->show('edit_article'); ?>

<main class="grid grid-center grid-gap-40 m-h">
    <h1><?= htmlspecialchars($article->getTitle()); ?></h1>
    <section class="grid grid-gap-40 article bg-white">
        <div class="article-thumb" style="background-image: url('<?= $article->getThumb(); ?>')"></div>

        <div class="article-content"><?= $article->getContent(); ?></div>
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

    <section class="grid grid-gap-40 comments bg-white">
        <h2>Ajouter un commentaire :</h2>
        <?php include 'form_comment.php'; ?>

        <h2>Commentaires :</h2>
        <?php foreach ($comments as $comment) { ?>
            <?php if (htmlspecialchars($comment->getFlag()) === "1") { ?>
                <section class="comment grid">
                    <img class="comment-thumb" src="/icons/user.svg" alt="Icone utilisateur">
                    <section class="grid grid-gap-10 comment-content">
                        <h3><?= htmlspecialchars($comment->getPseudo()); ?></h3>
                        <?= htmlspecialchars($comment->getContent()); ?>
                        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt()); ?></p>
                    </section>
                </section>
            <?php } ?>
        <?php } ?>
    </section>
</main>