*** Récupération du projet sur git ***

Afin de récuperer le projet, il faut effectuer un clone du dépot existant. Pour se faire lancez la commande suivante:

git clone https://github.com/libou06/Projet_3.git


*** Connection à la base de donnée ***

La base donnée se situe à la base du projet (database.sql). Il suffira de l'importer sur phpMyAdmin (ou autre SGBD), dans une nouvelle base de donnée que vous nommerez projet_3 en encodage urf8_general_ci. 
Les paramètres de connextion à la base de donnée du projet se trouve dans le fichier src/connect_database.php.
