document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('refreshBtn').addEventListener('click', function () {
        generateCaptcha();
    });

    document.getElementById('submitBtn').addEventListener('click', function () {
        validateCaptcha();
    });

   
    preencherDadosUsuario();
    generateCaptcha();
});

function generateCaptcha() {
    const perguntas = [
        "Qual é sua data de nascimento? (dd/mm/aaaa)",
        "Qual é seu CEP?",
        "Qual é o nome da sua mãe (nome materno)?"
    ];

    const randomIndex = Math.floor(Math.random() * perguntas.length);
    const captcha = perguntas[randomIndex];
    document.getElementById('captcha').textContent = captcha;
}

function validateCaptcha() {
    const userInput = document.getElementById('captchaInput').value.trim().toLowerCase();
    const captcha = document.getElementById('captcha').textContent.toLowerCase();

    if (userInput === captcha) {
        document.getElementById('message').textContent = 'Resposta correta. Você é humano!';
    } else {
        document.getElementById('message').textContent = 'Resposta incorreta. Tente novamente!';
        generateCaptcha();
    }
}

function preencherDadosUsuario() {
   
    document.getElementById('nome').value = "Exemplo de Nome";
    document.getElementById('dataNascimento').value = "01/01/2000";
    document.getElementById('cep').value = "12345-678";
    document.getElementById('nomeMaterno').value = "Exemplo de Nome Materno";
}
