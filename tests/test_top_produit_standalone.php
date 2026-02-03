<?php
/**
 * Test automatisé pour valider la logique du Top Produit
 * Scénario: ['pomme', 'poire', 'pomme'] → Résultat attendu: 'pomme'
 */

// Charger la classe TopProduitsService
require_once __DIR__ . '/../src/services/TopProduitsService.php';

use App\Services\TopProduitsService;

class TestRunner
{
    private int $passed = 0;
    private int $failed = 0;
    private array $errors = [];

    public function assertEquals($expected, $actual, string $message): void
    {
        if ($expected === $actual) {
            $this->passed++;
            echo "✅ PASS: {$message}\n";
        } else {
            $this->failed++;
            $this->errors[] = $message . " - Attendu: " . var_export($expected, true) . ", Obtenu: " . var_export($actual, true);
            echo "❌ FAIL: {$message}\n";
        }
    }

    public function assertNull($value, string $message): void
    {
        if ($value === null) {
            $this->passed++;
            echo "✅ PASS: {$message}\n";
        } else {
            $this->failed++;
            $this->errors[] = $message . " - Attendu null, Obtenu: " . var_export($value, true);
            echo "❌ FAIL: {$message}\n";
        }
    }

    public function printResults(): void
    {
        echo "\n" . str_repeat("=", 50) . "\n";
        echo "RÉSULTATS DES TESTS\n";
        echo str_repeat("=", 50) . "\n";
        echo "✅ Tests réussis: {$this->passed}\n";
        echo "❌ Tests échoués: {$this->failed}\n";
        
        if (!empty($this->errors)) {
            echo "\nErreurs:\n";
            foreach ($this->errors as $error) {
                echo "  - {$error}\n";
            }
        }
        
        echo "\n";
        exit($this->failed > 0 ? 1 : 0);
    }
}

// ============================================
// DÉBUT DES TESTS
// ============================================

echo str_repeat("=", 50) . "\n";
echo "🧪 TEST: LOGIQUE TOP PRODUIT\n";
echo str_repeat("=", 50) . "\n\n";

$service = new TopProduitsService();
$tester = new TestRunner();

// 🎯 SCÉNARIO PRINCIPAL DEMANDÉ PAR L'UTILISATEUR
echo "--- Scénario principal: ['pomme', 'poire', 'pomme'] ---\n";
$resultat = $service->calculerTopProduit(['pomme', 'poire', 'pomme']);
$tester->assertEquals('pomme', $resultat, "Top produit avec ['pomme', 'poire', 'pomme'] doit être 'pomme'");

// Tests supplémentaires
echo "\n--- Tests supplémentaires ---\n";
$tester->assertNull($service->calculerTopProduit([]), "Liste vide doit retourner null");
$tester->assertEquals('pomme', $service->calculerTopProduit(['pomme']), "Un seul produit");
$tester->assertEquals('pomme', $service->calculerTopProduit(['pomme', 'poire', 'pomme', 'banane', 'pomme']), "Multiple occurrences");

// Afficher le résumé
$tester->printResults();

echo "🎉 Tous les tests ont réussi !\n";

