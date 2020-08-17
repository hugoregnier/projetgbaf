<?php $title = 'Connexion à GBAF'; ?>
<?php $header = 'noconnect'; ?>

<?php ob_start(); ?>
<main>
    <section class="form">
        <h1>Bienvenue</h1>
        <p><i>Veuillez vous connecter<i></p><br>
        <form method="post" action="index.php?action=connexion">

            <p><label for="username">Nom d'utilisateur </label><br /><input type="text" name="username" id="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" required /></p>

            <p><label for="pass">Mot de passe </label><br /><input type="password" name="pass" id="pass" required /></p>
            <p class="error"><?= isset($errorMsg) ? $errorMsg : '' ?></p>

            <p><input type="submit" value="Se connecter" /></p>
        </form>
        <p>Pas encore de compte ? <a href="index.php?action=register">Inscrivez-vous !</a></p>
        <p>Mot de passe oublié ? <a href="index.php?action=forgetpass">Créer un nouveau mot de passe</a></p>
    </section>
</main>

<?php $content = ob_get_clean(); ?>
    
<?php require('view/template.php'); ?>
