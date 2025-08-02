<?php

/**
 * Exemplo de como usar a classe database com o padrão Singleton
 */

// Incluindo as dependências necessárias
require_once 'core/Core.php';
require_once 'core/Database.php';

// Criando uma instância do Core
$core = new Core();

// Primeira chamada - cria a conexão com o banco
$db1 = Database::getInstance($core);
echo "Primeira instância criada\n";

// Segunda chamada - reutiliza a conexão existente
$db2 = Database::getInstance($core);
echo "Segunda instância obtida\n";

// Verificando se ambas são a mesma instância
if ($db1 === $db2) {
    echo "✓ Sucesso! Ambas as variáveis referenciam a mesma instância\n";
    echo "✓ A conexão com o banco foi feita apenas uma vez!\n";
} else {
    echo "✗ Erro! São instâncias diferentes\n";
}

// Exemplos de uso dos métodos
try {
    // Usando fetchAll
    $users = $db1->fetchAll("SELECT * FROM users LIMIT 5");
    echo "Usuários encontrados: " . count($users) . "\n";
    
    // Usando fetchOne
    $user = $db1->fetchOne("SELECT * FROM users WHERE id = ?", [1]);
    if (!empty($user)) {
        echo "Usuário encontrado: " . $user['name'] ?? 'N/A' . "\n";
    }
    
    // Usando métodos estáticos
    Database::insert('logs', [
        'message' => 'Teste de inserção',
        'level' => 'info',
        'created_at' => date('Y-m-d H:i:s')
    ], $core);
    echo "Log inserido com sucesso\n";
    
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
