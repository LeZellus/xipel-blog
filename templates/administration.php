<?php $this->title = 'Administration'; ?>

<h1>Page d'administration</h1>
<p>En construction</p>

<h2>Articles</h2>

<h2>Commentaires signalés</h2>

<h2>Utilisateurs</h2>

<?php $this->title = 'Administration'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>
<h2>Articles</h2>

<h2>Commentaires signalés</h2>

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