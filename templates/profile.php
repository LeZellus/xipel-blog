<?php $this->title = 'Mon profil'; ?>

<main class="total-flex m-h">
    <h1 class="mb-4">Profil</h1>
    <section class="grid grid-gap-40 profil bg-white">
        <img src="/uploads/LeZellus.gif" alt="Logo Mathéo" class="logo">
        <div class="grid grid-gap-20">
            <h2><?= $this->session->get('pseudo'); ?></h2>
            <p><?= $this->session->get('id'); ?></p>
        </div>

        <div class="grid grid-gap-20 button-box">
            <a class="button-primary" href="/index.php?route=updatePassword">Modifier son mot de passe</a>
            <a class="button-primary" href="/index.php?route=deleteAccount">Supprimer mon compte</a>
        </div>
    </section>
</main>