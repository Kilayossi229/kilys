<?php
/**
 * TopProduitsServiceTest.php
 * Tests unitaires pour le service TopProduitsService
 */

use PHPUnit\Framework\TestCase;
use App\Services\TopProduitsService;

class TopProduitsServiceTest extends TestCase
{
    private TopProduitsService $service;

    protected function setUp(): void
    {
        $this->service = new TopProduitsService();
    }

    /**
     * Test principal: Scénario demandé
     * Liste: ['pomme', 'poire', 'pomme'] → Résultat attendu: 'pomme'
     */
    public function testTopProduitScenarioPrincipal(): void
    {
        $produits = ['pomme', 'poire', 'pomme'];
        $resultat = $this->service->calculerTopProduit($produits);
        
        $this->assertEquals('pomme', $resultat);
    }

    /**
     * Test: Liste vide retourne null
     */
    public function testTopProduitListeVide(): void
    {
        $produits = [];
        $resultat = $this->service->calculerTopProduit($produits);
        
        $this->assertNull($resultat);
    }

    /**
     * Test: Un seul produit
     */
    public function testTopProduitUnSeul(): void
    {
        $produits = ['pomme'];
        $resultat = $this->service->calculerTopProduit($produits);
        
        $this->assertEquals('pomme', $resultat);
    }

    /**
     * Test: Égalité entre produits (retourne le premier trouvé)
     */
    public function testTopProduitEgalite(): void
    {
        $produits = ['pomme', 'poire'];
        $resultat = $this->service->calculerTopProduit($produits);
        
        // En cas d'égalité, retourne le premier
        $this->assertEquals('pomme', $resultat);
    }

    /**
     * Test: Produits avec occurrences multiples
     */
    public function testTopProduitOccurrencesMultiples(): void
    {
        $produits = ['pomme', 'poire', 'pomme', 'banane', 'pomme'];
        $resultat = $this->service->calculerTopProduit($produits);
        
        // 'pomme' apparaît 3 fois
        $this->assertEquals('pomme', $resultat);
    }

    /**
     * Test: calculerTopNProduits
     */
    public function testCalculerTopNProduits(): void
    {
        $produits = ['pomme', 'poire', 'pomme', 'banane', 'banane', 'orange'];
        $resultat = $this->service->calculerTopNProduits($produits, 2);
        
        $this->assertCount(2, $resultat);
        $this->assertEquals('pomme', array_key_first($resultat));
        $this->assertEquals(2, $resultat['pomme']);
        $this->assertEquals('banane', array_keys($resultat)[1]);
        $this->assertEquals(2, $resultat['banane']);
    }

    /**
     * Test: calculerPourcentage
     */
    public function testCalculerPourcentage(): void
    {
        $produits = ['pomme', 'poire', 'pomme', 'banane'];
        
        $pourcentage = $this->service->calculerPourcentage('pomme', $produits);
        
        // 'pomme' apparaît 2 fois sur 4 = 50%
        $this->assertEquals(50.00, $pourcentage);
    }

    /**
     * Test: calculerPourcentageProduitAbsent
     */
    public function testCalculerPourcentageAbsent(): void
    {
        $produits = ['pomme', 'poire', 'pomme'];
        
        $pourcentage = $this->service->calculerPourcentage('raisin', $produits);
        
        $this->assertEquals(0.00, $pourcentage);
    }

    /**
     * Test: Top produits avec chaîne vide
     */
    public function testTopProduit_chainesVides(): void
    {
        $produits = ['pomme', '', 'pomme', ''];
        $resultat = $this->service->calculerTopProduit($produits);
        
        // Les chaînes vides sont comptabilisées, 'pomme' gagne
        $this->assertEquals('pomme', $resultat);
    }

    /**
     * Test: Sensibilité à la casse
     */
    public function testTopProduitSensibleCasse(): void
    {
        $produits = ['Pomme', 'pomme', 'pomme'];
        $resultat = $this->service->calculerTopProduit($produits);
        
        // 'Pomme' et 'pomme' sont considérés comme différents
        $this->assertEquals('pomme', $resultat);
    }
}

