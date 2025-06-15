<?php
// tickets.php - Endpoints CRUD para tickets
header('Content-Type: application/json');
require_once 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Listar tickets
        $status = isset($_GET['status']) ? $_GET['status'] : null;
        $sql = 'SELECT * FROM tickets';
        if ($status && $status !== 'Todos') {
            $sql .= ' WHERE status = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$status]);
        } else {
            $stmt = $pdo->query($sql);
        }
        $tickets = $stmt->fetchAll();
        echo json_encode($tickets);
        break;
    case 'POST':
        // Criar ticket
        $data = $_POST ? $_POST : json_decode(file_get_contents('php://input'), true);
        $sql = 'INSERT INTO tickets (nome, email, categoria, titulo, descricao, status) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['nome'] ?? null,
            $data['email'] ?? null,
            $data['categoria'] ?? null,
            $data['titulo'],
            $data['descricao'],
            $data['status']
        ]);
        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
        break;
    case 'PUT':
        // Atualizar ticket
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = 'UPDATE tickets SET titulo = ?, descricao = ?, status = ?, categoria = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['titulo'],
            $data['descricao'],
            $data['status'],
            $data['categoria'],
            $data['id']
        ]);
        echo json_encode(['success' => true]);
        break;
    case 'DELETE':
        // Deletar ticket
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $sql = 'DELETE FROM tickets WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'ID não informado']);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método não permitido']);
}
?>
