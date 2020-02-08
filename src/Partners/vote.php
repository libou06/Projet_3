<?php
  
  
$getid = intval($_GET['id_acteur']);
$getu = intval($_GET['id_user']);
  
  
$reqid = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
$reqid->execute(array($getid));
  
$postinfo = $reqid->fetch();
  
$requ = $bdd->prepare('SELECT * FROM account WHERE id_user = ?');
$requ->execute(array($getu));
  
$userinfo = $requ->fetch();
  
  
  
           
$check = $bdd->query("SELECT * FROM vote WHERE id_acteur = '".$postinfo['id']."' AND id_user = '".$userinfo['id']."'");
      
$resultat = $check->fetch();
  
if ($resultat) {  
  
    $checkbis = $bdd->query("SELECT * FROM vote WHERE id_acteur = '".$postinfo['id']."' AND id_user = '".$userinfo['id']."'");
  
    $result = $checkbis->fetch();
      
            if ($result['vote'] == 1) {
      
                $reqbs = $bdd->query('UPDATE vote SET votes = vote - 1 WHERE id_acteur = '.$postinfo['id'].' AND id_user = '.$userinfo['id'].'');
      
            } else {
                  
                $requp = $bdd->query('UPDATE vote SET votes = vote + 1 WHERE id_acteur = '.$postinfo['id'].' AND id_user = '.$userinfo['id'].'');
  
            } 
      
} else {
  
  
$reqins = $bdd->query('INSERT INTO vote(id_acteur, id_user) VALUES ("'.$postinfo['id'].'", "'.$userinfo['id'].'")');
  
$requp = $bdd->query('UPDATE vote SET votes = vote + 1 WHERE id_acteur = '.$postinfo['id'].' AND id_user = '.$userinfo['id'].'');
  
  
  
}
 
 
 
 
header( "Location: partenaire);
 
 
?>