const loginForm = document.querySelector('form');
const inputUser = document.getElementById('user');
const msgErro = document.getElementById('mensagem-erro');
const textoErro = msgErro.querySelector('.texto');

loginForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const usuarioDigitado = inputUser.value.trim();

    // Resetar estado inicial
    msgErro.classList.remove('ativo');
    inputUser.style.borderColor = "#0E4194";

    if (usuarioDigitado === "") {
        mostrarErro("Por favor, preencha o campo de usuário.");
        return;
    }

    // VERIFICAÇÃO PROFISSIONAL
    if (!bancoDeDados.includes(usuarioDigitado)) {
        mostrarErro("E-mail ou CPF não cadastrado. Verifique ou cadastre-se.");
        inputUser.style.borderColor = "red";
    } else {
        // Sucesso
        alert("Login efetuado!"); 
    }
});

// Função para mostrar o erro de forma elegante
function mostrarErro(mensagem) {
    textoErro.textContent = mensagem; // Troca o texto do erro
    msgErro.classList.add('ativo');    // Mostra a caixinha
}

// Esconde o erro quando o usuário volta a digitar
inputUser.addEventListener('input', () => {
    msgErro.classList.remove('ativo');
    inputUser.style.borderColor = "#0E4194";
});