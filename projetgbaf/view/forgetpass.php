<?php $pageTitle = 'Nouveau mot de passe'; ?>
<?php $header = 'noconnect'; ?>

<?php ob_start(); ?>
<main>
    <section class="form">
        <h1>Changer votre mot de passe</h1>
        <?php

        if ($_SERVER['REQUEST_METHOD'] != 'POST' OR isset($errorUsername)) { ?>
            <form method="post">
                <input type="hidden" name="change_pass_form" value="username" />
                <label for="username">Saisissez votre nom d'utilisateur : </label><input type="text" name="username" id="username" value="<?= isset($_POST['username']) ? $username : '' ?>" required />
                <p class="error"><?= isset($errorUsername) ? $errorUsername : '' ?></p>
                <input type="submit" value="Valider">
            </form>
        <?php }

        if ($_POST['change_pass_form'] == 'username' AND !isset($errorUsername) OR isset($errorAnswer)) { ?>
            <label>Votre question secrète :</label>
            <p id="question"><?= $question; ?></p>
            <form method="post">
                <input type="hidden" name="change_pass_form" value="question" />
                <input type="hidden" name="username" value="<?= $username; ?>" />
                <label for="answer">Votre réponse : </label><input type="text" name="answer" id="answer" value="<?= isset($_POST['answer']) ? $answer : '' ?>" required />
                <p class="error"><?= isset($errorAnswer) ? $errorAnswer : '' ?></p>
                <input type="submit" value="Valider">
            </form>
        <?php }

        if ($_POST['change_pass_form'] == 'question' AND !isset($errorAnswer) OR isset($diffPass) OR isset($errorPass)) { ?>
            <form method="post">
                <input type="hidden" name="change_pass_form" value="newpass" />
                <input type="hidden" name="username" value="<?= $username; ?>" />
                <p><label for="newpass">Votre nouveau mot de passe : </label><br /><input type="password" name="newpass" id="newpass" /><p/>
                <p class="error"><?= isset($errorPass) ? $errorPass : '' ?></p>
                <p><label for="checkpass">Confirmer votre nouveau mot de passe : </label><br /><input type="password" name="checkpass" id="checkpass" /></p>
                <p class="error"><?= isset($diffPass) ? $diffPass : '' ?></p>
                <input type="submit" value="Valider">
            </form>
        <?php } ?>
    </section>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>