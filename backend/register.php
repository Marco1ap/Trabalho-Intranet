<?php
// register.php - Cadastro de novo usuário
header('Content-Type: application/json');
require_once 'db.php';

// Cria tabela de usuários se não existir
define('USER_TABLE_SQL', 'CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
)');
$pdo->exec(USER_TABLE_SQL);

$data = json_decode(file_get_contents('php://input'), true);
$username = trim($data['username'] ?? '');
$email = trim($data['email'] ?? '');
$password = $data['password'] ?? '';

if (!$username || !$email || !$password) {
    echo json_encode(['success' => false, 'error' => 'Preencha todos os campos.']);
    exit;
}

// Verifica se já existe usuário/email
$stmt = $pdo->prepare('SELECT id FROM usuarios WHERE username = ? OR email = ?');
$stmt->execute([$username, $email]);
if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'error' => 'Usuário ou email já cadastrado.']);
    exit;
}

// Criptografa a senha
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)');
$stmt->execute([$username, $email, $hash]);
echo json_encode(['success' => true]);
