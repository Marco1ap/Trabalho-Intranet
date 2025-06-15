<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $categoria = $_POST["categoria"];
    $assunto = $_POST["assunto"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO tickets (nome, email, categoria, assunto, descricao)
            VALUES ('$nome', '$email', '$categoria', '$assunto', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Ticket criado com sucesso! <a href='listar_tickets.php'>Ver lista</a>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>