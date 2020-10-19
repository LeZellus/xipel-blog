<?php $this->title = 'Administration'; ?>

<?= $this->session->show('create_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('delete_user'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('remove_comment'); ?>

<h1>Page d'administration</h1>
<p>En construction</p>
<a href="/index.php">Retour à l'accueil</a>

<h2>Articles</h2>
<a href="/index.php?route=addArticle">Nouvel article</a>

<table>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Description</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Modification</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($articles as $article) {
    ?>
        <tr>
            <td><?= htmlspecialchars($article->getId()); ?></td>
            <td><a href="/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>"><?= htmlspecialchars($article->getTitle()); ?></a></td>
            <td><?= htmlspecialchars($article->getChapo()); ?></td>
            <td><?= htmlspecialchars($article->getAuthor()); ?></td>
            <td>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></td>
            <td>Modifié le : <?= htmlspecialchars($article->getUpdatedAt()); ?></td>
            <td>
                <a href="/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                <a href="/index.php?route=removeArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<h2>Commentaires en attente</h2>

<table>
    <tr>
        <td>Id</td>
        <td>Pseudo</td>
        <td>Message</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment) {
    ?>
        <tr>
            <td><?= htmlspecialchars($comment->getId()); ?></td>
            <td><?= htmlspecialchars($comment->getPseudo()); ?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt()); ?></td>
            <td>
                <a href="/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Valider</a>
                <a href="/index.php?route=removeComment&commentId=<?= $comment->getId(); ?>">Supprimer</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<h2>Utilisateurs</h2>
<table>
    <tr>
        <td>Id</td>
        <td>Pseudo</td>
        <td>Date</td>
        <td>Rôle</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($users as $user) {
    ?>
        <tr>
            <td><?= htmlspecialchars($user->getId()); ?></td>
            <td><?= htmlspecialchars($user->getPseudo()); ?></td>
            <td>Créé le : <?= htmlspecialchars($user->getCreatedAt()); ?></td>
            <td><?= htmlspecialchars($user->getRole()); ?></td>
            <td>
                <?php if ($user->getRole() != 'admin') { ?>
                    <a href="/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                <?php } else { ?>
                    Suppression impossible
                <?php } ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>