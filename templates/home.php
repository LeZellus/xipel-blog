<?php $this->title = "Accueil"; ?>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('update_password'); ?>
<?= $this->session->show('delete_account'); ?>

<main class="grid grid-center grid-gap-40 m-h">
    <h1>Xipel, le jeu tout en pixel.</h1>
    <div class="grid grid-gap-40">
        <div class="matheo jc-center">
            <img src="/uploads/LeZellus.gif" alt="Logo Mathéo" class="logo">
            <img src="/icons/left-arrow.png" alt="Logo Flèche Gauche" class="arrow">
            <span class="name">Mathéo Zeller</span>
        </div>
        <p class="text-generic">“Goutez aux pixels technologiques...”</p>
    </div>

    <section class="grid grid-gap-40 articles">
        <h2 class="mt-4">Derniers articles</h2>
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
        <h2 class="mt-4">Mon parcours</h2>
        <article class="card-careers">
            <div class="bg-white card card-career total-flex" id="cv-wrapper">
                Voir le CV
            </div>
            <a class="bg-white card card-career total-flex" href="uploads/cv_matheo_zeller.pdf" download>
                Télécharger le CV
            </a>
        </article>
    </section>

    <h2 class="mt-4">Contact</h2>
    <section class="grid grid-gap-40 contact bg-white">
        <?= $this->session->show('contact'); ?>

        <form method="post" id="form-login" action="/index.php?route=contact" class="grid grid-gap-20">
            <div class="form-control grid grid-gap-10">
                <label for="name" class="form-control-label">Nom, Prénom</label>
                <input type="text" id="name" name="name" placeholder="Jack Pot">
                <?= isset($errors['name']) ? $errors['name'] : ''; ?>
            </div>
            <div class="form-control grid grid-gap-10">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" id="email" name="email" placeholder="jackpot@exemple.fr">
                <?= isset($errors['email']) ? $errors['email'] : ''; ?>
            </div>
            <div class="form-control grid grid-gap-10">
                <label for="message" class="form-control-label">Message</label>
                <textarea id="message" name="message" placeholder="Je vous contacte pour ..."></textarea>
                <?= isset($errors['message']) ? $errors['message'] : ''; ?>
            </div>

            <div class="form-control">
                <input type="submit" value="Envoyer" class="button-primary" id="submit" name="submit" form="form-login">
            </div>
        </form>

        <!-- <?#php if ($this->session->show('error_login')) { ?>
            <p class="error-text">
                <?#php echo $this->session->show('error_login'); ?>
            </p>
        <?#php } ?> -->
    </section>

    <div class="img-cv" id="cv-img">
        <img src="uploads/cv_matheo_zeller.jpg" alt="CV de Mathéo">

        <div class="close">
            <span></span>
            <span></span>
        </div>
    </div>
</main>