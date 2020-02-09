<!DOCTYPE html>
<?php
if(isset($_SESSION['user'])){
    header("Location: /profil");
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

            <label for="username"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" id="username" name="username" value="<?php if(isset($username)) { echo $username; } ?>" / required>

            <label for="question"><b>Question secrète</b></label>
            <select name="question" / required>
                <option value="Nom de votre mère">Nom de votre mère</option>
                <option value="Nom de votre animal de compagnie">Nom de votre animal de compagnie</option>
                <option value="Nom de votre ville de naissance">Nom de votre ville de naissance</option>
            </select>

            <label for="reponse"><b>Votre réponse</b>
            <input type="text" placeholder="Entrer votre réponse secrète" id="reponse" name="reponse" required />

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