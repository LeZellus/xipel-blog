<?php $this->title = 'Administration'; ?>

<?= $this->session->show('create_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('delete_user'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('remove_comment'); ?>

<h1>Page d'administration</h1>

<section class="grid grid-gap-40">
    <a class="button-primary" href="/index.php?route=addArticle">Nouvel article</a>
</section>

<section class="grid grid-gap-40">
    <h2 class="mt-4">Articles</h2>
    <table class="table bg-white">
        <tr class="tr tr-menu">
            <td class="td">Titre</td>
            <td class="td">Description</td>
            <td class="td">Auteur</td>
            <td class="td">Creation</td>
            <td class="td">Modification</td>
            <td class="td">Actions</td>
        </tr>
        <?php foreach ($articles as $article) { ?>
            <tr class="tr tr-data">
                <td class="td"><a href="/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>"><?= htmlspecialchars($article->getTitle()); ?></a></td>
                <td class="td"><?= htmlspecialchars($article->getChapo()); ?></td>
                <td class="td"><?= htmlspecialchars($article->getAuthor()); ?></td>
                <td class="td td-created"><?= htmlspecialchars($article->getCreatedAt()); ?></td>
                <td class="td td-updated"><?= htmlspecialchars($article->getUpdatedAt()); ?></td>
                <td class="td">
                    <a href="/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                    <a href="/index.php?route=removeArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>

<?php foreach ($comments as $comment) { ?>
    <?php if ($comment) { ?>
        <section class="grid grid-gap-40">
            <h2 class="mt-4">Commentaires en attente</h2>
            <table class="table bg-white">
                <tr class="tr tr-menu">
                    <td class="td">Pseudo</td>
                    <td class="td">Message</td>
                    <td class="td">Date</td>
                    <td class="td">Actions</td>
                </tr>
                <tr class="tr">
                    <td class="td"><?= htmlspecialchars($comment->getPseudo()); ?></td>
                    <td class="td"><?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?></td>
                    <td class="td"><?= htmlspecialchars($comment->getCreatedAt()); ?></td>
                    <td class="td">
                        <a href="/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Valider</a>
                        <a href="/index.php?route=removeComment&commentId=<?= $comment->getId(); ?>">Supprimer</a>
                    </td>
                </tr>
            </table>
        </section>
    <?php } ?>
<?php } ?>

<section class="grid grid-gap-40">
    <h2 class="mt-4">Utilisateurs</h2>
    <table class="table bg-white">
        <tr class="tr tr-menu">
            <td class="td">Pseudo</td>
            <td class="td">Date</td>
            <td class="td">Rôle</td>
            <td class="td">Actions</td>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr class="tr">
                <td class="td"><?= htmlspecialchars($user->getPseudo()); ?></td>
                <td class="td">Créé le : <?= htmlspecialchars($user->getCreatedAt()); ?></td>
                <td class="td"><?= htmlspecialchars($user->getRole()); ?></td>
                <td class="td">
                    <?php if ($user->getRole() != '1') { ?>
                        <a href="/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                    <?php } else { ?>
                        <p>Suppression impossible</p>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>