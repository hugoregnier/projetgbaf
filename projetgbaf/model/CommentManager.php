<?php

function getPartners()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM gbaf_partners');

    return $req;
}

function getPartner($partnerId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM gbaf_partners WHERE id = ?');
    $req->execute(array($partnerId));
    $partner = $req->fetch();
    
    return $partner;
}

function getComments($partnerId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM gbaf_comments WHERE partner_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($partnerId));

    return $comments;
}

function partnerComment($partnerId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO gbaf_comments(partner_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($partnerId, $author, $comment));

    return $affectedLines;
}



//function getVotes($partnerId)
//{
  //  $db = dbConnect();
 // $votes = $db->prepare('SELECT id, partner_id, vote FROM gbaf_vote WHERE partner_id');
 // $votes->execute(array($partnerId));

  //  return $votes;
//}

//function partnerVote($partnerId, $vote)
//{
  //   $db = dbConnect();
  //  $votes = $db->prepare('INSERT INTO gbaf_vote(partner_id, vote) VALUES(?, ?)');
  //  $votes->execute(array($partnerId,$vote));

   // return $votes;
//}






function getLikeByPartner($id_partner)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT COUNT(gbaf_vote.vote) AS nb_vote FROM gbaf_vote WHERE partner_id = ? AND vote = 1');
    $req->execute(array($id_partner));
    $like = $req->fetch();
    return $like;
}

function getDislikeByPartner($id_partner)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT COUNT(gbaf_vote.vote) AS nb_vote FROM gbaf_vote WHERE partner_id = ? AND vote = 0');
    $req->execute(array($id_partner));
    $dislike = $req->fetch();
    return $dislike;
}
function insertLike($vote, $idPartner)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO gbaf_vote(vote, partner_id,member_id) VALUES(:vote, :partner_id, :member_id)');
    $req->execute(array(
        'vote' => $vote,
        'partner_id' => $idPartner,
        'member_id' => $_SESSION['member_id'],
    ));
}

function updateLike($vote, $idPartner)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE gbaf_vote(vote, partner_id,member_id) VALUES(:vote, :partner_id, :member_id)');
    $req->execute(array(
        'vote' => $vote,
        'partner_id' => $idPartner,
        'member_id' => $_SESSION['member_id'],
    ));
}

function createNewMember($lastname, $firstname, $username, $pass_hache, $question, $answer)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO gbaf_member(lastname, firstname, username, password, question, answer) VALUES(:lastname, :firstname, :username, :password, :question, :answer)');
    $affectedLines = $req->execute(array(
        'lastname'=> $lastname,
        'firstname' => $firstname,
        'username' => $username,
        'password' => $pass_hache,
        'question' => $question,
        'answer' => $answer
    ));

    return $affectedLines;
}

function getUser($username)
{
  $db = dbConnect();
  $req = $db->prepare('SELECT id, lastname, firstname, username, password, question, answer FROM gbaf_member WHERE username = ?');
  $req->execute(array($username));
  $user = $req->fetch();

  return $user;

}

function updatePass($pass_hache, $username)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE gbaf_member SET password = ? WHERE username = ?');
    $req->execute(array($pass_hache, $username));
}

function getAnswer($answer, $username)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, lastname, firstname, username, password, question, answer FROM gbaf_member WHERE answer = ? AND username = ?');
    $req->execute(array($answer, $username));
    $answer = $req->fetch();

    return $answer;
}

function updateUsername($newUsername, $username)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE gbaf_member SET username = ? WHERE username = ?');
    $req->execute(array($newUsername, $username));
}

function updateLastname($newLastname, $username)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE gbaf_member SET lastname = ? WHERE username = ?');
    $req->execute(array($newLastname, $username));
}

function updateFirstname($newFirstname, $username)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE gbaf_member SET firstname = ? WHERE username = ?');
    $req->execute(array($newFirstname, $username));
}

function updateQuestionAnswer($newQuestion, $newAnswer, $username)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE gbaf_member SET question = ?, answer = ? WHERE username = ?');
    $req->execute(array($newQuestion, $newAnswer, $username));
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=projetgbaf;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
   

