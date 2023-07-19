
# ECF Garage




## Le projet :
Ceci est le projet d'un site fictif d'un Garage pour l'ECF STUDI.

Les fonctionnalitées demandées:

US1. Se connecter  
US2. Présenter les services  
US3. Définir les horaires d’ouverture  
US3. Exposer les voitures d'occasion  
US4. Filtrer la liste des véhicules d’occasion  
US4. Permettre de contacter l'atelier  
US5. Recueillir les témoignages des clients  



## Pré requis en Local : 

Serveur local Laragon avec une version de php 8.2.6., Appache 2.4, MySQL 8.0  
Lien [Laragon](https://laragon.org/download/index.html)

DNS personnalise sur le fichiers host de windows dans /windows/system32/drivers/etc/
![App Screenshot](https://i.postimg.cc/yxnXjSrJ/hosts.png)

configuration apache pour avoir virtualhost sur le /public
![App Screenshot](https://i.postimg.cc/5tNH5RWm/virtualhosts.png)
## Deployement local

Comment déployer le projet en local ?

Créer un dossier dans le répertoire C:\laragon\www  

Ouvrir le terminal :  
```git clone git@github.com/Vehqa/ECF-Garage ```

Ouvrir le dossier et chercher le fichier create_bdd.sql    
Créer la base de données en éxécutant le fichier create_bdd.sql et les tables avec le dossier insert.sql depuis votre hébergeur.

Modifier les valeurs du fichier database.php dans src/Libraries/Database.php en entrant les données de votre serveur local:  
```
private const DBHOST = 'Localhost';
private const DBUSER = 'Votre nom d'utilisateur';
private const DBPASS = 'Votre Password';
private const DBNAME = 'Nom de votre table';
```  
Ajoutez-y ensuite l'Autoload a la racine du projet dans votre terminal :  
[Composer](https://getcomposer.org/)  
```composer install```
```composer dump-autoload```

## Tester l'application en Local :

#### Connexion
Voici les accès de connexion prédéfinis en local :  

Administrateur :   
E-mail : V.Parrot@gmail.com   
Mot de Passe : Parrot123  

Employé :   
E-mail : Armand@gmail.com   
Mot de Passe : Armand123 

#### Envoie de Mail
Pour tester l'envoie de mail avec Laragon, allez sur la page contact et remplissez le formulaire  
Lancez ensuite Laragon 

- Menu
- PHP
- Intercepteur d'E-Mail
- Voir le dernier E-Mail 

Vous devriez voir ici votre nom / e-mail / et le message que vous veniez d'envoyez !

## Deployement en ligne

https://vehqa-ecf-garage-ae2759280420.herokuapp.com/  
Déployer avec herokuapp

## Authors

- [@Vehqa](https://www.github.com/vehqa)

