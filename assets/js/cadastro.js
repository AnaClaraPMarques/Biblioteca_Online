const form = document.querySelector("form");

const nome = document.getElementById("inputname");
const email = document.getElementById("inputemail");
const senha = document.getElementById("inputpassword");
const confirmarSenha = document.getElementById("inputconfirmpassword");

criarMensagem(nome);
criarMensagem(email);
criarMensagem(senha);
criarMensagem(confirmarSenha);


nome.addEventListener("input", () => {

    if (nome.value.trim().length < 10) {

        erro(nome, "Digite no mínimo 10 caracteres");

    } else {

        sucesso(nome, "Nome válido");
    }
});


email.addEventListener("input", () => {

    if (
        !email.value.includes("@") ||
        !email.value.includes(".")
    ) {

        erro(email, "Digite um e-mail válido");

    } else {

        sucesso(email, "E-mail válido");
    }
});


senha.addEventListener("input", () => {

    if (
        senha.value.length < 8 ||
        !senha.value.match(/[A-Z]/) ||
        !senha.value.match(/[0-9]/)
    ) {

        erro(senha, "Use 8 caracteres, 1 letra maiúscula e 1 número");

    } else {

        sucesso(senha, "Senha forte");
    }
});


confirmarSenha.addEventListener("input", () => {

    if (confirmarSenha.value !== senha.value) {

        erro(confirmarSenha, "Senha Incorreta");

    } else {

        sucesso(confirmarSenha, "Senha correta");
    }
});


form.addEventListener("submit", (event) => {

    event.preventDefault();

    if (
        nome.classList.contains("success") &&
        email.classList.contains("success") &&
        senha.classList.contains("success") &&
        confirmarSenha.classList.contains("success")
    ) {

        alert("Cadastro realizado com sucesso!");

        form.reset();

        limparTudo();
    }
});


function erro(input, mensagem) {

    input.classList.remove("success");
    input.classList.add("error");

    input.style.border = "2px solid #ff3b3b";
    input.style.boxShadow = "0 0 10px rgba(255, 59, 59, 0.2)";

    const mensagemErro =
        input.parentElement.querySelector(".mensagem");

    mensagemErro.innerText = mensagem;
    mensagemErro.style.color = "#ff3b3b";

}

function sucesso(input, mensagem) {

    input.classList.remove("error");
    input.classList.add("success");

    input.style.border = "2px solid #22c55e";
    input.style.boxShadow = "0 0 10px rgba(34, 197, 94, 0.2)";

    const mensagemErro =
        input.parentElement.querySelector(".mensagem");

    mensagemErro.innerText = mensagem;
    mensagemErro.style.color = "#22c55e";
}


// CRIA TEXTO ABAIXO DO INPUT

function criarMensagem(input) {

    const small = document.createElement("small");

    small.classList.add("mensagem");

    input.parentElement.appendChild(small);
}


// LIMPAR

function limparTudo() {

    const mensagens =
        document.querySelectorAll(".mensagem");

    mensagens.forEach((msg) => {

        msg.innerText = "";

    });

    const inputs =
        document.querySelectorAll(".form-control");

    inputs.forEach((input) => {

        input.style.border = "1px solid #0E408F";
        input.style.boxShadow = "none";

        input.classList.remove("success");
        input.classList.remove("error");
    });
};