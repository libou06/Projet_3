<!-- Integrer databse connection + getAll partners -->
<!DOCTYPE html>
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
        <li>BNP Paribas ;</li>
        <li>BPCE ;</li>
        <li>Crédit Agricole ;</li>
        <li>Crédit Mutuel-CIC ;</li>
        <li>Société Générale ;</li>
        <li>La Banque Postale.</li>
    </ul>
    <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travaillerde la même façon pour gérer près de 80 millions de comptes sur le territoire national.</p>
    <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tousles axes de la réglementation financière française. Sa mission est de promouvoirl'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié despouvoirs publics.</p>
    <img src="img/illustration.jpg" alt="" />
</section>
<hr>
<section id="partenaires">
    <h2>Acteurs et Partenaires</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, ipsum natus doloribus earum voluptatem unde totam possimus laborum assumenda quisquam voluptates voluptatum explicabo, quam. Omnis, sed. Reiciendis illum, magni distinctio.</p>
    <article>
    <?php
       /*foreach($partners as $partner){?>
            <div>
                <img src="img/<?php $partner['champs']?>" alt="logo Formation CO">
                <h3><?php $partner['champs']?></h3>
                <p><?php $partner['champs']?></p>
                <button onclick="location.href='#';">Lire la suite</button>
            </div>
        <?php}*/
    ?>
        <div>
            <img src="img/formation_co.jpg" alt="logo Formation CO">
            <h3>Formation CO</h3> 
            <p>Formation et co est une association française présente sur tout le territoire. Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé...</p>
            <button onclick="location.href='#';">Lire la suite</button>
        </div>
        <div>
            <img src="img/protectpeople.jpg" alt="logo Protect People">
            <h3>Protect People</h3>
            <p>Protectpeople finance la solidarité nationale. Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale...</p>
            <button onclick="location.href='#';">Lire la suite</button>
        </div>
        <div>
            <img src="img/cde.jpg" alt="logo CDE">
            <h3>CDE</h3>
            <p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE...</p>
            <button onclick="location.href='#';">Lire la suite</button>
        </div>
        <div>
            <img src="img/dsa_france.jpg" alt="logo DSA">
            <h3>DSA France</h3>
            <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales. Nous accompagnons les entreprises dans les étapes clés de leur évolution. Notre philosophie : s’adapter à chaque entreprise...</p>
            <button onclick="location.href='#';">Lire la suite</button>
        </div>
    </article>
</section>

<?php include("footer.php"); ?>

</body>

</html>
