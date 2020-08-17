<?php $title = htmlspecialchars($partner['title']); ?>
<?php $header = 'connect'; ?>

<?php ob_start(); ?>
<h1>Partenaires</h1>
<p><a class="button" href="index.php">Retour à la liste des partenaires</a></p>


<div id="partner">
    
    <p>
        <img class="logo_partner" src="<?= 'public/img/partners/' . $partner['logo_file']; ?>" alt="logo du partenaire">
        <h3><?= htmlspecialchars($partner['title']) ?></h3>
        <?= nl2br(htmlspecialchars($partner['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<div id="commentspartner">

<form action="index.php?action=addComment&amp;id=<?= $partner['id'] ?>" method="post">
    
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" class="commenttext"></textarea>
        <input type="submit" class="button" value="Nouveau commentaire" />
        
</form><br>
<form action="index.php?action=addVote&amp;id=<?= $partner['id'] ?>" method="post">
    <input type="hidden" name="partner_post" value="vote" />
    <button type="submit"  name="up"><span class="fas fa-thumbs-up fa-2x" style="color:green;"> <?= $like['nb_vote']; ?></span></i></button>
    <button type="submit" name="down"><span class="fas fa-thumbs-down fa-2x" style="color:red;"> <?= $dislike['nb_vote']; ?></span></button>
   </div>
</form><br>

<?php
while ($comment = $comments->fetch())
{
?>
    <div id="thecomment">
    <p class="author"><?= htmlspecialchars($comment['author']) ?></p>
    <p class="datecomment">Le <?= $comment['comment_date_fr'] ?></p>
    <p class="textcomment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    </div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>