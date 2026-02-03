#!/usr/bin/env php
<?php
/**
 * Script de test automatisé pour valider la logique du "top produit"
 * 
 * Scénario à tester: ['pomme', 'poire', 'pomme'] → doit retourner 'pomme'
 * 
 * Usage: php tests/run_tests.php
 */

require_once __DIR__ . '/../src/services/TopProduitsService.php';

use App\Services\TopProduitsService;

class TestRunner
{
    private int $testsPasses = 0;
    private int $testsEchoues = 0;
    private array $echecs = [];

    public function assertEquals($expected, $actual, string $message = ''): void
    {
        if ($expected === $actual) {
            $this->testsPasses++;
            echo "✅ PASS: $message\n";
        } else {
            $this->testsEchoues++;
            $this->echecs[] = $message;
            echo "❌ FAIL: $message\n";
            echo "   Attendu: " . json_encode($expected) . "\n";
            echo "   Obtenu:  " . json_encode($actual) . "\n";
        }
    }

    public function assertNull($value, string $message = ''): void
    {
        $this->assertEquals(null, $value, $message);
    }

    public function assertNotNull($value, string $message = ''): void
    {
        if ($value !== null) {
            $this->testsPasses++;
            echo "✅ PASS: $message\n";
        } else {
            $this->testsEchoues++;
            $this->echecs[] = $message;
            echo "❌ FAIL: $message\n";
            echo "   Valeur attendue non-null, mais null obtenu\n";
        }
    }

    public function assertCount(int $expected, array $array, string $message = ''): void
    {
        $this->assertEquals($expected, count($array), $message);
    }

    public function printResultats(): void
    {
        echo "\n" . str_repeat("=", 50) . "\n";
        echo "📊 RÉSULTATS DES TESTS\n";
        echo str_repeat("=", 50) . "\n";
        echo "✅ Tests passés: {$this->testsPasses}\n";
        echo "❌ Tests échoués: {$this->testsEchoues}\n";
        echo "📈 Total: " . ($this->testsPasses + $this->testsEchoues) . "\n";
        
        if ($this->testsEchoues > 0) {
            echo "\n🔍 Échecs:\n";
            foreach ($this->echecs as $i => $msg) {
                echo "  " . ($i + 1) . ". $msg\n";
            }
            exit(1);
        } else {
            echo "\n🎉 Tous les tests sont passés avec succès!\n";
            exit(0);
        }
    }
}

// ============================================
// TESTS
// ============================================

echo "🧪 LANCEMENT DES TESTS UNITAIRES\n";
echo str_repeat("-", 50) . "\n";

$test = new TestRunner();
$service = new TopProduitsService();

// ============================================
// TEST PRINCIPAL: Scénario demandé
// ============================================
echo "\n📌 TEST PRINCIPAL - Scénario demandé\n";
echo str_repeat("-", 30) . "\n";

$produits = ['pomme', 'poire', 'pomme'];
$resultat = $service->calculerTopProduit($produits);

echo "Entrée: " . json_encode($produits) . "\n";
echo "Résultat attendu: 'pomme'\n";
echo "Résultat obtenu: '$resultat'\n";

$test->assertEquals('pomme', $resultat, "Scénario principal: ['pomme', 'poire', 'pomme'] → 'pomme'");

// ============================================
// TESTS SUPPLÉMENTAIRES
// ============================================
echo "\n📌 TESTS SUPPLÉMENTAIRES\n";
echo str_repeat("-", 30) . "\n";

// Test: Liste vide
echo "\nTest: Liste vide\n";
$test->assertNull($service->calculerTopProduit([]), "Liste vide retourne null");

// Test: Un seul produit
echo "\nTest: Un seul produit\n";
$test->assertEquals('pomme', $service->calculerTopProduit(['pomme']), "Un seul produit");

// Test: Égalité
echo "\nTest: Égalité entre produits\n";
$resultatEgalite = $service->calculerTopProduit(['pomme', 'poire']);
$test->assertEquals('pomme', $resultatEgalite, "Égalité - premier gagne");

// Test: Occurrences multiples
echo "\nTest: Occurrences multiples\n";
$test->assertEquals('pomme', $service->calculerTopProduit(['pomme', 'poire', 'pomme', 'banane', 'pomme']), 
    "Occurrences multiples - pomme gagne (3x)");

// Test: Top N produits
echo "\nTest: Top N produits\n";
$resultatTopN = $service->calculerTopNProduits(['pomme', 'poire', 'pomme', 'banane', 'banane', 'orange'], 2);
$test->assertCount(2, $resultatTopN, "Top 2 produits");
$test->assertEquals('pomme', array_key_first($resultatTopN), "Premier du top: pomme");

// Test: Pourcentage
echo "\nTest: Pourcentage de ventes\n";
$pourcentage = $service->calculerPourcentage('pomme', ['pomme', 'poire', 'pomme', 'banane']);
$test->assertEquals(50.00, $pourcentage, "Pourcentage pomme = 50%");

// ============================================
// AFFICHAGE DES RÉSULTATS
// ============================================
$test->printResultats();

