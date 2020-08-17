<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <link rel="icon" href="public/img/fav_icon_gbaf.png" />
        <link media="all" rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css">
    </head>
        
    <body>
     <?php ob_start(); ?>  
     <header id="header_form">
            <a href="index.php"><img id="logo" src="public/img/logo_gbaf.png" alt="logo de GBAF" /></a>
            <p>Le Groupement Banque Assurance Français</p>
     </header>
     <?php $headerOut = ob_get_clean(); ?> 

     <?php ob_start(); ?>      
     <header id="header"> 
            <a href="index.php"><img id="logo" src="public/img/logo_gbaf.png" alt="logo de GBAF" /></a>    
            <p><a href="index.php?action=account"><img id=logo_membre src="public/img/membre.png" alt="logo de membre" />
                <?= $_SESSION['lastname']; ?> <?= $_SESSION['firstname']; ?><br /><br />
                </a id="deco"><a href="index.php?action=logout">Se déconnecter</a></p>
            </div>        
     </header>
     <?php $headerIn = ob_get_clean(); ?>

     <?= ($header == 'noconnect') ? $headerOut : '' ?>
     <?= ($header == 'connect') ? $headerIn : '' ?>

     <?= $content ?>

    <footer>
        <p><a href="#">Mentions légales</a> | <a href="#">Contact</a></p>
    </footer> 
    </body>
</html>