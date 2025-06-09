<?php
include("conexao.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM tickets WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "🗑️ Ticket excluído com sucesso! <a href='listar_tickets.php'>Voltar</a>";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
}
?>