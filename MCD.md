# Modèle Conceptuel de Données (MCD) - KilysCommerce

## Schéma Entités-Associations

```mermaid
erDiagram
    UTILISATEUR ||--o{ PANIER : possede
    UTILISATEUR ||--o{ COMMANDE : passe
    UTILISATEUR ||--o{ ADRESSE : possede
    UTILISATEUR ||--o{ COMMENTAIRE : ecrit
    PRODUIT ||--o{ IMAGE : possede
    PRODUIT ||--o{ COMMENTAIRE : recoit
    PRODUIT ||--o{ LIGNE_COMMANDE : compose
    CATEGORIE ||--o{ PRODUIT : contient
    CATEGORIE ||--o{ CATEGORIE : est_sous_categorie_de
    COMMANDE ||--|| PAIEMENT : possede
    COMMANDE ||--o{ LIGNE_COMMANDE : contient
    PANIER ||--o{ LIGNE_COMMANDE : contient

    UTILISATEUR {
        int id PK
        varchar email UK
        varchar mot_de_passe
        varchar nom
        varchar prenom
        varchar telephone
        enum role
        datetime date_inscription
        boolean est_actif
    }

    PRODUIT {
        int id PK
        varchar nom
        text description
        decimal prix
        int stock
        varchar sku UK
        boolean est_actif
        datetime date_creation
        datetime date_modification
    }

    CATEGORIE {
        int id PK
        varchar nom
        text description
        varchar slug UK
        int categorie_parent_id FK
    }

    IMAGE {
        int id PK
        varchar url
        boolean est_principale
        int ordre
    }

    PANIER {
        int id PK
        int quantite
        datetime date_ajout
    }

    COMMANDE {
        int id PK
        varchar numero UK
        enum statut
        decimal total
        text adresse_livraison
        text adresse_facturation
        datetime date_commande
        datetime date_modification
    }

    LIGNE_COMMANDE {
        int id PK
        int quantite
        decimal prix_unitaire
        decimal reduction
    }

    PAIEMENT {
        int id PK
        decimal montant
        enum methode
        enum statut
        datetime date_paiement
        varchar transaction_id UK
    }

    ADRESSE {
        int id PK
        varchar libelle
        varchar rue
        varchar ville
        varchar code_postal
        varchar pays
        boolean est_par_defaut
    }

    COMMENTAIRE {
        int id PK
        int note
        text contenu
        datetime date_creation
        boolean est_approuve
    }
```

---

## Schéma simplifié des relations

```mermaid
flowchart LR
    subgraph Donnees["💾 Entités Principales"]
        U[👤 Utilisateur]
        P[📦 Produit]
        C[📁 Catégorie]
        I[🖼️ Image]
    end

    subgraph Transactions["💰 Transactions"]
        Pan[🛒 Panier]
        Cmd[📋 Commande]
        Pay[💳 Paiement]
        LC[📝 LigneCmd]
    end

    subgraph Complémentaires["📌 Complémentaires"]
        Adr[📍 Adresse]
        Com[⭐ Commentaire]
    end

    %% Relations
    U --> Pan
    U --> Cmd
    U --> Adr
    U --> Com
    
    P --> I
    P --> Com
    P --> LC
    
    C --> P
    C --> C
    
    Cmd --> Pay
    Cmd --> LC
    Pan --> LC

    style Donnees fill:#e3f2fd,stroke:#1565c0,stroke-width:2px
    style Transactions fill:#fff3e0,stroke:#ef6c00,stroke-width:2px
    style Complémentaires fill:#e8f5e9,stroke:#2e7d32,stroke-width:2px
```

---

## Récapitulatif des Cardinalités

| Relation | Cardinalité Min | Cardinalité Max | Description |
|----------|-----------------|------------------|-------------|
| Utilisateur → Panier | 0 | * | Un utilisateur peut avoir plusieurs paniers |
| Utilisateur → Commande | 0 | * | Un utilisateur peut passer plusieurs commandes |
| Utilisateur → Adresse | 0 | * | Un utilisateur peut avoir plusieurs adresses |
| Utilisateur → Commentaire | 0 | * | Un utilisateur peut écrire plusieurs avis |
| Produit → Image | 0 | * | Un produit peut avoir plusieurs images |
| Produit → Commentaire | 0 | * | Un produit peut recevoir plusieurs avis |
| Produit → LigneCommande | 0 | * | Un produit peut être dans plusieurs lignes |
| Catégorie → Produit | 0 | * | Une catégorie peut contenir plusieurs produits |
| Catégorie → Catégorie | 0 | * | Une catégorie peut avoir des sous-catégories |
| Commande → Paiement | 1 | 1 | Une commande possède un seul paiement |
| Commande → LigneCommande | 1 | * | Une commande contient plusieurs lignes |
| Panier → LigneCommande | 0 | * | Un panier contient plusieurs lignes |

