# inetis-recipes-app

Ce document décrit les étapes pour installer et configurer un projet Laravel 11.x sur votre machine locale à l'aide de XAMPP ou Laragon.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants :

- [PHP](https://www.php.net/downloads) (version 8.0 ou supérieure)
- [Composer](https://getcomposer.org/download/)
- [XAMPP](https://www.apachefriends.org/index.html) ou [Laragon](https://laragon.org/)

## Étapes d'installation

### 1. Cloner le dépôt

Ouvrez votre terminal et exécutez la commande suivante pour cloner le dépôt :

```bash
git clone https://github.com/catdesu/inetis-recipes-app
```

### 2. Cloner le dépôt
Naviguez dans le répertoire de votre projet :

```bash
cd votre-repo
```

Ensuite, exécutez la commande suivante pour installer les dépendances via Composer :

```bash
composer install
```

### 3. Configurer le fichier `.env`

Copiez le fichier .env.example pour créer un nouveau fichier .env :
Ouvrez le fichier .env avec un éditeur de texte et configurez les paramètres suivants :

```env
APP_URL=http://localhost/votre-repo/public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_votre_base_de_donnees
DB_USERNAME=utilisateur_de_base_de_donnees
DB_PASSWORD=mot_de_passe_de_base_de_donnees
```

### Générer la clé de l'application

Exécutez la commande suivante pour générer la clé de l'application :

```bash
composer install
```

### 4. Configurer la base de données

Si vous utilisez XAMPP ou Laragon, assurez-vous que le serveur MySQL est en cours d'exécution.

Créez une nouvelle base de données dans phpMyAdmin (XAMPP) ou (Laragon) avec le nom que vous avez défini dans votre fichier `.env`.

### 5. Exécuter les migrations et seeders

Pour créer les tables de la base de données, exécutez la commande suivante :

```bash
php artisan migrate
```

### 6. Peupler la base de données

Pour ajouter des données de démonstration à votre base de données, exécutez la commande suivante :

```bash
php artisan db:seed
```

### 7. Lancer le serveur

Vous pouvez maintenant lancer le serveur de développement intégré de Laravel :

```bash
php artisan serve
```

Accédez à l'application via http://localhost:8000 ou via l'URL que vous avez configurée dans le fichier `.env`.

### Informations sur l'utilisateur de base

Après avoir exécuté les migrations et le `db:seed`, vous pouvez vous connecter à l'application avec les informations suivantes :

- Email : `test@user.ch`
- Mot de passe : `Te$t1234`