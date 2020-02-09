<?php


if(isset($_POST['questionconnexion'])) {
   $userconnect = htmlspecialchars($_POST['username']);
   $questionconnect = htmlspecialchars($_POST['question']);
   $reponseconnect = htmlspecialchars($_POST['reponse']);
   if(!empty($userconnect) AND !empty($questionconnect) AND !empty($reponseconnect)) {
      $requser = $bdd->prepare("SELECT * FROM account WHERE username = ? AND question = ? AND reponse = ?");
      $requser->execute(array($userconnect, $questionconnect, $reponseconnect));
      $userinfo = $requser->fetch();
       if(!empty($userinfo)) {
           $_SESSION['user'] = $userinfo;
           header("Location: /profil");
        }
        else {
         $erreur = "Mauvais nom d'utilisateur ou mot de passe !";
        }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>