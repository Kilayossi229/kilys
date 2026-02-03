# 📋 TODO.md - KilysCommerce

## Objectif
Développer une application e-commerce complète avec PHP/MySQL en utilisant des branches Git pour chaque fonctionnalité.

## Branches à créer
- [ ] `main` - Branche principale
- [ ] `fonctionnalite/ajout-produit` - CRUD produits
- [ ] `fonctionnalite/top-statistiques` - Top produits (avec test unitaire)
- [ ] `fonctionnalite/gestion-panier` - Gestion du panier
- [ ] `fonctionnalite/gestion-commandes` - Gestion des commandes

## Structure du projet
```
kilyscommerce/
├── config/
│   └── database.php
├── src/
│   ├── models/
│   │   ├── Produit.php
│   │   ├── Categorie.php
│   │   ├── Commande.php
│   │   ├── Panier.php
│   │   └── Utilisateur.php
│   ├── services/
│   │   └── TopProduitsService.php
│   └── repositories/
│       ├── ProduitRepository.php
│       └── CommandeRepository.php
├── tests/
│   └── TopProduitsServiceTest.php
├── public/
│   └── index.php
├── sql/
│   └── schema.sql
├── composer.json
└── README.md
```

## Tâches par branche

### 1. Branche: `fonctionnalite/ajout-produit`
- [ ] Créer la table `produits` dans MySQL
- [ ] Créer le modèle `Produit.php`
- [ ] Créer le repository `ProduitRepository.php`
- [ ] Implémenter CRUD (Create, Read, Update, Delete)
- [ ] Merger vers main

### 2. Branche: `fonctionnalite/top-statistiques`
- [ ] Créer le service `TopProduitsService.php`
- [ ] Implémenter la logique de calcul du top produit
- [ ] Écrire le test unitaire PHPUnit
- [ ] Scenario test: ['pomme', 'poire', 'pomme'] → 'pomme'
- [ ] Merger vers main

### 3. Branche: `fonctionnalite/gestion-panier`
- [ ] Créer la table `panier` et `lignes_commande`
- [ ] Créer le modèle `Panier.php`
- [ ] Implémenter ajouter/modifier/supprimer du panier
- [ ] Merger vers main

### 4. Branche: `fonctionnalite/gestion-commandes`
- [ ] Créer les tables `commandes`, `paiements`
- [ ] Créer le modèle `Commande.php`
- [ ] Implémenter le workflow de commande
- [ ] Merger vers main

## Tests unitaires
- [ ] Installer PHPUnit via Composer
- [ ] Écrire test pour TopProduitsService
- [ ] Exécuter: `./vendor/bin/phpunit tests/`

## Commandes Git
```bash
# Créer une branche
git checkout -b fonctionnalite/nom-branche

# Merger vers main
git checkout main
git merge fonctionnalite/nom-branche

# Supprimer une branche locale
git branch -d fonctionnalite/nom-branche
```

## Progression
- [ ] Branche main initialisée
- [ ] Structure du projet créée
- [ ] Toutes les fonctionnalités développées
- [ ] Tests unitaires validés

