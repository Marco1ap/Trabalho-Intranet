<?php
// stats.php - Retorna estatísticas de tickets
header('Content-Type: application/json');
require_once '../backend/db.php';

function getCount($pdo, $status) {
  if ($status === 'Todos') {
    $stmt = $pdo->query('SELECT COUNT(*) FROM tickets');
    return (int)$stmt->fetchColumn();
  }
  $stmt = $pdo->prepare('SELECT COUNT(*) FROM tickets WHERE status = ?');
  $stmt->execute([$status]);
  return (int)$stmt->fetchColumn();
}

$abertos = getCount($pdo, 'Pendente');
$andamento = getCount($pdo, 'Em Andamento');
$fechados = getCount($pdo, 'Concluído');
$total = getCount($pdo, 'Todos');

echo json_encode([
  'abertos' => $abertos,
  'andamento' => $andamento,
  'fechados' => $fechados,
  'total' => $total
]);
