<?php
/**
 * TopProduitsService.php
 * Service pour calculer les produits les plus populaires/commandés
 */

namespace App\Services;

class TopProduitsService
{
    /**
     * Calcule le produit le plus fréquent dans une liste
     * 
     * @param array $produits Liste des noms de produits
     * @return string|null Le nom du produit le plus fréquent ou null si vide
     */
    public function calculerTopProduit(array $produits): ?string
    {
        if (empty($produits)) {
            return null;
        }

        // Compter les occurrences de chaque produit
        $occurrences = array_count_values($produits);

        // Trouver le produit avec le plus d'occurrences
        $topProduit = array_keys($occurrences, max($occurrences));

        // Retourner le premier en cas d'égalité
        return $topProduit[0] ?? null;
    }

    /**
     * Calcule les N produits les plus populaires
     * 
     * @param array $produits Liste des noms de produits
     * @param int $nombre Nombre de produits à retourner
     * @return array Tableau associatif [produit => count] trié par count décroissant
     */
    public function calculerTopNProduits(array $produits, int $nombre = 5): array
    {
        if (empty($produits)) {
            return [];
        }

        $occurrences = array_count_values($produits);
        arsort($occurrences);

        return array_slice($occurrences, 0, $nombre, true);
    }

    /**
     * Calcule le pourcentage de ventes pour un produit spécifique
     * 
     * @param string $produit Nom du produit
     * @param array $produits Liste des noms de produits
     * @return float Pourcentage de ventes
     */
    public function calculerPourcentage(string $produit, array $produits): float
    {
        if (empty($produits)) {
            return 0.0;
        }

        $total = count($produits);
        $occurrences = array_count_values($produits);
        $count = $occurrences[$produit] ?? 0;

        return round(($count / $total) * 100, 2);
    }

}


