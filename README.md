# Kily's Commerce 🛒

## Description

Kily's Commerce est une application de gestion des achats moderne et performante, développée pour offrir une expérience utilisateur fluide et sécurisée.

## 🚀 Application en ligne

🌐 **https://kilys.kesug.com**

## 🛠️ Technologies

- Frontend: HTML5, CSS3, JavaScript (Vanilla)
- Backend: PHP natif
- Tests: PHPUnit
- Base de données: localStorage (front-end)
- Versionnage: Git & GitHub

## 📦 Installation et Tests

```bash
# Cloner le dépôt
git clone https://github.com/Kilayossi229/kilys.git

# Accéder au dossier du projet
cd kilys

# Installer les dépendances PHP
composer install

# Lancer les tests unitaires
./vendor/bin/phpunit

# OU exécuter le script de tests personnalisé
php tests/run_tests.php
```

## 🎯 Fonctionnalités

- **Gestion des achats** - Ajouter, visualiser et supprimer des achats
- **Statistiques en temps réel** - Total des dépenses, nombre d'achats
- **Top produit** - Produit le plus fréquemment acheté
- **Filtres par date** - Filtrer l'historique des achats
- **Interface moderne** - Design responsive avec animations fluides
- **Persistance des données** - Stockage local via localStorage

## 📁 Structure du projet

```
kilys/
├── index.html                 # Interface principale
├── README.md                  # Documentation principale
├── composer.json              # Dépendances PHP
├── phpunit.xml                # Configuration PHPUnit
├── src/
│   └── services/
│       └── TopProduitsService.php
├── tests/
│   ├── run_tests.php
│   ├── TopProduitsServiceTest.php
│   └── test_top_produit_standalone.php
└── diagrammes UML et MCD.plantuml
```

## 🤝 Exécuter les Tests

```bash
# Tests PHPUnit complets
./vendor/bin/phpunit

# Tests rapides
php tests/run_tests.php

# Test standalone
php tests/test_top_produit_standalone.php
```

## 🚀 Déploiement

L'application est déployée sur **InfinityFree** (hébergement gratuit):
- URL: https://kilys.kesug.com
- Serveur: InfinityFree
- Protocol: HTTP/HTTPS

Guide de déploiement : voir [DEPLOYMENT_README.md](DEPLOYMENT_README.md)

## 📄 Licence

Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 📞 Contact

- **Développeur** : [KILAYOSSI Constant]
- **GitHub** : [@Kilayossi229](https://github.com/Kilayossi229)
- **Email** : contact@kilyscommerce.com

---

⭐ *N'hésitez pas à star ce projet si vous l'appréciez !*

