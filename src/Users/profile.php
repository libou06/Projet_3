<?php
/////////////////////Edit Profil//////////////////

if(isset($_POST['submit']) && isset($_SESSION['user'])){

    if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["name"])) {
        $target_dir = "img/";
        $target_file = $target_dir . basename(htmlspecialchars($_FILES["avatar"]["name"]));
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Désolé, le fichier existe déjà.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["avatar"]["size"] > 500000) {
            echo "Désolé, votre fichier est trop large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Désolé, seul les fichiers JPG, JPEG, PNG & GIF sont acceptés.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Désolé, votre fichier n'a pas été téléchargé.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                $updateavatar = $bdd->prepare("UPDATE account SET avatar = ? WHERE id_user = ?");
                $updateavatar->execute(array(htmlspecialchars($_FILES["avatar"]["name"]), $_SESSION['user']['id_user']));
            } else {
                echo "Désolé, il y a eu une erreur dans le téléchargement de votre fichier.";
            }
        }
    }

    if(isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] != $_SESSION['user']['nom']) {
        $nom = htmlspecialchars($_POST['nom']);
        $updatenom = $bdd->prepare("UPDATE account SET nom = ? WHERE id_user = ?");
        $updatenom->execute(array($nom, $_SESSION['user']['id_user']));
    }

    if(isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] != $_SESSION['user']['prenom']) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $updateprenom = $bdd->prepare("UPDATE account SET prenom = ? WHERE id_user = ?");
        $updateprenom->execute(array($prenom,$_SESSION['user']['id_user']));
    }

    if(isset($_POST['username']) AND !empty($_POST['username']) AND $_POST['username'] != $_SESSION['user']['username']) {
        $username = htmlspecialchars($_POST['username']);
        $updateusername = $bdd->prepare("UPDATE account SET username = ? WHERE id_user = ?");
        $updateusername->execute(array($username, $_SESSION['user']['id_user']));
    }

    
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE account SET password = ? WHERE id_user = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['user']['id_user']));
         
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }

    $requser = $bdd->prepare("SELECT * FROM account WHERE id_user = ?");
    $requser->execute(array( $_SESSION['user']['id_user']));
    $userinfo = $requser->fetch();
    if(!empty($userinfo)) {
        $_SESSION['user'] = $userinfo;
    }

}



