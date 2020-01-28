<?php

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