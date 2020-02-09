<!DOCTYPE html>
<?php
if(isset($_SESSION['user'])){
    header("Location: profil");
}
include('../src/connect_database.php');
include('../src/Users/forgot_password.php');
?>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Mot de passe oublié</title>
    <?php include("link_css.php"); ?>
</head>
<body>

<?php include("header.php"); ?>
    <hr>
    <div id="container">
        
        <form action="#" method="POST">
            <h1>Mot de passe oublié</h1>

            <label for="question"><b>Votre question secrète</b></label>
            <input type="text" placeholder="Entrer votre question secrète" id="question" name="question" required />

            <label for="reponse"><b>Votre réponse</b>
            <input type="text" placeholder="Entrer votre question secrète" id="reponse" name="reponse" required />

            <input type="submit" name="questionconnexion" value="Se Connecter">
            
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