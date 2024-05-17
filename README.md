# Afreetech-Exam
Ce repo est un projet d'etude de cas fais durant le test pour le poste de developpeur web chez Afreetech
# Procédure d'Installation / Déploiement Local - Plateforme INTIA Assurance

## Prérequis
Avant de commencer, assurez-vous d'avoir installé les logiciels suivants sur votre système :
- XAMPP (ou tout autre serveur web Apache, MySQL, PHP)
- Un navigateur web (Chrome, Firefox, etc.)

## Instructions d'Installation
1. **Téléchargement et Configuration de XAMPP :**
    - Téléchargez et installez XAMPP à partir du [site officiel](https://www.apachefriends.org/download.html)
    - Lancez l’installation de l’application et suivez les étapes.
    - À la fin de l’installation, lancez XAMPP et démarrez les modules Apache et MySQL.
    
2. **Téléchargement du Code Source :**
    - Téléchargez le code source de la plateforme INTIA Assurance à partir du dépôt GitHub.

3. **Placement des Fichiers :**
    - Extrayez les fichiers du code source dans le répertoire htdocs de votre installation XAMPP. Par défaut, ce répertoire se trouve dans C:\xampp\htdocs.

4. **Importation de la Base de Données :**
    - Ouvrez phpMyAdmin en accédant à http://localhost/phpmyadmin dans votre navigateur.
    - Créez une nouvelle base de données nommée `intia`.
    - Importez le fichier SQL de la base de données fourni avec le dossier `sql` du code source dans la base de données `intia`.

5. **Configuration de la Connexion à la Base de Données :**
    - Ouvrez le fichier `config.php` situé dans le répertoire `config` du code source.
    - Modifiez les paramètres de connexion à la base de données (nom d'utilisateur, mot de passe, nom de la base de données) selon votre configuration.

6. **Accès à l'Application :**
    - Ouvrez votre navigateur web et accédez à l'URL suivante : `http://localhost/nom_du_dossier_de_la_plateforme`
    - Vous devriez maintenant pouvoir accéder à l'application INTIA Assurance et commencer à l'utiliser.

## Notes Additionnelles
- Assurez-vous que les permissions appropriées sont définies pour les répertoires et les fichiers de votre installation XAMPP.
- Assurez-vous de mettre à jour les informations de configuration, telles que les noms d'utilisateur et les mots de passe par défaut, pour des raisons de sécurité.

# Procédure de Déploiement en Ligne - Plateforme INTIA Assurance

## Prérequis
Avant de commencer, assurez-vous d'avoir les éléments suivants :
- Un compte chez un fournisseur de services cloud ou un hébergeur web.
- Un nom de domaine (facultatif, mais recommandé).
- Les informations de connexion au serveur distant (nom d'utilisateur, mot de passe, adresse IP).

## Instructions de Déploiement
1. **Choix de l'Hébergement :**
    - Sélectionnez un fournisseur de services cloud ou un hébergeur web qui répond à vos besoins en termes de performances, de fiabilité et de coûts.

2. **Configuration du Serveur :**
    - Configurez un serveur web (par exemple Apache) avec PHP et MySQL. De nombreux hébergeurs proposent des options de déploiement rapide pour des environnements LAMP ou LEMP.

3. **Transfert des Fichiers :**
    - Transférez les fichiers de l'application INTIA Assurance vers le répertoire racine de votre serveur web en utilisant un client FTP ou un outil de gestion de fichiers fourni par votre hébergeur.

4. **Importation de la Base de Données :**
    - Utilisez phpMyAdmin ou un outil similaire pour créer une nouvelle base de données sur votre serveur.
    - Importez le fichier SQL de la base de données fourni avec le code source de l'application INTIA Assurance dans la base de données nouvellement créée.

5. **Configuration de la Connexion à la Base de Données :**
    - Ouvrez le fichier `config.php` situé dans le répertoire `config` du code source.
    - Modifiez les paramètres de connexion à la base de données pour refléter les informations de votre serveur distant.

6. **Pointage du Nom de Domaine (facultatif) :**
    - Si vous avez un nom de domaine, configurez les enregistrements DNS pour pointer vers l'adresse IP de votre serveur.

7. **Test de l'Application :**
    - Accédez à l'URL de votre site web pour tester l'application et vérifier que tout fonctionne correctement.

## Notes Additionnelles
- Assurez-vous de configurer les permissions appropriées sur les fichiers et les répertoires de votre serveur pour des raisons de sécurité.
- Effectuez des tests supplémentaires pour vous assurer que l'application fonctionne correctement dans un environnement en ligne et qu'elle est accessible depuis n'importe quel navigateur.

