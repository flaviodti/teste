<?php
include("conexao.php");

$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$senha = $_POST["senha"];

$sqlValida = "select count(*) as qt from usuarios where cpf = '$cpf'";

if($qt > 0){
    die("usuário já inexistente");
}

$sql = "insert into usuarios (cpf,nome,senha) values('$cpf','$nome','$senha') ";
if(!$resultado = $conn->query($sql)){
    die("erro");
}
header("Location: cadastroUsuarios.php");