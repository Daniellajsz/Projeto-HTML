// --- Código da avaliação com estrelas --- //
document.addEventListener("DOMContentLoaded", () => {
  const botao = document.getElementById("enviar");
  const mensagem = document.getElementById("mensagem");
  const comentario = document.getElementById("comentario");
  const lista = document.getElementById("lista-avaliacoes");

  if (!botao || !lista) return;

  // Função para carregar as avaliações salvas
  function carregarAvaliacoes() {
    fetch("listaravaliacoes.php")
      .then(res => res.text())
      .then(data => lista.innerHTML = data)
      .catch(() => lista.innerHTML = "<p>Não foi possível carregar as avaliações.</p>");
  }

  // Carrega assim que a página abrir
  carregarAvaliacoes();

  // --- Envio da avaliação ---
  botao.addEventListener("click", () => {
    const estrelas = document.querySelectorAll('input[name="estrela"]');
    let valor = 0;

    estrelas.forEach(estrela => {
      if (estrela.checked) valor = estrela.value;
    });

    const textoComentario = comentario.value.trim();

    if (valor === 0) {
      mensagem.textContent = "Por favor, selecione uma nota antes de enviar.";
      mensagem.style.color = "red";
      return;
    }

    if (textoComentario === "") {
      mensagem.textContent = "Por favor, escreva um comentário antes de enviar.";
      mensagem.style.color = "red";
      return;
    }

    fetch("salvaravaliacao.php", {
      method: "POST",
      body: new URLSearchParams({
        estrela: valor,
        comentario: textoComentario
      })
    })
      .then(res => res.text())
      .then(data => {
        mensagem.textContent = data;
        mensagem.style.color = "gold";

        estrelas.forEach(e => e.checked = false);
        comentario.value = "";

        // Recarrega lista após salvar
        carregarAvaliacoes();

        // fade-out
        setTimeout(() => mensagem.classList.add("fade-out"), 1500);
        setTimeout(() => {
          mensagem.textContent = "";
          mensagem.classList.remove("fade-out");
        }, 2300);
      })
      .catch(() => {
        mensagem.textContent = "Erro ao enviar avaliação.";
        mensagem.style.color = "red";
      });
  });
});
