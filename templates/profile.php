<!DOCTYPE html>
<?php
include('../src/connect_database.php');
include('../src/Users/profile.php');
?>
<html>
  <head>
      <title>Compte utilisateur</title>
      <meta charset="utf-8">
      <?php include("link_css.php"); ?>
  </head>

  <body>
   	<?php include("header.php"); ?><hr>

    
    <div align="center" id="container">
      <h2>Profil de <?php echo $_SESSION['user']['username']; ?></h2>
        <form action="" method="POST" enctype="multipart/form-data" >
            <h1>Inscription</h1>

            <?php if(isset($errors)) {
                echo '<font color="red">'.$errors."</font>";
            }?><br/><br/>

            <label for="nom"><b>Nom</b></label>
            <input type="text" value="<?php echo $_SESSION['user']['nom'] ?>" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" required />

            <label for="prenom"><b>Prénom</b></label>
            <input type="text"  value="<?php echo$_SESSION['user']['prenom']?>" id="nom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" required/>

            <label for="username"><b>Nom d'utilisateur</b></label>
            <input type="text"  value="<?php echo$_SESSION['user']['username']?>" id="username" name="username" value="<?php if(isset($username)) { echo $username; } ?>" required/>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="editProfile" value="Modifier mon profil">

        </form>
    </div>

    <?php include("footer.php"); ?>

  </body>
</html>

