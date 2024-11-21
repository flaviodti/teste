<?php 
include("valida.php");
?>
<html>
<head>
    <title>Cadastro de Filmes</title>
 
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
<?php
include("conexao.php");
?>
    <div style="   background-color: #ddd; min-height: 400px; width: 600px; float:left">
        <h2>Manutenção de filmes</h2>
        <h3>Criar novo filme</h3>
        <form method="post" action="inserirFilme.php">
           NOME: <input type="text" name="nome" id="nome"><br>
           ANO: <input type="text" name="ano" id="ano"><br>
           GENERO: <select name="genero">
                        <option value="">Selecione um Gênero</option>
                    <?php
                    $sql = "select * from generos where status=1 ";
                    if(!$resultado = $conn->query($sql)){
                        die("erro");
                    }
                    while($row = $resultado->fetch_assoc()){
                        ?>
                        <option value="<?=$row['genero'];?>"><?=$row['descricao'];?></option>
                        <?php
                    }
                    
           ?>
                    </select>
            <input type="submit" value="inserir">
        </form>
        <br><br><hr><br><br>
        <?php
            

            $sql = "select f.filme,f.nome,f.ano,f.genero, g.descricao as desc_genero
                     from filmes f
                   inner join generos g on (g.genero=f.genero) ";
            if(!$resultado = $conn->query($sql)){
                die("erro");
            }
            ?>
            <table>
                <tr>
                    <td>nome</td>
                    <td>ano</td>
                    <td>genero</td>
                    <td>alterar</td>
                    <td>apagar</td>
                </tr>
            
            <?php
            while($row = $resultado->fetch_assoc()){
                ?>
                <tr>
                    <form method="post" action="alterarFilme.php"> 
                        <input type="hidden" name="filme" value="<?=$row['filme'];?>">
                        <td>
                            <input type="text" name="nome" value="<?=$row['nome'];?>">
                        </td>
                        <td><input type="text" name="ano" value="<?=$row['ano'];?>"></td>
                        <td>

                        <select name="genero">
                            <option value="">Selecione um Gênero</option>
                            <?php
                            $sqlGeneros = "select * from generos where status=1 ";
                            if(!$resultadoGeneros = $conn->query($sqlGeneros)){
                                die("erro");
                            }
                            while($rowGeneros = $resultadoGeneros->fetch_assoc()){
                                ?>
                                <option value="<?=$rowGeneros['genero'];?>" <?=($rowGeneros['genero']==$row['genero'])?'selected':'';?> ><?=$rowGeneros['descricao'];?></option>
                                <?php
                            }
                            
                            ?>
                        </select>

                        </td>
                        <td><input type="submit" value="alterar"></td>
                    </form>
                    <form method="post" action="apagarUsuario.php"> 
                        <input type="hidden" name="filme" value="<?=$row['filme'];?>">
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
