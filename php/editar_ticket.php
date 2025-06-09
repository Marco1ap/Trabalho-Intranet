<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $status = $_POST["status"];

    $sql = "UPDATE tickets SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Ticket atualizado com sucesso! <a href='listar_tickets.php'>Voltar</a>";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
} else {
    $id = $_GET["id"];
    $query = "SELECT * FROM tickets WHERE id=$id";
    $result = $conn->query($query);
    $ticket = $result->fetch_assoc();
}
?>

<?php if (isset($ticket)) { ?>
<h2>✏️ Editar Ticket</h2>
<form method="POST" action="editar_ticket.php">
    <input type="hidden" name="id" value="<?= $ticket['id'] ?>">
    <label for="status">Status:</label>
    <select name="status" required>
        <option value="Pendente" <?= $ticket['status'] == 'Pendente' ? 'selected' : '' ?>>Pendente</option>
        <option value="Em Andamento" <?= $ticket['status'] == 'Em Andamento' ? 'selected' : '' ?>>Em Andamento</option>
        <option value="Concluído" <?= $ticket['status'] == 'Concluído' ? 'selected' : '' ?>>Concluído</option>
    </select>
    <button type="submit">Atualizar</button>
</form>
<?php } ?>