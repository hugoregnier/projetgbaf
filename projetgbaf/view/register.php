<?php $pageTitle = 'Inscription sur le site GBAF'; ?>
<?php $header = 'noconnect'; ?>

<?php ob_start(); ?>        
<main>
    <section class="form">
        <h1>Inscription</h1>
        <form method="post" action="index.php?action=register" >
            <input type="hidden" name="register_form" value="register" />

            <p><label for="lastname">Nom : </label><input type="text" name="lastname" id="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required /></p>
            <p class="error"><?= isset($errorsMsg['lastname']) ? $errorsMsg['lastname'] : '' ?></p>

            <p><label for="firstname">Prénom : </label><input type="text" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>"required /></p>
            <p class="error"><?= isset($errorsMsg['firstname']) ? $errorsMsg['firstname'] : '' ?></p>

            <p><label for="username">Nom d'utilisateur : </label><input type="text" name="username" id="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" required /></p>
            <p class="error"><?= isset($errorsMsg['username']) ? $errorsMsg['username'] : '' ?></p>

            <p><label for="pass">Mot de passe :</label><input type="password" name="pass" id="pass" required /></p>
            <p class="error"><?= isset($errorsMsg['pass']) ? $errorsMsg['pass'] : '' ?></p>

            <p><label for="checkpass">Confirmation du Mot de passe :</label><input type="password" name="checkpass" id="checkpass" required /></p>
            <p class="error"><?= isset($errorsMsg['diffPass']) ? $errorsMsg['diffPass'] : '' ?></p>

            <p><label for="question">Question secrète : </label><input type="text" name="question" id="question" value="<?= isset($_POST['question']) ? $_POST['question'] : '' ?>" required /></p>
            <p class="error"><?= isset($errorsMsg['question']) ? $errorsMsg['question'] : '' ?></p>

            <p><label for="answer">Réponse à la question secrète : </label><input type="text" name="answer" id="answer" value="<?= isset($_POST['answer']) ? $_POST['answer'] : '' ?>" required /></p>
            <p class="error"><?= isset($errorsMsg['answer']) ? $errorsMsg['answer'] : '' ?></p>

            <p><input type="submit" value="Valider" /></p>
            <br />
            <p>Vous etes inscrit ? <a href="index.php">Connectez-vous !</a></p>
        </form>
    </section>
</main>
<?php $content = ob_get_clean(); ?>
  </body>
  
<?php require('view/template.php'); ?>
