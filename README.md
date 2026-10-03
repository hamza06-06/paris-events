# Paris Events

Application web permettant de rechercher et consulter des événements culturels et ludiques à Paris.

Les événements sont récupérés dynamiquement depuis l'API Open Data de la Ville de Paris.

## Fonctionnalités

- Affichage des événements à venir
- Recherche par titre
- Filtrage par catégorie
- Tri chronologique
- Consultation du détail d'un événement
- Interface responsive
- Gestion des erreurs lors de l'appel API

## Technologies

- PHP 8.2
- Laravel 12
- Blade
- API Open Data Paris
- HTML5
- CSS3
- Git

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/hamza06-06/paris-events.git
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

### 5. Lancer l'application

```bash
php artisan serve
```

L'application est accessible sur :

```text
http://127.0.0.1:8000
```

## API utilisée

Open Data Paris — Que Faire à Paris ?  
Événements et activités proposés à Paris.

## Auteur

Hamza Meksem  
Développeur Full-Stack