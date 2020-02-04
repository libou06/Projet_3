<?php
if(isset($_SESSION['user'])){
    header("Location: profil?id_user=".$_SESSION['id_user']);
}

if(isset($_POST['formconnexion'])) {
   $usernameconnect = htmlspecialchars($_POST['username']);
   $passwordconnect = sha1($_POST['password']);
   if(!empty($usernameconnect) AND !empty($passwordconnect)) {
      $requser = $bdd->prepare("SELECT * FROM account WHERE username = ? AND password = ?");
      $requser->execute(array($usernameconnect, $passwordconnect));
      $userinfo = $requser->fetch();
       if(!empty($userinfo)) {
           $_SESSION['user'] = $userinfo;
           header("Location: profil");
        }
        else {
         $erreur = "Mauvais nom d'utilisateur ou mot de passe !";
        }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>