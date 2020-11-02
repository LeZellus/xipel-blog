<?php $this->title = "Accueil"; ?>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('update_password'); ?>
<?= $this->session->show('delete_account'); ?>

<main class="grid grid-center grid-gap-40 m-h">
    <div class="grid grid-gap-40">
        <img src="/uploads/LeZellus.gif" alt="Logo Mathéo" class="logo">
        <p class="text-generic">“Goutez aux pixels technologiques...”</p>
    </div>
    <h1 class="mb-4">Derniers articles</h1>

    <section class="grid grid-gap-40 articles">
        <?php foreach ($articles as $article) { ?>
            <article>
                <a href="/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>" class="grid card card-article bg-white">
                    <div class="card-thumb" style="background-image: url('<?= htmlspecialchars(($article->getThumb())) ?>')">

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