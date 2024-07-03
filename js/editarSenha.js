// Habiltar a caixa de texto
document.getElementById("btnEditar").addEventListener("click", function() {
    document.getElementById("editaSenha").disabled = false;
});
//validar campo - só permitir cacteres alfanmericos, tamanho de 8
document.getElementById("form-senha").addEventListener("submit", function(event) {
    const editarSenhaInput = document.getElementById('editaSenha');
    const editarSenhaValue = editarSenhaInput.value;
    const editarSenhaRegex = /^[a-zA-Z]{8}$/;

    const errorMessageElement = document.getElementById("error-message");

    if (editarSenhaValue === "") {
        errorInput(editarSenhaInput, "A senha não pode estar vazia.");
        event.preventDefault();
    } else if (!editarSenhaRegex.test(editarSenhaValue)) {
        errorInput(editarSenhaInput, "A senha precisa ter exatamente 8 caracteres alfabéticos!");
        event.preventDefault();
    } else {
        clearError(editarSenhaInput);
    }
});

function errorInput(input, message) {
    input.classList.add("error");
    const errorMessageElement = document.getElementById("error-message");
    errorMessageElement.textContent = message;
}

function clearError(input) {
    input.classList.remove("error");
    const errorMessageElement = document.getElementById("error-message");
    errorMessageElement.textContent = "";
}

