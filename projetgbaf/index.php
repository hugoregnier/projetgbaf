<?php
session_start();
require('controller/frontend.php');

if (isset($_GET['action']))
{   if (!isset($_SESSION['username'])) { 
        if ($_GET['action'] == 'connexion') { 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                connexion($_POST['username'], $_POST['pass']); 
            } else { 
                pageConnexion();
            }
        } elseif ($_GET['action'] == 'register') { 
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
            } else { 
                pageRegister();
            }
        }
         elseif ($_GET['action'] == 'forgetpass') { 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                if ($_POST['change_pass_form'] == 'username') { 
                    forgetPassUsername($_POST['username']); 
                } elseif ($_POST['change_pass_form'] == 'question') {
                    forgetPassQuestion($_POST['answer']);
                } elseif ($_POST['change_pass_form'] == 'newpass') {
                    forgetPassNew($_POST['username'], $_POST['newpass'], $_POST['checkpass']);
                }
            } else {
                pageForgetpass();
            }
        } 
    } else {
        
    if ($_GET['action'] == 'listPartners') {
        listPartners();
    }
    elseif ($_GET['action'] == 'partner') {
        if (isset($_GET['id'])) {
            partner();
        }
        else {
            echo 'Erreur : aucun identifiant';
            listPartners();
        }
    }
    elseif ($_GET['action'] == 'logout') {
            logout();
        }
    elseif ($_GET['action'] == 'account') {
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
        }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['comment'])) {
                addComment($_GET['id'], $_SESSION['username'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
            else {
                echo 'Erreur : aucun identifiant de partenaire';
        }   
  } elseif ($_GET['action'] == 'addVote') {
                    var_dump($_POST);
                    addVote($_POST['up'], $_POST['down']);
                } 
  
         
        }   
}

else {
    if (!isset($_SESSION['username'])) {
        pageConnexion(); 
}else {
    listPartners();
 }
}