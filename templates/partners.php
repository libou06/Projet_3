<!DOCTYPE html>
<?php
include('../src/connect_database.php');
?>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <?php include("link_css.php"); ?>
    <title>Partenaire GBAF </title>
</head>

<body>
    <?php include("header.php"); ?>
    <hr>

    <section id="acteur">

        <img src="img/cde.jpg" alt="logo partenaires">

        <h2>La Chambre Des Entrepreneurs</h2>

        <p>La CDE accompagne les entreprises dans leurs démarches de formation. 
            Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.
        </p>

    </section>

    
    <section id="commentaire">
        <article>
            
            <button onclick="location.href='commentaire';">Laisser un commentaire</button>

            <?php include('../src/Partners/comments.php'); ?>

        </article>
    </section>



    <?php include("footer.php"); ?>

</body>

</html>
