document.getElementById("paymentForm").addEventListener("submit", function(e) {
  e.preventDefault();

  let nome = document.getElementById("nome").value.trim();
  let cartao = document.getElementById("cartao").value.trim();
  let validade = document.getElementById("validade").value.trim();
  let cvv = document.getElementById("cvv").value.trim();

  if (!nome || !cartao || !validade || !cvv) {
    alert("Preencha todos os campos!");
    return;
  }

  alert("Pagamento realizado com sucesso!");
});
