# Paris Events

Application web permettant de rechercher et consulter des événements culturels et ludiques à Paris.

## Fonctionnalités

- Affichage des événements
- Recherche par titre
- Filtrage par catégorie
- Tri des événements par date
- Consultation du détail d'un événement
- Réinitialisation des filtres
- Interface responsive
- Données de démonstration avec Laravel Seeder

## Technologies

- PHP 8.2
- Laravel 12
- Blade
- SQLite
- HTML5
- CSS3
- Git

## Installation

### 1. Cloner le projet

```bash
git clone <URL_DU_REPOSITORY>
cd paris-events
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Créer le fichier `.env`

Sous Windows PowerShell :

```powershell
Copy-Item .env.example .env
```

Sous Linux/macOS :

```bash
cp .env.example .env
```

### 4. Générer la clé Laravel

```bash
php artisan key:generate
```

### 5. Créer la base SQLite

Sous Windows PowerShell :

```powershell
New-Item database/database.sqlite -ItemType File -Force
```

Sous Linux/macOS :

```bash
touch database/database.sqlite
```

### 6. Créer les tables et les données de démonstration

```bash
php artisan migrate --seed
```

### 7. Lancer l'application

```bash
php artisan serve
```

L'application est accessible sur :

```text
http://127.0.0.1:8000
```

## Auteur

Hamza Meksem  
Développeur Full-Stack