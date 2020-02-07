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
      
        <form action="" method="POST" enctype="multipart/form-data" >
            <h2>Profil de <?php echo $_SESSION['user']['username']; ?></h2>

            <?php if(isset($msg)) {
                echo '<font color="red">'.$msg."</font>";
            }?><br/><br/>

            <label for="nom"><b>Nom</b></label>
            <input type="text" value="<?php echo $_SESSION['user']['nom'] ?>" id="nom" name="nom" required />

            <label for="prenom"><b>Prénom</b></label>
            <input type="text"  value="<?php echo$_SESSION['user']['prenom']?>" id="nom" name="prenom" required/>

            <label for="username"><b>Nom d'utilisateur</b></label>
            <input type="text"  value="<?php echo$_SESSION['user']['username']?>" id="username" name="username"  required/>

            <label for="avatar"><b>Avatar</b></label>
            <input type="file" name="avatar" id="avatar" value="<?php echo $_SESSION['user']['avatar']?>">

            <input type="submit" value="Modifier mon profil">

        </form>
    </div>

    <?php include("footer.php"); ?>

  </body>
</html>

