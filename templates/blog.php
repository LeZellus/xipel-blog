<h1>Tout les articles</h1>

<main class="total-flex m-h">
    <section class="grid grid-gap-40 articles bg-white">

        <?php foreach ($articles as $article) { ?>
            <article>
                <a href="/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>" class="grid grid-gap-10 card card-article">
                    <div class="card-thumb" style="background-image: url('https://images.unsplash.com/photo-1593642634524-b40b5baae6bb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60')">

                    </div>

                    <h2><?= htmlspecialchars($article->getTitle()); ?></h2>
                    <p class="card-desc"><?= htmlspecialchars($article->getChapo()); ?></p>
                    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></p>
                    <p>
                        Modifié le :<?= htmlspecialchars($article->getUpdatedAt()); ?> par
                        <span class="card-author"><?= htmlspecialchars($article->getAuthor()); ?></span>
                    </p>
                </a>
            </article>
        <?php } ?>
    </section>
</main>