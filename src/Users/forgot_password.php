<?php
if(isset($_SESSION['user'])){
    header("Location: /profil");
}

if(isset($_POST['questionconnexion'])) {
   $questionconnect = htmlspecialchars($_POST['question']);
   $reponseconnect = htmlspecialchars($_POST['reponse']);
   if(!empty($questionconnect) AND !empty($reponseconnect)) {
      $requser = $bdd->prepare("SELECT * FROM account WHERE question = ? AND reponse = ?");
      $requser->execute(array($questionconnect, $reponseconnect));
      $userinfo = $requser->fetch();
       if(!empty($userinfo)) {
           $_SESSION['user'] = $userinfo;
           header("Location: /accueil");
        }
        else {
         $erreur = "Mauvais nom d'utilisateur ou mot de passe !";
        }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>