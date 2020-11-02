<?php $this->title = "Tout les articles" ?>

<main class="grid grid-gap-40 m-h">
    <h1 class="mb-4">Tout les articles</h1>

    <section class="grid grid-gap-40 articles">
        <?php foreach ($articles as $article) { ?>
            <article>
                <a href="/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>" class="grid card card-article bg-white">
                    <div class="card-thumb" style="background-image: url('https://images.unsplash.com/photo-1593642634524-b40b5baae6bb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60')">

                    </div>
                    <section class="card-content grid grid-gap-20">
                        <h2 class="card-title"><?= htmlspecialchars($article->getTitle()); ?></h2>
                        <p class="card-desc"><?= htmlspecialchars($article->getChapo()); ?></p>
                        <p class="card-date">Modifié le : <?= htmlspecialchars($article->getUpdatedAt()); ?></p>
                        <p>Écrit par :
                            <span class="card-author"><?= htmlspecialchars($article->getAuthor()); ?></span>
                        </p>
                    </section>
                </a>
            </article>
        <?php } ?>
    </section>
</main>