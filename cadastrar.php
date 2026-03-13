<?php
require "conexao.php";

// Pega os dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$telefone = $_POST['telefone'] ?? ''; // <-- ADICIONE ISSO

// Valida e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("E-mail inválido!");
}

// Criptografa a senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Inserir no banco COM TELEFONE
$sql = "INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssss", $nome, $email, $senhaHash, $telefone);

//
if($stmt->execute()){
    // Redireciona de volta com mensagem de sucesso
    header("Location: login.html?sucesso=1");
    exit;
} else {
    header("Location: login.html?erro=1");
    exit;

}
?>