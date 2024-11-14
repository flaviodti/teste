<html>
  <title>titulo</title>
  <head>
  <script>
 
      function validarCPF(cpf) {
        // Remove caracteres que não são números
        cpf = cpf.replace(/\D/g, '');

        // Verifica se o CPF tem 11 dígitos ou se é uma sequência de dígitos repetidos
        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
          return false;
        }

        // Validação dos dígitos verificadores
        let soma = 0;
        let resto;

        // Cálculo do primeiro dígito verificador
        for (let i = 1; i <= 9; i++) {
          soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.substring(9, 10))) {
          return false;
        }

        // Cálculo do segundo dígito verificador
        soma = 0;
        for (let i = 1; i <= 10; i++) {
          soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.substring(10, 11))) {
          return false;
        }

        return true;
      }

      function validarFormulario(event) {
       return true;

        const cpf = document.forms["loginForm"]["cpf"].value;
        const senha = document.forms["loginForm"]["senha"].value;

        //const cpf = document.getElementById("cpf").value;
        //const senha = document.getElementById("senha").value;


        // Validação do CPF
        if (cpf === "" || !validarCPF(cpf)) {
          alert("Por favor, insira um CPF válido.");
          event.preventDefault(); // Impede o envio do formulário
          return false;
        }

        // Validação da senha: não pode estar vazia
        if (senha === "") {
          alert("Por favor, insira uma senha.");
          event.preventDefault(); // Impede o envio do formulário
          return false;
        }

        return true; // Se estiver tudo ok, permite o envio do formulário
      }
    </script>
  </head>
  <body>

    <form name="loginForm" method="post" action="login.php" onsubmit="return validarFormulario(event)">
      CPF:<input type="text" name="cpf" id="cpf"><br>
      SENHA: <input type="password" name="senha" id="senha"><br>
      <input type="submit" value="Enviar">
    </form>
<script>
     document.getElementById("cpf").focus();
     </script>
  </body>
</html>