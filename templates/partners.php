<!DOCTYPE html>
<?php
include('../src/connect_database.php');
include('../src/Partners/partner.php')
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

        <img src="/<?= $partner['logo'] ?>" alt="logo partenaires">

        <h2><?= $partner['nom'] ?></h2>

        <p><?= $partner['description'] ?>
        </p>

    </section>

    
    <section id="commentaire">
        <article>

            <input type="radio" name="like" value="like" id="like" checked><label for="like">like</label>

            <input type="radio" name="like" value="dislike" id="dislike" ><label for="dislike">dislike</label><br/>
            
            <button onclick="location.href='/commentaire';">Laisser un commentaire</button>

            <?php include('../src/Partners/comments.php'); ?>

        </article>
    </section>



    <?php include("footer.php"); ?>

</body>

</html>
