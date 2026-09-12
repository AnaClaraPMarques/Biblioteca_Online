const botaoSalvar = document.getElementById("btn-salvar");
const inputNome = document.getElementById("input-nome");
const inputEmail = document.getElementById("input-email");
 
botaoSalvar.addEventListener("click", () => {
 
    const dados = new FormData();
    dados.append("nome", inputNome.value.trim());
    dados.append("email", inputEmail.value.trim());
 
    fetch("usuario-salvar.php", {
        method: "POST",
        body: dados
    })
        .then((resposta) => resposta.text())
        .then((mensagem) => {
            alert(mensagem);
        })
        .catch(() => {
            alert("Não foi possível conectar com o servidor. Tente novamente.");
        });
});