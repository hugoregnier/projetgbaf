<?php $title = 'Partenaires'; ?>
<?php $header = 'connect'; ?>

<?php ob_start(); ?>
<main>
    <section id="presentation">
        <h1>Présentation du Groupement Banque Assurance Français</h1>
            <h2>GBAF : Groupement Banque Assurance Français, est une fédération représentant les 6 grands groupes français :</h2>
                <div class="presentationListPartners">
            <ul>
                <li><span  class="li_content">BNP Paribas ;</span></li>
                <li><span  class="li_content">BPCE ;</span></li>
                <li><span  class="li_content">Crédit Agricole ;</span></li>
            </ul>
            <ul>
                <li><span  class="li_content">Crédit Mutuel-CIC ;</span></li>
                <li><span  class="li_content">Société Générale ;</span></li>
                <li><span  class="li_content">La Banque Postale.</span></li>
            </ul>
                </div>
            <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoirenational.Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoirl'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié despouvoirs publics.</p> 
        <figure id="illustration">
            <img src="public/img/immeubles.jpg" alt="illustration"/>
        </figure>       
    </section>
    <section id="presentationpartners">
        <h2>Présentation des partenaires</h2>
            
<?php
while ($data = $partners->fetch())
{
?>
    <div id="partners">
        <p>
            <img class="logo_partner" src="<?= 'public/img/partners/' . $data['logo_file']; ?>" alt="logo du partenaire">
            <h3><?= htmlspecialchars($data['title']) ?></h3>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <a class="button" href="index.php?action=partner&amp;id=<?= $data['id'] ?>">Lire la suite</a>
        </p>
    </div>
<?php
} $partners->closeCursor(); ?>
    </section>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
