# Projet de stage formation développeur web et web mobile en " MVC " avec Réécriture d'URL réaliser du 04/04/2024 au 06/06/2024
# Description
Ce projet est un site web développé en utilisant le modèle MVC (Modèle-Vue-Contrôleur) avec une réécriture d'URL grâce à un fichier .htaccess. L'index sert de routeur, gérant les requêtes URL et les dirigeant vers les contrôleurs appropriés. Le projet comprend également une gestion des messages d'erreur, une interaction avec une base de données pour la récupération et la manipulation des données, et une séparation claire entre le front-office et le back-office.

# Structure du Projet:
Fichiers et Répertoires Principaux
index.php : Le point d'entrée du site, agissant comme routeur.
.htaccess : Fichier de configuration Apache pour la réécriture d'URL.
config.php : Fichier de configuration contenant les constantes de connexion à la base de données.
paths.php : Fichier définissant les constantes des chemins absolus vers les différents dossiers du site.
controllers/ : Dossier contenant les contrôleurs.
AdminController.php : Gère la logique et le contrôle des entrées utilisateur pour les fonctionnalités administratives.
OfferController.php : Gère la logique et le contrôle des entrées utilisateur pour les offres.
models/ : Dossier contenant les modèles.
OfferModel.php : Gère la table des offres et la table des offres publiées.
UserModel.php : Gère les comptes administrateurs.
Database.php : Classe permettant la connexion à la base de données.
views/ : Dossier contenant les vues.
layouts/ : Contient les fichiers de mise en page.
Layout.php : Mise en page principale.
DashboardLayout.php : Mise en page pour le tableau de bord administrateur.
loginLayout.php : Mise en page pour la page de connexion.
home/ : Vues pour le côté visiteur.
admin/ : Vues pour le back-office

# Configurations:
Configuration de la Base de Données (config.php)
Le fichier config.php contient les informations de connexion à la base de données, y compris l'hôte, le nom de la base de données, le nom d'utilisateur et le mot de passe. Assurez-vous de remplir ces informations correctement pour permettre la connexion à la base de données.

Chemins Absolus (paths.php)
Le fichier paths.php définit des constantes représentant les chemins absolus vers différents dossiers du site (app, public, config, view, models, controllers, lib, css, js, fonts, img et la racine du site). Cela permet une gestion facile et centralisée des chemins d'accès dans l'application.

# Fonctionnement
Routeur (index.php)
L'index.php sert de routeur, analysant les requêtes URL et les dirigeant vers les contrôleurs appropriés. Il utilise le fichier .htaccess pour réécrire les URL.

# Contrôleurs
Les contrôleurs sont responsables de la logique de traitement et de la validation des entrées utilisateur. Ils communiquent avec les modèles pour manipuler les données de la base de données.

AdminController : Gère les fonctionnalités administratives.
OfferController : Gère les offres.

# Modèles
Les modèles sont responsables de la gestion des données.

OfferModel : Gère les données des offres.
UserModel : Gère les données des utilisateurs administrateurs.
Database : Gère la connexion à la base de données.

# Vues
Les vues sont responsables de l'affichage des données. Elles sont organisées en différentes mises en page et dossiers selon leur utilisation (visiteur ou administrateur).

# Déploiement
Pour déployer ce projet, assurez-vous de configurer correctement les fichiers config.php et paths.php selon votre environnement de serveur. Vous devrez également configurer Apache pour permettre la réécriture d'URL via le fichier .htaccess.
Configurer les pages mention légale et conditions d'utilisation afin que les informations sur l'hébergeur soient à jours.# Projet-de-stage-formation-afpa
