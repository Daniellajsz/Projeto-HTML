<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "meusite";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar erro
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
