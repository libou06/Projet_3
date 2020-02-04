<!DOCTYPE html>
<?php
include('../src/connect_database.php');
include('../src/Users/registration.php');
?>
<html lang="fr">

<head>
 <meta charset="utf-8">
    <?php include("link_css.php"); ?>
</head>

<body>

    <?php include("header.php"); ?>
    <hr>
    <div id="container" >

        <form action="" method="POST">
            <h1>Inscription</h1>

            <?php if(isset($errors)) {
            echo '<font color="red">'.$errors."</font>";
            }?><br/><br/>

            <label for="nom"><b>Nom</b></label>
            <input type="text" placeholder="Entrer votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" / required >

            <label for="prenom"><b>Prénom</b></label>
            <input type="text" placeholder="Entrer votre prénom" id="nom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" / required>

            <label for="username"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" id="username" name="username" value="<?php if(isset($username)) { echo $username; } ?>" / required>

            <label for="password"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" / required>

            <label for="password2"><b>Confirmation de mot de passe</b></label>
            <input type="password" placeholder="Confirmez votre mot de passe" id="password2" name="password2" / required>

            <label for="question"><b>Question secrète</b></label>
            <input type="text" placeholder="Entrer votre question secrète" id="question" name="question" value="<?php if(isset($question)) { echo $question; } ?>" / required>

            <label for="reponse"><b>Réponse à la question secrète</b></label>
            <input type="text" placeholder="Entrer la réponse à la question secrète" id="reponse" name="reponse" value="<?php if(isset($reponse)) { echo $reponse; } ?>" / required>

            <input type="submit" name="forminscription" value="Je m'incris">

        </form><br/>
        
    </div>

    <?php include("footer.php"); ?>

</body>
</html>
