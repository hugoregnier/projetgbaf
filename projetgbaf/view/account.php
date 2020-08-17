<?php $title = 'Mon compte sur le site GBAF'; ?>
<?php $header = 'connect'; ?>

<?php ob_start(); ?>
<main id="account">
    <h1><?= $_SESSION['firstname'] ?>&nbsp;&nbsp;<?= $_SESSION['lastname'] ?></h1>

    <section class="form">
        <h2>Modifier mon nom d'utilisateur</h2>
        <form method="post">
            <input type="hidden" name="account_form" value="username" />
            <p><label for="username">Nom d'utilisateur : </label><br /><input type="text" name="username" id="username" value="<?= $_SESSION['username']; ?>" /></p>
            <p class="error"><?= isset($errorUsername) ? $errorUsername : '' ?></p>
            <p class="confirm"><?= isset($confirmUsername) ? $confirmUsername : '' ?></p>
            <input type="submit" value="Valider les changements">
        </form>
    </section>

    <section class="form">
        <h2>Modifier mon mot de passe</h2>
        <form method="post" novalidate>
            <input type="hidden" name="account_form" value="password" />
            <p><label for="newpass">Mon nouveau mot de passe : </label><br /><input type="password" name="newpass" id="newpass" required /></p>
            <p class="error"><?= isset($errorPass) ? $errorPass : '' ?></p>
            <p><label for="checkpass">Confirmation du nouveau mot de passe : </label><br /><input type="password" name="checkpass" id="checkpass" required /></p>
            <p class="error"><?= isset($diffPass) ? $diffPass : '' ?></p>
            <p class="confirm"><?= isset($confirmPassword) ? $confirmPassword : '' ?></p>
            <input type="submit" value="Valider les changements">
        </form>
    </section>

    <section class="form">
        <h2>Modifier mon nom</h2>
        <form method="post" novalidate>
            <input type="hidden" name="account_form" value="lastname" />
            <p><label for="lastname">Nom : </label><br /><input type="text" name="lastname" id="lastname" value="<?= $_SESSION['lastname']; ?>" /></p>
            <p class="error"><?= isset($errorLastname) ? $errorLastname : '' ?></p>
            <p class="confirm"><?= isset($confirmLastname) ? $confirmLastname : '' ?></p>
            <input type="submit" value="Valider les changements">
        </form>
    </section>

    <section class="form">
        <h2>Modifier mon prénom</h2>
        <form method="post" novalidate>
            <input type="hidden" name="account_form" value="firstname" />
            <p><label for="firstname">Prénom : </label><br /><input type="text" name="firstname" id="firstname" value="<?= $_SESSION['firstname']; ?>" /></p>
            <p class="error"><?= isset($errorFirstname) ? $errorFirstname : '' ?></p>
            <p class="confirm"><?= isset($confirmFirstname) ? $confirmFirstname : '' ?></p>
            <input type="submit" value="Valider les changements">
        </form>
    </section>

    <section class="form">
        <h2>Modifier ma question secrète et ma réponse</h2>
        <form method="post" novalidate>
            <input type="hidden" name="account_form" value="questionAnswer" />
            <p><label for="question">Ma nouvelle question : </label><br /><input type="text" name="question" id="question" value="<?= $user['question']; ?>" required /></p>
            <p class="error"><?= isset($errorQuestion) ? $errorQuestion : '' ?></p>
            <p><label for="answer">Ma nouvelle réponse : </label><br /><input type="text" name="answer" id="answer" value="<?= $user['answer']; ?>" required /></p>
            <p class="error"><?= isset($errorAnswer) ? $errorAnswer : '' ?></p>
            <p class="confirm"><?= isset($confirmQuestionAnswer) ? $confirmQuestionAnswer : '' ?></p>
            <input type="submit" value="Valider les changements">
        </form>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>