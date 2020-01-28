<!DOCTYPE html>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['forminscription'])) {

 $nom = htmlspecialchars($_POST['nom']);
 $prenom = htmlspecialchars($_POST['prenom']);
 $pseudo = htmlspecialchars($_POST['pseudo']);
 $mdp = sha1($_POST['mdp']);
 $mdp2 = sha1($_POST['mdp2']);
 $question = htmlspecialchars($_POST['question']);
 $reponse = htmlspecialchars($_POST['reponse']);

if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['question']) AND !empty($_POST['reponse'])) {
  $nomlength = strlen($nom);
  if($nomlength <= 255) {
    $prenomlength = strlen($prenom);
    if($prenomlength <= 255) {
        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255) {
            $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
            $reqpseudo->execute(array($pseudo));
            $pseudoexist = $reqpseudo->rowCount();
            if($pseudoexist == 0) {
                if($mdp == $mdp2) {
                            $insertmbr = $bdd->prepare("INSERT INTO membres(nom, prenom, pseudo, motdepasse, question, reponse) VALUES(?, ?, ?, ?, ?, ?)");
                            $insertmbr->execute(array($nom, $prenom, $pseudo, $mdp, $question, $reponse));
                            $erreur = "Votre compte a bien été créé !" ;

                } else {
                  $erreur = "Vos mots de passes ne correspondent pas !";
                }
            } else {
              $erreur = "Pseudo déjà utilisée !";  
            }
        } else {
          $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
        }
    } else {
      $erreur = "Votre prenom ne doit pas dépasser 255 caractères !";
    }
 } else {
  $erreur = "Votre nom ne doit pas dépasser 255 caractères !";
 }
} else {
  $erreur = "Tous les champs doivent être complétés !";
}
}
?>

<html lang="fr">

<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../public/css/reset.css"> 
 <link rel="stylesheet" href="../public/css/all.css"/>
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
