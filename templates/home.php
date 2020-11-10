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
                        <p>Écrit par :
                            <span class="card-author"><?= htmlspecialchars($article->getAuthor()); ?></span>
                        </p>
                    </section>
                    <p class="card-date">Modifié le : <?= htmlspecialchars($article->getUpdatedAt()); ?></p>
                </a>
            </article>
        <?php } ?>
    </section>

    <section class="total-flex curriculum">
        <h2 class="mt-4">Mon parcours :</h2>
        <article class="card-careers">
            <div class="bg-white card card-career total-flex" id="cv-wrapper">
                Voir le CV
            </div>
            <a class="bg-white card card-career total-flex" href="uploads/cv_matheo_zeller.pdf" download>
                Télécharger le CV
            </a>
        </article>
    </section>

    <div class="img-cv" id="cv-img">
        <img src="uploads/cv_matheo_zeller.jpg" alt="CV de Mathéo">

        <div class="close">
            <span></span>
            <span></span>
        </div>
    </div>
</main>