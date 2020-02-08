<?php
$requ = $bdd->prepare("SELECT * FROM acteur WHERE id_acteur = ?");
$requ->execute(array($_GET['acteur']));
$partner = $requ->fetch();

if(empty($partner)){
	header("Location: /404");
}

if(isset($_POST['like'])){

    $check_dislike = $bdd->prepare('SELECT * FROM vote WHERE id_acteur = ? AND id_user = ? AND vote= ?');
    $check_dislike->execute(array($_POST['idActeur'], $_SESSION['user']['id_user'], 0));
    $dislike= $check_dislike->fetch();

    if($dislike !== false){
        $del = $bdd->prepare('DELETE FROM vote WHERE id_acteur = ? AND id_user = ? AND vote= ?');
        $del->execute(array($_POST['idActeur'], $_SESSION['user']['id_user'], 0));
    }

    $check_like = $bdd->prepare('SELECT * FROM vote WHERE id_acteur = ? AND id_user = ? AND vote= ?');
    $check_like->execute(array($_POST['idActeur'], $_SESSION['user']['id_user'], 1));
    $like= $check_like->fetch();

    if($like == false){
        $ins = $bdd->prepare('INSERT INTO vote (id_acteur, id_user, vote) VALUES (?, ?, ?)');
        $ins->execute(array($_POST['idActeur'], $_SESSION['user']['id_user'], 1));
    }
}

if(isset($_POST['dislike'])){
    $check_like = $bdd->prepare('SELECT * FROM vote WHERE id_acteur = ? AND id_user = ? AND vote= ?');
    $check_like->execute(array($_POST['idActeur'], $_SESSION['user']['id_user'], 1));
    $like= $check_like->fetch();

    if($like !== false){
        $del = $bdd->prepare('DELETE FROM vote WHERE id_acteur = ? AND id_user = ? AND vote= ?');
        $del->execute(array($_POST['idActeur'], $_SESSION['user']['id_user'], 1));
    }

    $check_dislike = $bdd->prepare('SELECT * FROM vote WHERE id_acteur = ? AND id_user = ? AND vote= ?');
    $check_dislike->execute(array($_POST['idActeur'], $_SESSION['user']['id_user'], 0));
    $dislike= $check_dislike->fetch();

    if($dislike == false){
        $ins = $bdd->prepare('INSERT INTO vote (id_acteur, id_user, vote) VALUES (?, ?, ?)');
        $ins->execute(array($_POST['idActeur'], $_SESSION['user']['id_user'], 0));
    }
}

$like = $bdd->prepare('SELECT * FROM vote WHERE id_acteur = ? AND vote= ?');
$like->execute(array($partner['id_acteur'], 1));
$like= $like->rowCount();


$dislike = $bdd->prepare('SELECT * FROM vote WHERE id_acteur = ? AND vote= ?');
$dislike->execute(array($partner['id_acteur'], 0));
$dislike= $dislike->rowCount();

