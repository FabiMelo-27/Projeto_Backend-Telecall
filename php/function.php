<?php

function mostra_data($data_nascimento){
    $d = explode('-', $data_nascimento);
    $escreve = $d[2]."/".$d[1]."/".$d[0];
    return $escreve;
  }
  
  function perguntas_2fa(){
    $perguntas = array("Qual o nome da sua mãe?","Qual o seu CEP?", "Qual a sua data de nascimento?)");
  }

//   função modal

  function mensagem($titulo, $mensagem,$p, $btn,$link) {
    echo "
    <div class='modal fade' id='mensagemModal' tabindex='-1' aria-labelledby='mensagemModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <!-- Cabeçalho do Modal -->
                <div class='modal-header'>
                    <h5 class='modal-title' id='mensagemModalLabel'>$titulo</h5>
                    <a href='logout.php' class='close'  ></a>
                        <span aria-hidden='true'>&times;</span>
                    </a>
                </div>
                
                <!-- Corpo do Modal -->
                <div class='modal-body'>
                    <h5>$mensagem</h5>
                    <p>$p</p>
                </div>
                <div class='modal-footer'>
                    <a href='$link' class='btn btn-primary'>$btn</a>
                  <!--  <a href='../php/logout.php' class='btn btn-danger' data-dismiss='modal'>Sair</a>-->
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mensagemModal = new bootstrap.Modal(document.getElementById('mensagemModal'), {});
            mensagemModal.show();
        });
    </script>";
  }

//   Função para evitar ataque sdo tipo XXS
  
  function clear($conexao, $texto_puro) {
    if (is_array($texto_puro)) {      
        $texto_limpo = array();
        foreach ($texto_puro as $key => $value) {
            $value = mysqli_real_escape_string($conexao, $value);
            $value = htmlspecialchars($value);
            $texto_limpo[$key] = $value;
        }
        return $texto_limpo;
    } else {        
        $texto = mysqli_real_escape_string($conexao, $texto_puro);
        $texto = htmlspecialchars($texto);
        return $texto;
    }
  }
?>



