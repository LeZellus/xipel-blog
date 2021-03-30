<?php $this->title = "Tout les articles" ?>

<main class="grid grid-gap-40 m-h">
    <h1>Tout les articles</h1>
    <h2>Retrouvez les derniers actualités de mon jeu</h2>

    <section class="grid grid-gap-40 articles">
        <?php foreach ($articles as $article) { ?>
            <article>
                <a href="/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>" class="grid card card-article bg-white">
                    <div class="card-thumb" style="background-image: url('uploads/<?= $article->getThumb(); ?>')">

                    </div>
                    <section class="card-content grid grid-gap-20">
                        <h3 class="card-title"><?= htmlspecialchars($article->getTitle()); ?></h3>
                        <p class="card-desc"><?= htmlspecialchars($article->getChapo()); ?></p>
                        <p>Écrit par :
                            <span class="card-author"><?= htmlspecialchars($article->getAuthor()); ?></span>
                        </p>
                    </section>
                    <p class="card-date">Modifié le : <?= htmlspecialchars($article->getUpdatedAt()); ?></p>
                </a>
            </article>
        <?php } ?>
    </section>
</main>