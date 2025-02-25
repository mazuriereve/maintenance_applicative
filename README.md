# Projet de Maintenance Applicative

## Réaliser par DUPUIS Brian et MAZURIER Eve
## Description

Ce projet a été réalisé dans le but de créer un site simple permettant aux utilisateurs de se connecter à l'aide de leurs identifiants. L'objectif principal de ce projet était d'identifier et de résoudre deux problèmes spécifiques :

1. **Un défaut de mise en page** : Un bouton de connexion ne s'affiche pas correctement.
2. **Une faille de sécurité** : Le système permet à l'utilisateur de se connecter en utilisant uniquement le mot de passe, sans vérifier l'identifiant (login), ce qui compromet la sécurité du site.

### Date de réalisation :
- **Date** : 25 février 2025

## Fonctionnalités

Le projet comporte les éléments suivants :
- Une page de connexion permettant d'entrer un identifiant et un mot de passe.
- Un bouton de connexion qui, lorsqu'il est cliqué, permet de se connecter au système.
- Une page simple après connexion (accueil).

## Objectifs du projet

1. **Détection du bug de mise en page** :
   - Le bouton de connexion présente un problème d'affichage. Le but de ce projet était d'identifier ce problème et de le résoudre.

2. **Détection de la faille de sécurité** :
   - Il a été découvert qu'il est possible de se connecter uniquement avec le mot de passe, sans nécessiter d'identifiant. Ce manque de validation côté serveur constitue une faille de sécurité que nous avons l'intention de corriger dans une version ultérieure.

## Problèmes à résoudre

1. **Défaut dans la mise en page du bouton** :
   - Le bouton de connexion ne s'affiche pas correctement sur certaines tailles d'écran. Ce problème a été identifié et est actuellement en cours de résolution.

2. **Faille de sécurité dans le système de connexion** :
   - Il est possible de se connecter en utilisant uniquement le mot de passe. Cette faille de sécurité nécessite une validation côté serveur pour s'assurer que l'utilisateur entre bien un identifiant valide avant de pouvoir se connecter.

## Technologies utilisées

- **HTML/CSS** : Pour la création de la page et de la mise en page.
- **JavaScript** : Pour la gestion de la logique de connexion.
- **MySQL** : Pour gérer la base de données.

  ## Outils utilisé :

- **Laragon** 

## Instructions pour exécuter le projet

1. Clonez ce repository sur votre machine locale :
   ```bash
   git clone https://github.com/mazuriereve/maintenance_applicative.git
   ```

2. Une fois le fichier créer , aller dans votre base de données sur votre serveur local et vérifier le fichier connexion.php et modifier les logins si nécessaires.

3. Démarrer le projet et s'inscrire dans un premier temps. 
