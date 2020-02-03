<?php
session_start();

if(isset($_GET['id_user']) AND $_GET['id_user'] > 0)
{
   $getid = intval($_GET[id_user]);
   $requser = $bdd->prepare('SELECT * FROM account WHERE id_user = ?');
   $requser->execute(array($getid));
   $userinfo = $requser ->fetch();
}

?>