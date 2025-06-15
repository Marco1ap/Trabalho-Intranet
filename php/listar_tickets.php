<?php
include("conexao.php");

$sql = "SELECT * FROM tickets ORDER BY id DESC";
$result = $conn->query($sql);
?>

<h2>📋 Lista de Tickets</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Nome</th><th>Email</th><th>Assunto</th><th>Status</th><th>Ações</th>
    </tr>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['nome']}</td>";
    echo "<td>{$row['email']}</td>";
    echo "<td>{$row['assunto']}</td>";

    // IF/ELSE para cor de status
    if ($row['status'] === 'Pendente') {
        echo "<td style='color: orange'>{$row['status']}</td>";
    } elseif ($row['status'] === 'Em Andamento') {
        echo "<td style='color: blue'>{$row['status']}</td>";
    } else {
        echo "<td style='color: green'>{$row['status']}</td>";
    }

    // Botões de editar/deletar
    echo "<td>
        <a href='editar_ticket.php?id={$row['id']}'>Editar</a> |
        <a href='excluir_ticket.php?id={$row['id']}'>Excluir</a>
    </td>";

    echo "</tr>";
}
?>
</table>