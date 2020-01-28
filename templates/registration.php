<!DOCTYPE html>
<?php
include('../src/connect_database.php');
include('../src/Users/Registration.php');
?>
<html lang="fr">

<head>
 <meta charset="utf-8">
    <?php include("link_css.php"); ?>
</head>

<body>

    <?php include("header.php"); ?>

    <div id="container" >

        <form action="" method="POST">
            <h1>Inscription</h1>

            <label for="nom"><b>Nom</b></label>
            <input type="text" placeholder="Entrer votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" / required >

            <label for="prenom"><b>Prénom</b></label>
            <input type="text" placeholder="Entrer votre prénom" id="nom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" / required>

            <label for="pseudo"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" / required>

            <label for="mdp"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" id="mdp" name="mdp">

            <label for="mdp2"><b>Confirmation de mot de passe</b></label>
            <input type="password" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2" required>

            <label for="question"><b>Question secrète</b></label>
            <input type="text" placeholder="Entrer votre question secrète" id="question" name="question" value="<?php if(isset($question)) { echo $question; } ?>" / required>

            <label for="reponse"><b>Réponse à la question secrète</b></label>
            <input type="text" placeholder="Entrer la réponse à la question secrète" id="reponse" name="reponse" value="<?php if(isset($reponse)) { echo $reponse; } ?>" / required>

            <input type="submit" name="forminscription" value="Je m'incris">

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
