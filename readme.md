*** Récupération du projet sur git ***

Afin de récuperer le projet, il faut effectuer un clone du dépot existant. Pour se faire, rendez-vous sur git et lancez la commande suivante:

git clone https://github.com/libou06/Projet_3.git

Le dossier Projet_3 sera créé sur votre disque et git y téléchargera la derniere version de tous les fichiers source du projet ainsi que l'historique de leurs modifications.

*** Connection à la base de donnée ***

La base donnée se situe à la base du projet (database.sql). Il suffira de l'importer sur phpMyAdmin, dans une nouvelle base de donnée que vous nommerez projet_3. 
La connexion à la base de donnée du projet se trouve dans le fichier src/connect_database.php.