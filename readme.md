# Système d'Inscription/Connexion

Ce projet vise à créer un système d'inscription et de connexion pour une application web.

## Navbar (Header)

Une barre de navigation (navbar) sera ajoutée à toutes les pages à l'aide d'un fichier séparé. Cette navbar inclura :

- Pour les utilisateurs connectés :
    - Déconnexion
    - Mon profil
- Pour les utilisateurs non connectés :
    - Connexion
    - Inscription

La gestion de la déconnexion (suppression de cookie) sera implémentée selon les besoins.

## Pages disponibles

### Page d'Inscription

Cette page comprendra :

- Un formulaire avec champs de saisie pour le login et le mot de passe
- Le mot de passe sera stocké de manière sécurisée via le hachage
- Les données seront stockées sur les cookies

### Page de Connexion

Cette page comprendra :

- Un formulaire avec champs de saisie pour le login et le mot de passe
- Vérification du mot de passe stocké de manière sécurisée via le hachage
- Redirection vers la page de profil en cas de succès de l'authentification

### Page de Profil

Cette page affichera :

- Les données de connexion (email ou pseudo)
- Un lien vers la page de modification de profil

### Page de Modification de Profil

Cette page permettra à l'utilisateur :

- De modifier le login
- De modifier ou ajouter un prénom
- De modifier ou ajouter un nom
- De modifier ou ajouter une photo de profil
