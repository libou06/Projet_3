<?php
/////////////////////Edit Profil//////////////////
if(isset($_SESSION['user'])) {

   $profil = (isset($_GET['id_user']) ? $_GET['id_user'] : '');

   $requser = $bdd->prepare("SELECT * FROM account WHERE id_user = ?");
   $requser->execute(array($profil));
   $user = $requser->fetch();

   
   if(isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] != $user['nom']) {

      $nom = htmlspecialchars($_POST['nom']);
      $updatenom = $bdd->prepare("UPDATE account SET nom = ? WHERE id_user = ?");
      $updatenom->execute(array($nom, $profil));

      header("Location: profil?id_user=".$_SESSION['id_user']);
   }

   if(isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] != $user['prenom']) {

      $prenom = htmlspecialchars($_POST['prenom']);
      $updateprenom = $bdd->prepare("UPDATE account SET prenom = ? WHERE id_user = ?");
      $updateprenom->execute(array($prenom,$profil));

      header("Location: profil?id_user=".$_SESSION['id_user']);
   }

   if(isset($_POST['username']) AND !empty($_POST['username']) AND $_POST['username'] != $user['username']) {
      $username = htmlspecialchars($_POST['username']);
      $updateusername = $bdd->prepare("UPDATE account SET username = ? WHERE id_user = ?");
      $updateusername->execute(array($username, $profil));

      header("Location: profil?id_user=".$_SESSION['id_user']);
   
	}
    
}

/////////////////////upload File//////////////////

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "img/".$_SESSION['user'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE account SET avatar = :avatar WHERE id_user = :id_user');
            $updateavatar->execute(array(
               'avatar' => $_SESSION['user'].".".$extensionUpload,
               'id_user' => $_SESSION['user']
               ));
            header("Location: profil?id_user=".$_SESSION['id_user']);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
   }
}

?>
