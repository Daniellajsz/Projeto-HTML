<?php
session_start();
$usuarioLogado = isset($_SESSION["usuario_id"]) ? "true" : "false";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendamento</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="styleagenda.css">
  <script src="java.js" defer></script>
</head>

<body>
  <a href="index.html" id="voltar">Voltar</a>
  <section class="fundo-agendamento">
    <div class="container" id="agendamento">

      <h2>Agendamentos</h2>


      <div class="formAgendamento">
        <form id="formAgendamento">
          <label for="nome">Seu Nome:</label>
          <input type="text" id="nome" name="nome" placeholder="Insira seu nome" required>
          <label for="Email">Seu email:</label>
          <input type="email" id="email" name="email" placeholder="Insira seu e-mail" required>

          <label for="telefone">Seu Telefone:</label>
          <input type="tel" id="telefone" name="telefone" placeholder="Insira seu telefone" required>

          <label for="servico">Selecione o Serviço:</label>
          <select id="servico" name="servico" required>
            <option value=""></option>
            <option value="Corte infantil">Corte infantil - Para crianças a partir de 2 anos - R$35</option>
            <option value="Coloração">Coloração - R$100</option>
            <option value="Design e Corte">Design e Corte - R$80</option>
            <option value="Sobrancelha + Corte + Bigode">Sobrancelha + Corte + Bigode - R$80</option>
            <option value="Tranças e Penteados">Tranças + Penteados - R$250</option>
            <option value="Hidratação">Hidratação - R$70</option>
          </select>

          <label for="Formas de Pagamento">Formas de Pagamento</label>
          <select id="Pagamento" name="Pagamento" required>
            <option value=""></option>
            <option value="PIX">Pix</option>
            <option value="Crédito">Crédito</option>
            <option value="Débito">Débito</option>
            <option value="Dinheiro">Dinheiro</option>
          </select>

          <label for="profissional">Selecione o Profissional:</label>
          <select id="profissional" name="profissional" required>
            <option value=""></option>
            <option value="Carlos">Carlos</option>
            <option value="Mateus">Mateus</option>
            <option value="Guilherme">Guilherme</option>
            <option value="Pedro">Pedro</option>
            <option value="Mario">Mario</option>
          </select>

          <label for="data">Selecione a data:</label>
          <input type="date" id="data" name="data" required min="2025-10-08" max="2026-01-08">

          <label for="hora">Selecione o horário disponível:</label>
          <select id="hora" name="hora" required>
            <option value="">-- Selecione --</option>
            <option value="08:00">08:00</option>
            <option value="08:45">08:45</option>
            <option value="09:30">09:30</option>
            <option value="10:15">10:15</option>
            <option value="11:00">11:00</option>
            <option value="11:45">11:45</option>
            <option value="12:30">12:30</option>
            <option value="13:15">13:15</option>
            <option value="14:00">14:00</option>
            <option value="14:45">14:45</option>
            <option value="15:30">15:30</option>
            <option value="16:15">16:15</option>
            <option value="17:00">17:00</option>
          </select>

          <button id="Agendar" type="submit">Agendar</button>
          <div id="resposta"></div>
        </form>
        <div class="sem-conta">
          <p>Não tem conta? <a href="login.html" id="criarConta">Clique aqui</a></p>
        </div>

      </div>
    </div>
  </section>
<script>
 
const form = document.getElementById("formAgendamento");
const usuarioLogado = <?php echo $usuarioLogado; ?>;
if (form) {
 
  form.addEventListener("submit", function (e) {
 
    if (!usuarioLogado) {
      // impede enviar e mostra a mensagem de login
      alert("Você precisa fazer login para agendar!");
      e.preventDefault();
      return; // impede o resto do código daqui pra baixo
    }
 
    // Se estiver logado → só aqui executa seu código normal
    e.preventDefault();
    const nome = document.getElementById("nome").value;
    const profissional = document.getElementById("profissional").value;
    const data = document.getElementById("data").value;
    const hora = document.getElementById("hora").value;
 
    alert("Cadastro realizado com sucesso!");
 
    form.reportValidity();
    form.reset();
 
  });
}
 
 
</script>
</body>

</html>