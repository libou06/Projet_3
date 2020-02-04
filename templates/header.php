<header>
	<div id="logo">
		<a href="/accueil"><img src="/img/logo_gbaf.jpg" alt="logo"></a>
	</div>

    <?php if(!isset($_SESSION['user'])){?>
	<div id="user">
		<a href="/connexion" class="login">Se connecter</a>
	</div>
    <?php } else{?>
        <div id="user">
            <a href="/profil"> <img src="/img/<?php echo $_SESSION['user']['avatar'] ?>" alt="photo de profil"> </a>
            <a href="/profil" class="login">Mon profil</a>
            <a href="/deconnexion">Déconnexion</a>
        </div>
    <?php }?>

</header>

