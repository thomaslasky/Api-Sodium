# API-Sodium

La partie API représente la gestion des données sur le serveur, c'est l'interface entre la base de données et le site client

# Getting Started

- Avec votre CLI se positionner dans le répertoire de l'API
- Taper la commande `composer install` puis `composer update`
- Dans le fichier **.env** à la ligne DATABASE_URL mettre l'adresse et vos identiants
- A la ligne MAILER_URL mettre l'adresse de votre serveur mail et vos identifiants
- Dans la partie CUSTOM_VARS mettre à jour l'adresse mail sur laquelle vous souhaitez recevoir les contacts et les précommandes sur la ligne MAIL_DEST
- Insérer votre nom de domaine à la ligne DOMAIN_NAME
- Et le répertoire contenant les images à la ligne IMAGE_PATH

## Génération de la base de données

- taper la commande `php bin/console d:d:c` pour créer la base de données
- taper la commande `php bin/console d:m:m` pour lancer la migration

Votre base de données est maintenant créée vous pouvez editer les données via PhpMyAdmin ou par l'api à l'adresse http://votrenomdedomaine/api.

Un jeu de données de base est fourni dans le fichier **xubaka.sql** que vous pouvez importer directement dans la base de données.

Le schéma de la base de données est consultable dans le fichier xubaka MCD.png

# Stack

La stack utilisée est trouvable dans le **composer.json** à la racine du projet et s'installe via la commande `composer install`

# Organisation

Les entités correspondantes à chaque table de la base sont dans le dossier **_src/Entity_**, le lien avec API platform est fait automatiquement via les annotations.
Les controlleurs personnalisés sont dans le dossier **_src/Controller_**

# Fonctionnement Général

Tous les textes (de la langue sélectionnée) et images du site sont envoyés au chargement du client. En cas de changement de langue sur le client l'API renvoie l'intégralité des textes dans la langue demandée.

# Standard

Le camelCase est utilisé pour nommer les variables PHP et les champs de la base de données sont en snake_case.
