<?php $this->title = 'Administration'; ?>

<?= $this->session->show('create_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>

<h1>Page d'administration</h1>
<p>En construction</p>
<a href="../public/index.php">Retour à l'accueil</a>

<h2>Articles</h2>
<a href="../public/index.php?route=addArticle">Nouvel article</a>

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
            <td><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>"><?= htmlspecialchars($article->getTitle()); ?></a></td>
            <td><?= htmlspecialchars($article->getChapo()); ?></td>
            <td><?= htmlspecialchars($article->getAuthor()); ?></td>
            <td>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></td>
            <td>Modifié le : <?= htmlspecialchars($article->getUpdatedAt()); ?></td>
            <td>
                <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<h2>Commentaires signalés</h2>

<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>
<?= $this->session->show('remove_article'); ?>

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
                    <a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                <?php } else { ?>
                    Suppression impossible
                <?php } ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>