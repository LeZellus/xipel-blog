<?php $this->title = "Accueil"; ?>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('update_password'); ?>
<?= $this->session->show('delete_account'); ?>

<main class="grid grid-center grid-gap-40 m-h">
    <h1>Xipel, le jeu tout en pixel.</h1>
    <div class="grid grid-gap-40">
        <img src="/uploads/LeZellus.gif" alt="Logo Mathéo" class="logo">
        <p class="text-generic">“Goutez aux pixels technologiques...”</p>
    </div>

    <section class="grid grid-gap-40 articles">
        <h2 class="mt-4">Derniers articles :</h2>
        <?php foreach ($articles as $article) { ?>
            <article>
                <a href="/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>" class="grid card card-article bg-white">
                    <div class="card-thumb" style="background-image: url('<?= htmlspecialchars(($article->getThumb())) ?>')">

                    </div>
                    <section class="card-content grid grid-gap-20">
                        <h3 class="card-title"><?= htmlspecialchars($article->getTitle()); ?></h3>
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

    <section class="grid grid-gap-40 curriculum">
        <h2 class="mt-4">Mon parcours :</h2>
        <article class="bg-white card card-">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga labore ipsum excepturi commodi ea saepe perferendis reprehenderit maxime temporibus consequuntur reiciendis accusamus perspiciatis suscipit distinctio, sint deleniti officiis dolorem sequi.</p>
        </article>
        <article class="bg-white card card-career">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt omnis voluptatem nulla ea? Voluptas est alias ea eligendi modi incidunt architecto corporis quos voluptates, a odit blanditiis nobis, at ullam.</p>
        </article>
    </section>
</main>