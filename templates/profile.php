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
      <h2>Profil de <? echo $userinfo['username']; ?></h2>
         <br /><br />
         	Nom : <? echo $userinfo['nom']; ?>
         	<br />
         	Prenom : <? echo $userinfo['prenom']; ?>
         	<br />
         	Pseudo : <? echo $userinfo['username']; ?>
         	<br />
          Avatar: <? echo $userinfo['avatar']; ?>
          <br />
    </div>

    <?php include("footer.php"); ?>

  </body>
</html>

