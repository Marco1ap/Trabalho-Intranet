<?php
// db.php - Conexão com o banco de dados SQLite
$db_path = __DIR__ . '/intranet.sqlite';

try {
    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // Cria a tabela de tickets se não existir
    $pdo->exec('CREATE TABLE IF NOT EXISTS tickets (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT,
        email TEXT,
        categoria TEXT,
        titulo TEXT NOT NULL,
        descricao TEXT,
        status TEXT NOT NULL
    )');
    // Cria a tabela de usuários se não existir
    $pdo->exec('CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        email TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL
    )');
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()]);
    exit;
}
?>
