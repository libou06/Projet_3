<?php

if(isset($_POST['forminscription'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $username = htmlspecialchars($_POST['username']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $question = htmlspecialchars($_POST['question']);
    $reponse = htmlspecialchars($_POST['reponse']);

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['question']) AND !empty($_POST['reponse'])) {
        $nomlength = strlen($nom);
        if($nomlength <= 255) {
            $prenomlength = strlen($prenom);
            if($prenomlength <= 255) {
                $usernamelength = strlen($username);
                if($usernamelength <= 255) {
                    $requsername = $bdd->prepare("SELECT * FROM account WHERE username = ?");
                    $requsername->execute(array($username));
                    $usernameexist = $requsername->rowCount();
                    if($usernameexist == 0) {
                        if($password == $password2) {
                            $insertmbr = $bdd->prepare("INSERT INTO account(nom, prenom, username, password, question, reponse) VALUES(?, ?, ?, ?, ?, ?)");
                            $insertmbr->execute(array($nom, $prenom, $username, $password, $question, $reponse));
                            $errors = "Votre compte a bien été créé !" ;

                            header('Location: /accueil');
                        } else {
                            $errors = "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        $errors = "Pseudo déjà utilisée !";
                    }
                } else {
                    $errors = "Votre nom d'utilsateur ne doit pas dépasser 255 caractères !";
                }
            } else {
                $errors = "Votre prenom ne doit pas dépasser 255 caractères !";
            }
        } else {
            $errors = "Votre nom ne doit pas dépasser 255 caractères !";
        }
    } else {
        $errors = "Tous les champs doivent être complétés !";
    }
}
?>