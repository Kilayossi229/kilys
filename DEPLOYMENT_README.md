# 🚀 Déploiement sur InfinityFree

## 📋 Prérequis
- Compte InfinityFree (gratuit)
- Accès FTP ou File Manager

## 📁 Structure des fichiers à uploader

### Fichiers principaux :
```
📂 public_html/ (ou htdocs/)
├── 📄 index.html (page principale)
├── 📂 src/
│   └── 📂 services/
│       └── 📄 TopProduitsService.php
└── 📂 assets/ (si vous ajoutez des images/css externes)
```

### Fichiers à IGNORER :
- ❌ `tests/` (dossier de tests)
- ❌ `composer.json` & `composer.lock` (InfinityFree gère PHP nativement)
- ❌ `.git/` (dossier Git)
- ❌ Fichiers README et documentation

## 🔧 Configuration PHP

### 1. Vérifier la compatibilité PHP
InfinityFree supporte PHP 5.6+ (recommandé PHP 7.4+)

### 2. Configuration de base
Aucune configuration spéciale requise pour votre application.

## 📤 Procédure de déploiement

### Étape 1 : Créer un compte InfinityFree
1. Aller sur https://www.infinityfree.com/
2. Créer un compte gratuit
3. Choisir un nom de domaine (ex: `votrenom.infinityfreeapp.com`)

### Étape 2 : Accéder au File Manager
1. Se connecter au panneau de contrôle
2. Aller dans "File Manager"
3. Ouvrir le dossier `htdocs/` ou `public_html/`

### Étape 3 : Uploader les fichiers
1. Uploader `index.html` dans le dossier racine
2. Créer le dossier `src/services/`
3. Uploader `TopProduitsService.php`

### Étape 4 : Tester
1. Aller sur votre domaine : `https://votrenom.infinityfreeapp.com`
2. Vérifier que l'application fonctionne

## ⚠️ Points importants

### Stockage des données
- Votre application utilise `localStorage` (côté client)
- Les données sont stockées dans le navigateur de l'utilisateur
- ✅ Fonctionne parfaitement sur InfinityFree

### Fonctionnalités PHP
- Le service `TopProduitsService.php` fonctionne normalement
- Aucune base de données requise

### Limitations InfinityFree
- Espace disque : 5GB gratuit
- Bande passante : 50GB/mois
- Pas de base de données MySQL gratuite (mais pas nécessaire ici)

## 🔍 Dépannage

### Si la page ne s'affiche pas :
1. Vérifier que `index.html` est dans le bon dossier
2. Vérifier les permissions des fichiers (755 recommandé)

### Si les fonctionnalités PHP ne marchent pas :
1. Vérifier la version PHP dans le panneau de contrôle
2. Contacter le support InfinityFree

## ✅ Checklist avant déploiement

- [ ] Compte InfinityFree créé
- [ ] Nom de domaine choisi
- [ ] Fichiers `index.html` et `TopProduitsService.php` prêts
- [ ] Test local effectué
- [ ] Accès au File Manager confirmé

---

**🎉 Votre application sera accessible gratuitement sur Internet !**
