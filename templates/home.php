<?php $this->title = "Accueil"; ?>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('update_password'); ?>
<?= $this->session->show('delete_account'); ?>

<?php

$dt = new \DateTime('2018-08-19T16:00:00Z');

?>

<main class="total-flex m-h">
    <section class="grid grid-gap-40 articles">
        <h1>Derniers articles</h1>

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