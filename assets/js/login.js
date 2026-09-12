const loginForm = document.querySelector('form');
const inputUser = document.getElementById('user');
const msgErro = document.getElementById('mensagem-erro');
const textoErro = msgErro.querySelector('.texto');
 
loginForm.addEventListener('submit', function (event) {
    event.preventDefault();
 
    const usuarioDigitado = inputUser.value.trim();
 
  
    msgErro.classList.remove('ativo');
    inputUser.style.borderColor = "#0E4194";
 
    if (usuarioDigitado === "") {
        mostrarErro("Por favor, preencha o campo de usuário.");
        return;
    }
 
    
    fetch(loginForm.action, {
        method: 'POST',
        body: new FormData(loginForm)
    })
        .then((resposta) => resposta.text().then((texto) => ({ ok: resposta.ok, texto })))
        .then(({ ok, texto }) => {
 
            if (!ok) {
                mostrarErro(texto);
                inputUser.style.borderColor = "red";
                return;
            }
 
            alert(texto);
            window.location.href = "usuario.php";
        })
        .catch(() => {
            mostrarErro("Não foi possível conectar com o servidor. Tente novamente.");
        });
});
 

function mostrarErro(mensagem) {
    textoErro.textContent = mensagem; 
    msgErro.classList.add('ativo');    
}
 

inputUser.addEventListener('input', () => {
    msgErro.classList.remove('ativo');
    inputUser.style.borderColor = "#0E4194";
});