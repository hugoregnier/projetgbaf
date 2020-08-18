<?php
session_start();
require('controller/frontend.php');

if (isset($_GET['action'])) {
switch ($_GET['action']) {


    case 'connexion': 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                connexion($_POST['username'], $_POST['pass']); 
            } else { pageConnexion(); }
        break;


    case 'register': 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                register(
                    $_POST['lastname'],
                    $_POST['firstname'],
                    $_POST['username'],
                    $_POST['pass'],
                    $_POST['checkpass'],
                    $_POST['question'],
                    $_POST['answer']
                );
            } else { pageRegister();}
        break;


    case 'forgetpass': 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($_POST['change_pass_form'] == 'username') { 
                    forgetPassUsername($_POST['username']);
                } elseif ($_POST['change_pass_form'] == 'question') {
                    forgetPassQuestion($_POST['answer']);
                } elseif ($_POST['change_pass_form'] == 'newpass') {
                    forgetPassNew($_POST['username'], $_POST['newpass'], $_POST['checkpass']);
                }
            } else { pageForgetpass();}
        break;


    case 'listPartners':
        if (isset($_SESSION['username'])) {
            listPartners();
        }else {
            pageConnexion();
        }
        break;

    
    case 'partner':
        if (isset($_GET['id'])) {
            partner();
        }
        else {
            echo 'Erreur : aucun identifiant';
            listPartners();
        }
        break;

    
    case 'logout':
        if (isset($_SESSION['username'])) {
            logout();
        }else {
            pageConnexion();
        } 
        break;                
    

    case 'account':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['account_form'] == 'username') {
                    changeUsername($_POST['username']);
            } elseif ($_POST['account_form'] == 'password') {
                    changePass($_POST['newpass'], $_POST['checkpass']);
            } elseif ($_POST['account_form'] == 'lastname') {
                    changeLastname($_POST['lastname']);
            } elseif ($_POST['account_form'] == 'firstname') {
                    changeFirstname($_POST['firstname']);
            } elseif ($_POST['account_form'] == 'questionAnswer') {
                    changeQuestionAnswer($_POST['question'], $_POST['answer']);
                }
            } else {
                pageAccount();
            }
        break;
    

    case 'addComment':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['comment'])) {
                addComment($_GET['id'], $_SESSION['username'], $_POST['comment']);
            }
            else { echo 'Erreur : le champ commentaire n\'est pas pas remplis !'; }
            }
           
        break;


    case 'addVote':
        var_dump($_POST);
        addVote($_POST['up'], $_POST['down']);
        break;    


    default:
        listPartners();
        break;
}
}
else {
    if (isset($_SESSION['username'])) {
            listPartners();
        }else {
            pageConnexion();
        }
}

?>
