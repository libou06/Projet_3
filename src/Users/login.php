<?php
session_start();

if(isset($_POST['formconnexion'])) {
   $usernameconnect = htmlspecialchars($_POST['username']);
   $passwordconnect = sha1($_POST['password']);
   if(!empty($usernameconnect) AND !empty($passwordconnect)) {
      $requser = $bdd->prepare("SELECT * FROM account WHERE username = ? AND password = ?");
      $requser->execute(array($usernameconnect, $passwordconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id_user'] = $userinfo['id_user'];
         $_SESSION['username'] = $userinfo['username'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenom'] = $userinfo['prenom'];

        header("Location: profil?id_user=".$_SESSION['id_user']);
      } else {
         $erreur = "Mauvais nom d'utilisateur ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>