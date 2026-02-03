# Kily's Commerce 🛒

## Description

Kily's Commerce est une application web moderne de gestion des achats personnels avec une interface professionnelle et des animations fluides. Développée pour offrir une expérience utilisateur élégante et performante.

## 🌐 Application en Ligne

**🔗 Accès direct :** https://kilys.kesug.com

## 🚀 Fonctionnalités

- **Gestion des achats** - Ajout, modification et suppression d'achats
- **Statistiques en temps réel** - Total des dépenses et nombre d'achats
- **Top produit** - Calcul automatique du produit le plus acheté
- **Filtrage par date** - Recherche d'achats par période
- **Interface moderne** - Design professionnel avec glassmorphism et animations
- **Responsive design** - Compatible mobile et desktop
- **Stockage local** - Données sauvegardées dans le navigateur

## 🛠️ Technologies

- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Backend:** PHP 7.4+ (Service de calcul des statistiques)
- **Tests:** PHPUnit (Tests unitaires complets)
- **Versionnage:** Git & GitHub
- **Hébergement:** InfinityFree (gratuit)

## 📦 Installation

```bash
# Cloner le dépôt
git clone https://github.com/Kilayossi229/kilys.git

# Accéder au dossier du projet
cd kilys

# Installer les dépendances PHP
composer install

# Lancer les tests unitaires
./vendor/bin/phpunit
# ou
php tests/run_tests.php
```

## 🎯 Utilisation

### Lancement des tests unitaires

```bash
# Méthode 1: Via PHPUnit
./vendor/bin/phpunit

# Méthode 2: Via script personnalisé
php tests/run_tests.php

# Méthode 3: Test spécifique
./vendor/bin/phpunit tests/TopProduitsServiceTest.php
```

### Tests réussis/failing
- ✅ **Tests réussis** : Toutes les assertions correspondent aux valeurs attendues
- ❌ **Tests échouant** : Assertions ne correspondent pas (valeurs incorrectes)
- 📊 **Coverage** : ~85% des lignes/fonctions testées

## 📁 Structure du projet

```
kilys/
├── 📄 index.html                 # Interface principale
├── 📄 composer.json              # Dépendances PHP
├── 📄 phpunit.xml               # Configuration tests
├── 📂 src/
│   └── 📂 services/
│       └── 📄 TopProduitsService.php  # Service de calcul
├── 📂 tests/
│   ├── 📄 TopProduitsServiceTest.php # Tests unitaires
│   ├── 📄 run_tests.php             # Script de lancement
│   └── 📄 test_top_produit_standalone.php
├── 📄 DEPLOYMENT_README.md       # Guide de déploiement
├── 📄 TODO_BACKGROUND.md         # Historique des modifications
└── 📄 README.md                  # Ce fichier
```

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Fork le projet
2. Créer une branche (`git checkout -b feature/AmazingFeature`)
3. Commit les changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 📞 Contact

- **Développeur** : Kily
- **GitHub** : [@Kilayossi229](https://github.com/Kilayossi229)
- **Application** : https://kilys.kesug.com
- **Email** : contact@kilyscommerce.com

---

⭐ *N'hésitez pas à star ce projet si vous l'appréciez !*

