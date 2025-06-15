<?php
// login.php - Login de usuário
header('Content-Type: application/json');
require_once 'db.php';
session_start();

// Garante que a tabela de usuários existe
$pdo->exec('CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
)');

$data = json_decode(file_get_contents('php://input'), true);
$email = trim($data['email'] ?? '');
$password = $data['password'] ?? '';

if (!$email || !$password) {
    echo json_encode(['success' => false, 'error' => 'Preencha todos os campos.']);
    exit;
}

// Permite login por email ou username
$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ? OR username = ?');
$stmt->execute([$email, $email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Usuário ou senha inválidos.']);
}
