<?php 
include("valida.php");
?>
<html>
<head>
    <title>Prncipal</title>
 <script>
    function validarSenha() {
        return true;
        senha = document.getElementById("senha").value;
  // Verifica se a senha tem no mínimo 6 caracteres
  if (senha.length < 6) {
    return false;
  }

  // Expressões regulares para cada critério
  const temNumero = /[0-9]/.test(senha); // Verifica se tem pelo menos um número
  const temMaiuscula = /[A-Z]/.test(senha); // Verifica se tem pelo menos uma letra maiúscula
  const temMinuscula = /[a-z]/.test(senha); // Verifica se tem pelo menos uma letra minúscula
  const temEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(senha); // Verifica se tem pelo menos um caractere especial

  // Retorna true se todos os critérios forem atendidos
  return temNumero && temMaiuscula && temMinuscula && temEspecial;
}
</script>
</head>
<body>

<div style="width: 800px; margin: 0 auto;">
    <div style="min-height: 100px; width: 100%; background-color: #4CAF50;";>
        <div style="width: 50%; float:left">
        <span style="padding-left: 10px;">Olá <?=$_SESSION['nome'];?></span>
        </div>

        <div style="width: 50%; float:left; text-align:right;">
        <span style="background-color:blue; margin-right:10px;"> <a href="sair.php"><font color="black">SAIR</font></a></span>
        </div>

    </div>
    <div id="menu" style="width: 200px; background-color: #f4f4f4; min-height: 400px; float: left;">
        <h2>Menu</h2>
        <p><a href="cadastroUsuarios.php"><font color="black">Cadastrar Usuários</font></a></p>
        <p>Item 2</p>
        <p>Item 3</p>
    </div>

    <div style="   background-color: #ddd; min-height: 400px; width: 600px; float:left">
        <h2>Manutenção de usuários</h2>
        <h3>Criar novo usuário</h3>
        <form method="post" action="inserirUsuario.php" onsubmit="return validarSenha()">
           CPF: <input type="text" name="cpf" id="cpf"><br>
           NOME: <input type="text" name="nome" id="nome"><br>
           SENHA: <input type="password" name="senha" id="senha">
            <input type="submit" value="inserir">
        </form>
        <br><br><hr><br><br>
        <?php
            include("conexao.php");

            $sql = "select nome,cpf,senha from usuarios ";
            if(!$resultado = $conn->query($sql)){
                die("erro");
            }
            ?>
            <table>
                <tr>
                    <td>nome</td>
                    <td>cpf</td>
                    <td>senha</td>
                    <td>alterar</td>
                    <td>apagar</td>
                </tr>
            
            <?php
            while($row = $resultado->fetch_assoc()){
                ?>
                <tr>
                    <form method="post" action="alterarUsuario.php"> 
                        <input type="hidden" name="cpfAnterior" value="<?=$row['cpf'];?>">
                        <td>
                            <input type="text" name="nome" value="<?=$row['nome'];?>">
                        </td>
                        <td><input type="text" name="cpf" value="<?=$row['cpf'];?>"></td>
                        <td><input type="text" name="senha" value="<?=$row['senha'];?>"></td>
                        <td><input type="submit" value="alterar"></td>
                    </form>
                    <form method="post" action="apagarUsuario.php"> 
                        <input type="hidden" name="cpf" value="<?=$row['cpf'];?>">
                        <td><input type="submit" value="apagar"></td>
                    </form>
                </tr>
                <?php
            }
        ?>  </table>
    </div>
</div>

</body>
</html>
