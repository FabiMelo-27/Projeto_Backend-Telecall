const form = document.getElementById('form')
const nomeInput = document.getElementById('nome')
const cpfInput = document.getElementById('cpf')
const data_nascimentoInput = document.getElementById('data_nascimento')
const generoInput = document.getElementById('genero')
const nome_maeInput = document.getElementById('nome_mae')
const emailInput = document.getElementById('email')
const telefoneInput = document.getElementById('telefone')
const celularInput = document.getElementById('celular')
const cepInput = document.getElementById('cep')
const enderecoInput = document.getElementById('endereco')
const numInput = document.getElementById('num')
const bairroInput = document.getElementById('bairro')
const cidadeInput = document.getElementById('cidade')
const loginInput = document.getElementById('login')
const estadoInput = document.getElementById('estado')
const senhaInput = document.getElementById('senha')
const confirmaSenhaInput = document.getElementById('confirmaSenha')

form.addEventListener("submit", (event) => { 
  checkForm();
  

})

nome.addEventListener("blur", () => {
   ValidarNome();
 })

  cpf.addEventListener("blur", () => {
    ValidarCPF();
  })
  data_nascimento.addEventListener("blur", () => {
    ValidarDataNascimento();
  })
  genero.addEventListener("blur", () => {
    ValidarGenero();
  })
 nome_mae.addEventListener("blur", () => {
    ValidarNomeMaterno();
  }) 
email.addEventListener("blur", () => {
    ValidarEmail();
  }) 
telefone.addEventListener("blur", () => {
    ValidarTelefone();
  }) 
celular.addEventListener("blur", () => {
    ValidarCelular();
  }) 
cep.addEventListener("blur", () => {
    ValidarCep();
  }) 
endereco.addEventListener("blur", () => {
    ValidarEndereco();
  }) 
num.addEventListener("blur", () => {
    ValidarNumero();
  }) 
bairro.addEventListener("blur", () => {
    ValidarBairro();
  }) 
cidade.addEventListener("blur", () => {
    ValidarCidade();
  }) 
estado.addEventListener("blur", () => {
    ValidarEstado();
  }) 
login.addEventListener("blur", () => {
    ValidarLogin();
  }) 


  
  senha.addEventListener("blur", () => {
    ValidarSenha();
  })
  confirmaSenha.addEventListener("blur", () => {
    ValidarConfirmaSenha();
  })

  function ValidarNome() {
    const nomeInput = document.querySelector('#nome'); // Seleciona o campo de input do nome
    const nomeValue = nomeInput.value;
    const nomeRegex = /^[a-zA-Zà-úÀ-Ú\s]{8,60}$/; // Regex para 8 a 60 caracteres alfabéticos

    if (nomeValue === "") {
      errorInput(nomeInput, "");
    } else {
      if (!nomeRegex.test(nomeValue)) {
        errorInput(nomeInput, "O nome precisa ter entre 8 e 60 caracteres alfabéticos!");
      } else {
        const formItem = nomeInput.parentElement;
        formItem.className = "form-content";
      }
    }
  }

  function ValidarCPF() {
    const cpfValue = cpf.value;
    const cpfRegex = new RegExp(/^(?:[0-9]{3}\.){2}(?:[0-9]{3}\-)(?:[0-9]){2}$/)


    if (cpfValue === "") {
      errorInput(cpf, "")
    } else {
      if (!cpfRegex.test(cpfValue)) {
        errorInput(cpf, "Preencha um CPF válido!");
      }
      if (!ValidaCpf(cpfValue)) {
        errorInput(cpf, "Preencha um CPF válido!");
      }
      else {
        const formItem = cpf.parentElement;
        formItem.className = "form-content"
      }
    }
  }

  function ValidaCpf(cpf) {
    cpf = cpf.replace(/\.|-/g, "");

    // Verifica se todos os dígitos do CPF são iguais e retorna uma mensagem para o cliente
    if (cpf.split('').every((char) => char === cpf[0])) {
      console.log("CPF inválido. Por favor, digite um CPF válido.");
      return false;
    }

    soma = 0;
    soma += cpf[0] * 10;
    soma += cpf[1] * 9;
    soma += cpf[2] * 8;
    soma += cpf[3] * 7;
    soma += cpf[4] * 6;
    soma += cpf[5] * 5;
    soma += cpf[6] * 4;
    soma += cpf[7] * 3;
    soma += cpf[8] * 2;
    soma = (soma * 10) % 11;
    if (soma == 10 || soma == 11)
      soma = 0;
    if (soma != cpf[9]) {
      return false;
    }

    soma = 0;
    soma += cpf[0] * 11;
    soma += cpf[1] * 10;
    soma += cpf[2] * 9;
    soma += cpf[3] * 8;
    soma += cpf[4] * 7;
    soma += cpf[5] * 6;
    soma += cpf[6] * 5;
    soma += cpf[7] * 4;
    soma += cpf[8] * 3;
    soma += cpf[9] * 2;
    soma = (soma * 10) % 11;
    if (soma == 10 || soma == 11)
      soma = 0;
    if (soma != cpf[10]) {
      return false;
    }

    // Se o CPF passar por todas as verificações, é considerado válido
    return true;
  }

  function ValidarDataNascimento() {
    const data_nascimentoValue = data_nascimento.value;

    if (data_nascimentoValue === "") {
      errorInput(data_nascimento, "")
    } else {
      const formItem = data_nascimento.parentElement;
      formItem.className = "form-content"
    }
  }

  function ValidarGenero() {
    const generoValue = genero.value;

    if (generoValue === "") {
      errorInput(genero, ""); // Use 'genero' aqui também
    } else {
      const formItem = genero.parentElement;
      formItem.className = "form-content"; // Assumindo que "form-content" é uma classe CSS que indica validação bem-sucedida
    }
  }

  function ValidarNomeMaterno() {
    const nomeMaternoInput = document.querySelector('#nome_mae'); // Corrige para usar o ID correto do campo de entrada
    const nomeMaternoValue = nomeMaternoInput.value;
    const nomeMaternoRegex = /^[a-zA-Zà-úÀ-Ú\s]{8,60}$/; // Regex para 8 a 60 caracteres alfabéticos, incluindo espaços

    if (nomeMaternoValue.trim() === "") { // Usa trim() para remover espaços em branco antes e depois do valor
      errorInput(nomeMaternoInput, "");
    } else if (!nomeMaternoRegex.test(nomeMaternoValue)) {
      errorInput(nome_maeInput, "O nome precisa ter entre 8 e 60 caracteres alfabéticos!");
    } else {
      const formItem = nomeMaternoInput.parentElement;
      formItem.className = "form-content";
    }
  }


  function ValidarEmail() {
    const emailInput = document.querySelector('#email'); // Certifique-se de que '#email' seja o ID correto do campo de e-mail
    const emailValue = emailInput.value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expressão regular simples para validar o formato de e-mail

    if (emailValue === "") {
      errorInput(emailInput, "");
    } else if (!emailRegex.test(emailValue)) {
      errorInput(emailInput, "Por favor, insira um e-mail válido.");
    }
    else {
      const formItem = emailInput.parentElement;
      formItem.className = "form-content";
    }
  }

  function ValidarTelefone() {
    const telefoneValue = telefoneInput.value;

    if (telefoneValue === "") {
      errorInput(telefoneInput, "")
    } else {
      const formItem = telefoneInput.parentElement;
      formItem.className = "form-content"
    }
  }

  function ValidarCelular() {
    const celularValue = celularInput.value;

    if (celularValue === "") {
      errorInput(celularInput, "")
    } else {
      const formItem = celularInput.parentElement;
      formItem.className = "form-content"
    }

  }

  function ValidarCep() {
    const cepValue = cepInput.value;
    const cepRegex = /^(?:\d{5}-?\d{3})$/; // Expressão regular para validar CEP no formato "XXXXX-XXX" ou "XXXXX"

    if (cepValue === "") {
      errorInput(cepInput, "");
    } else {
      if (!cepRegex.test(cepValue)) {
        errorInput(cepInput, "Preencha um CEP válido!");
      } else {
        const formItem = cepInput.parentElement;
        formItem.className = "form-content"; // Se for um CEP válido, limpar a indicação de erro
      }
    }
  }


  function ValidarEndereco() {
    const enderecoInput = document.querySelector('#endereco');
    const enderecoValue = enderecoInput.value;

    if (enderecoValue === "") {
      errorInput(enderecoInput, "");
    } else {

      const formItem = enderecoInput.parentElement;
      formItem.className = "form-content"
    }

  }

  function ValidarNumero() {
    const numInput = document.querySelector('#num'); // Certifique-se de que '#numero' seja o ID correto do campo de número
    const numValue = numInput.value;
    const numRegex = /^\d+$/; // Expressão regular para verificar se o valor contém apenas dígitos
    if (numValue === "") {
      errorInput(numInput, "");
    } else if (!numRegex.test(numValue)) {
      errorInput(numInput, "Somente números");
    } else {
      const formItem = numInput.parentElement;
      formItem.className = "form-content"
    }

  }
  function ValidarBairro() {
    const bairroValue = bairroInput.value;

    if (bairroValue === "") {
      errorInput(bairroInput, "")
    } else {
      const formItem = bairroInput.parentElement;
      formItem.className = "form-content"
    }

  }

  function ValidarCidade() {
    const cidadeValue = cidadeInput.value;

    if (cidadeValue === "") {
      errorInput(cidadeInput, "")
    } else {
      const formItem = cidadeInput.parentElement;
      formItem.className = "form-content"
    }

  }

  function ValidarEstado() {
    const estadoValue = estadoInput.value;

    if (estadoValue === "") {
      errorInput(estadoInput, "")
    } else {
      const formItem = estadoInput.parentElement;
      formItem.className = "form-content"
    }

  }

  function ValidarLogin() {

    const loginValue = loginInput.value;
    const loginRegex = new RegExp(/^[a-zA-Z]{6}$/);

    if (loginValue === "") {
      errorInput(loginInput, "")
    } else {
      if (!loginRegex.test(loginValue)) {
        errorInput(loginInput, "O usuario precisa ter 6 caracteres alfabeticos!")
      } else {
        const formItem = loginInput.parentElement;
        formItem.className = "form-content"
      }
    }
  }

 
  function ValidarSenha() {
    const senhaInput = document.querySelector('#senha');
    const senhaValue = senhaInput.value;
    const senhaRegex = /^[a-zA-Z]{8}$/; // Exige exatamente 8 dígitos alfabéticos, sem distinção entre maiúsculas e minúsculas

    if (senhaValue === '') {
      errorInput(senhaInput, "");
    } else if (!senhaRegex.test(senhaValue)) {
      errorInput(senhaInput, "A senha deve ser composta por 8 dígitos alfabéticos");
    } else {
      const formItem = senhaInput.parentElement;
      formItem.className = "form-content";
    }

  }

  function ValidarConfirmaSenha() {
    const senhaValue = senhaInput.value;
    const confirmaSenhaValue = confirmaSenhaInput.value;

    if (confirmaSenhaValue === "") {
      errorInput(confirmaSenhaInput, "Confirme a senha.");
    } else if (senhaValue !== confirmaSenhaValue) {
      errorInput(confirmaSenhaInput, "As senhas não são iguais.");
    } else {
      const formItem = confirmaSenhaInput.parentElement;
      formItem.className = "form-content valid";
    }

  }


  function checkForm() {
    ValidarNome();        
    ValidarCPF();   
    ValidarDataNascimento();   
    ValidarGenero();
    ValidarNomeMaterno();
    ValidarEmail();
    ValidarTelefone();
    ValidarCelular();
    ValidarCep();
    ValidarEndereco();
    ValidarNumero();
    ValidarBairro();
    ValidarCidade();
    ValidarEstado();
    ValidarLogin();
    ValidarSenha();
    ValidarConfirmaSenha();
    
    
}

function errorInput(input, message) {
  const formItem = input.parentElement;
  const textMessage = formItem.querySelector("a")

  textMessage.innerText = message;

  formItem.className = "form-content error"

}


$(document).ready(function(){
  $('#telefone').mask('(+55)00 0000-0000'); // Aplica a máscara de telefone
});

$(document).ready(function(){
  $('#celular').mask('(+55)00 00000-0000'); // Aplica a máscara de telefone
});

$(document).ready(function(){
  $('#cpf').mask('000.000.000-00'); // Aplica a máscara cpf
});

$(document).ready(function(){
  $('#cep').mask('00000-000'); // Aplica a máscara cpf
});

