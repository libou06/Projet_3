<!DOCTYPE html>
<?php
if(isset($_SESSION['user'])){
    header("Location: /profil");
}
include('../src/connect_database.php');
include('../src/Users/login.php');
?>
<html lang="fr">

<head>
 <meta charset="utf-8">
    <?php include("link_css.php"); ?>
    <title>Connexion</title>
</head>
<body>
	<?php include("header.php"); ?>
    <hr>
    <div id="container">
        <!-- zone de connexion -->

        <form action="#" method="POST">
            <h1>Connexion</h1>

            <label for="username"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" id="username" name="username" value="<?php if(isset($username)) { echo $username; } ?>" / required>

            <label for="password"><b>Mot de passe</b><a href="/motdepasseoublie"> (Mot de passe publié?)</a></label>
            <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" / required>

            <input type="submit" name="formconnexion" value="Se Connecter">
            
            <a href="inscription">Pas encore de compte?</a><br/><br/>
            
        </form>
        <?php
        if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
        }
        ?>
    </div>

    <?php include("footer.php"); ?> 

</body>
</html>