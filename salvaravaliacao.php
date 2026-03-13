<?php
session_start();
require "conexao.php";

if (!isset($_SESSION["usuario_id"])) {
    echo "Faça login para continuar";
    exit;
}

$usuario_id = $_SESSION["usuario_id"];
$estrela = $_POST["estrela"] ?? null;
$comentario = $_POST["comentario"] ?? null;

// Agora incluindo a data corretamente
$sql = "INSERT INTO avaliacoes (usuario_id, estrela, comentario, data)
        VALUES (?, ?, ?, NOW())";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("iis", $usuario_id, $estrela, $comentario);

if ($stmt->execute()) {
    echo "Avaliação enviada com sucesso!";
} else {
    echo "Erro ao salvar: " . $stmt->error;
}
?>
