# Documentation des Diagrammes UML et MCD - KilysCommerce

## 📋 Diagramme des Cas d'Utilisation (Use Case Diagram)

### 🎯 Acteurs

| Acteur | Description |
|--------|-------------|
| **Client** | Utilisateur final qui achète des produits sur la plateforme |
| **Administrateur** | Personnel gérer la plateforme, les produits et les commandes |

### 📦 Package: Gestion des Produits

| Cas d'Utilisation | Description |
|-------------------|-------------|
| Parcourir les produits | Navigation dans le catalogue produits |
| Rechercher un produit | Recherche par nom, catégorie, prix |
| Consulter les détails d'un produit | Visualisation des informations complètes |
| Gérer les produits (CRUD) | Création, lecture, modification, suppression |
| Gérer les catégories | Organisation hiérarchique des produits |
| Gérer les images des produits | Upload et organisation des photos |

### 🛒 Package: Gestion du Panier

| Cas d'Utilisation | Description |
|-------------------|-------------|
| Ajouter au panier | Ajout de produits au panier |
| Modifier la quantité | Changement des quantités |
| Supprimer du panier | Retrait d'un article |
| Vider le panier | Suppression de tous les articles |
| Consulter le panier | Visualisation du contenu |

### 📝 Package: Gestion des Commandes

| Cas d'Utilisation | Description |
|-------------------|-------------|
| Passer une commande | Validation et finalisation d'achat |
| Suivre une commande | Tracking de l'état de livraison |
| Consulter l'historique | Accès aux commandes passées |
| Annuler une commande | Annulation avant expedition |
| Gérer les commandes | Admin: traitement des commandes |

### 💳 Package: Paiement

| Cas d'Utilisation | Description |
|-------------------|-------------|
| Choisir le mode de paiement | Sélection CB, virement, PayPal |
| Effectuer le paiement | Transaction sécurisée |
| Recevoir la confirmation | Email de confirmation |

### ⚙️ Package: Administration

| Cas d'Utilisation | Description |
|-------------------|-------------|
| Accéder au tableau de bord | Vue d'ensemble Admin |
| Consulter les analytics | Statistiques de vente |
| Gérer les utilisateurs | Administration des comptes |

---

## 🗄️ Modèle Conceptuel de Données (MCD)

### 📊 Entités et Attributs

#### 1. **Utilisateur**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| email | VARCHAR(255) | UK, NOT NULL | Email unique |
| mot_de_passe | VARCHAR(255) | NOT NULL | Mot de passe hashé |
| nom | VARCHAR(100) | NOT NULL | Nom de famille |
| prenom | VARCHAR(100) | NOT NULL | Prénom |
| telephone | VARCHAR(20) | NULL | Numéro de téléphone |
| role | ENUM | NOT NULL | 'client' ou 'admin' |
| date_inscription | DATETIME | NOT NULL | Date d'inscription |
| est_actif | BOOLEAN | DEFAULT TRUE | Compte activé |

#### 2. **Produit**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| nom | VARCHAR(255) | NOT NULL | Nom du produit |
| description | TEXT | NULL | Description détaillée |
| prix | DECIMAL(10,2) | NOT NULL | Prix de vente |
| stock | INT | NOT NULL | Quantité en stock |
| sku | VARCHAR(50) | UK | Référence produit |
| est_actif | BOOLEAN | DEFAULT TRUE | Produit visible |
| date_creation | DATETIME | NOT NULL | Création |
| date_modification | DATETIME | NOT NULL | Modification |

#### 3. **Catégorie**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| nom | VARCHAR(100) | NOT NULL | Nom de la catégorie |
| description | TEXT | NULL | Description |
| slug | VARCHAR(100) | UK | URL friendly |
| categorie_parent_id | INT | FK | Catégorie parente |

#### 4. **Image**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| url | VARCHAR(500) | NOT NULL | Chemin de l'image |
| est_principale | BOOLEAN | DEFAULT FALSE | Image principale |
| ordre | INT | NOT NULL | Ordre d'affichage |

#### 5. **Panier**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| quantite | INT | NOT NULL | Quantité |
| date_ajout | DATETIME | NOT NULL | Ajout au panier |

#### 6. **Commande**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| numero | VARCHAR(50) | UK | Numéro de commande |
| statut | ENUM | NOT NULL | État de la commande |
| total | DECIMAL(10,2) | NOT NULL | Montant total |
| adresse_livraison | TEXT | NOT NULL | Adresse de livraison |
| adresse_facturation | TEXT | NOT NULL | Adresse de facturation |
| date_commande | DATETIME | NOT NULL | Date de commande |
| date_modification | DATETIME | NOT NULL | Mise à jour |

#### 7. **LigneCommande**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| quantite | INT | NOT NULL | Quantité commandée |
| prix_unitaire | DECIMAL(10,2) | NOT NULL | Prix au moment |
| reduction | DECIMAL(10,2) | DEFAULT 0 | Remise appliquée |

#### 8. **Paiement**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| montant | DECIMAL(10,2) | NOT NULL | Montant payé |
| methode | ENUM | NOT NULL | Mode de paiement |
| statut | ENUM | NOT NULL | État du paiement |
| date_paiement | DATETIME | NULL | Date de transaction |
| transaction_id | VARCHAR(100) | UK | ID transaction |

#### 9. **Adresse**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| libelle | VARCHAR(100) | NOT NULL | Nom de l'adresse |
| rue | VARCHAR(255) | NOT NULL | Adresse |
| ville | VARCHAR(100) | NOT NULL | Ville |
| code_postal | VARCHAR(20) | NOT NULL | Code postal |
| pays | VARCHAR(100) | NOT NULL | Pays |
| est_par_defaut | BOOLEAN | DEFAULT FALSE | Adresse principale |

#### 10. **Commentaire**
| Attribut | Type | Contrainte | Description |
|----------|------|------------|-------------|
| id | INT | PK | Identifiant unique |
| note | INT | CHECK (1-5) | Note sur 5 |
| contenu | TEXT | NOT NULL | Contenu du avis |
| date_creation | DATETIME | NOT NULL | Publication |
| est_approuve | BOOLEAN | DEFAULT FALSE | Approuvé par admin |

---

## 🔗 Relations (Cardinalités)

| Relation | Cardinalité | Description |
|----------|--------------|-------------|
| Utilisateur - Panier | 1 à 0..* | Un utilisateur peut avoir plusieurs paniers |
| Utilisateur - Commande | 1 à 0..* | Un utilisateur peut passer plusieurs commandes |
| Utilisateur - Adresse | 1 à 0..* | Un utilisateur peut avoir plusieurs adresses |
| Utilisateur - Commentaire | 1 à 0..* | Un utilisateur peut écrire plusieurs avis |
| Produit - Image | 1 à 0..* | Un produit peut avoir plusieurs images |
| Produit - Commentaire | 1 à 0..* | Un produit peut recevoir plusieurs avis |
| Produit - LigneCommande | 1 à 0..* | Un produit peut être dans plusieurs lignes |
| Catégorie - Catégorie | 1 à 0..* | Une catégorie peut avoir des sous-catégories |
| Catégorie - Produit | 1 à 0..* | Une catégorie peut contenir plusieurs produits |
| Commande - Paiement | 1 à 1 | Une commande possède un seul paiement |
| Commande - LigneCommande | 1 à 1..* | Une commande contient plusieurs lignes |
| Panier - LigneCommande | 1 à 0..* | Un panier contient plusieurs lignes |

---

## 📈 Diagrammes à générer

Pour visualiser les diagrammes, utilisez un outil compatible PlantUML:

### Installation de PlantUML:
```bash
# Via Docker
docker pull plantuml/plantuml

# Ou via package manager
# Linux (Ubuntu)
sudo apt install plantuml

# macOS
brew install plantuml
```

### Génération des images:
```bash
# Générer tous les diagrammes
plantuml diagrammes\ UML\ et\ MCD.plantuml

# Générer un diagramme spécifique
plantuml -verbose diagrammes\ UML\ et\ MCD.plantuml
```

### Outils en ligne:
- [PlantUML Web Server](https://www.plantuml.com/plantuml)
- [Draw.io](https://draw.io)
- [Lucidchart](https://www.lucidchart.com)

