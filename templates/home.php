<!DOCTYPE html>
<?php

if(!isset($_SESSION['user'])){
    header("Location: /connexion");
}
include('../src/connect_database.php');
include('../src/Partners/getAllPartners.php');
?>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <?php include("link_css.php"); ?>
    <title>Accueil GBAF</title>
</head>

<body>

<?php include("header.php"); ?>
<hr>
<section id="GBAF_presentation">
    <h1>Le Groupement Banque Assurance Français</h1>
    <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :</p>
    <ul class="text-center">
        <li>BNP Paribas </li>
        <li>BPCE </li>
        <li>Crédit Agricole </li>
        <li>Crédit Mutuel-CIC </li>
        <li>Société Générale </li>
        <li>La Banque Postale</li>
    </ul>
    <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travaillerde la même façon pour gérer près de 80 millions de comptes sur le territoire national.</p>
    <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tousles axes de la réglementation financière française. Sa mission est de promouvoirl'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié despouvoirs publics.</p>
    <img src="/img/illustration.jpg" alt="" />
</section>
<hr>
<section id="partenaires">
    <h2>Acteurs et Partenaires</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, ipsum natus doloribus earum voluptatem unde totam possimus laborum assumenda quisquam voluptates voluptatum explicabo, quam. Omnis, sed. Reiciendis illum, magni distinctio.</p>
    <article>
    <?php foreach ($partners as $partner): ?>
            <div>
                <img src="/<?= $partner['logo'] ?>"alt="logo partenaires">
                <h3><?= $partner['nom']?></h3>
                <p><?= $partner['description']?></p>
                <button onclick="location.href='partenaire/<?=$partner['id_acteur']?>';">Lire la suite</button>
            </div>
    
    <?php endforeach; ?>  
    </article>
</section>

<?php include("footer.php"); ?>

</body>

</html>
