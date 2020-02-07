<?php

if(isset($_GET['vote'],$_GET['acteur']) AND !empty($_GET['vote']) AND !empty($_GET['acteur'])) {

   $getid = (int) $_GET['acteur'];
   $getvote = (int) $_GET['vote'];
   $sessionid = $_SESSION['acteur'];

   $check = $bdd->prepare('SELECT id_acteur FROM acteur WHERE id_acteur = ?');
   $check->execute(array($getid));

   if($check->rowCount() == 1) {
      if($getvote == 1) {
         $check_like = $bdd->prepare('SELECT id FROM likes WHERE id_acteur = ? AND id_user = ?');
         $check_like->execute(array($getid,$sessionid));
         $del = $bdd->prepare('DELETE FROM dislikes WHERE id_acteur = ? AND id_user = ?');
         $del->execute(array($getid,$sessionid));

         if($check_like->rowCount() == 1) {
            $del = $bdd->prepare('DELETE FROM likes WHERE id_acteur = ? AND id_user = ?');
            $del->execute(array($getid,$sessionid));
         } else {
            $ins = $bdd->prepare('INSERT INTO likes (id_acteur, id_user) VALUES (?, ?)');
            $ins->execute(array($getid, $sessionid));
         }
         
      } elseif($getvote == 2) {
         $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE id_acteur = ? AND id_user = ?');
         $check_like->execute(array($getid,$sessionid));
         $del = $bdd->prepare('DELETE FROM likes WHERE id_acteur = ? AND id_user = ?');
         $del->execute(array($getid,$sessionid));
         if($check_like->rowCount() == 1) {
            $del = $bdd->prepare('DELETE FROM dislikes WHERE id_acteur = ? AND id_user = ?');
            $del->execute(array($getid,$sessionid));
         } else {
            $ins = $bdd->prepare('INSERT INTO dislikes (id_acteur, id_user) VALUES (?, ?)');
            $ins->execute(array($getid, $sessionid));
         }
      }

      header('Location: partenaire/'.$getid);


   } else {
      exit('Erreur fatale. <a href="accueil">Revenir à l\'accueil</a>');
   }
} else {
   exit('Erreur fatale. <a href="accueil">Revenir à l\'accueil</a>');
}

?>