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
            <a href="/profil" > <img src="/img/<? $_SESSION['user']['avatar'] ?>" alt="photo de profil"> </a>
            <a href="/profil" class="login"><?php echo $_SESSION['user']['nom'] ?>  <?php echo$_SESSION['user']['prenom']?></a>
            <a href ="/deconnexion" class="logout">Déconnexion</a>
        </div>
    <?php }?>

</header>

