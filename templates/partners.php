<!DOCTYPE html>
<?php
include('../src/connect_database.php');

if(!isset($_SESSION['user'])){
    header("Location: /connexion");
}

include('../src/Partners/partner.php');
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

        <p><?= $partner['description'] ?></p>

    </section>


    <section id="commentaire">
        <article>

            <div id="submitcom">

                <button onclick="location.href='/commentaire/<?php echo $partner["id_acteur"]?>'">Laisser un commentaire</button>

                <form action="" method="post" >
                    <input type="hidden" name="idActeur" value="<?php echo $partner['id_acteur']?>">
                    <input type="submit" name="like" value="J'aime">(<?= $like ?>)
                </form>

                <form action="" method="post" >
                    <input type="hidden" name="idActeur" value="<?php echo $partner['id_acteur']?>">
                    <input type="submit" name="dislike" value="Je n'aime pas">(<?= $dislike ?>)
                </form>

            </div>

            <?php include('../src/Partners/comments.php'); ?>

        </article>

        <a href="/accueil" class="retour"> >> Retour à la page d'accueil</a>
    </section>

    <?php include("footer.php"); ?>

</body>

</html>
