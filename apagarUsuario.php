<?php
include("conexao.php");

$cpf = $_POST["cpf"];

$sql = "delete from usuarios where cpf = '$cpf' ";
if(!$resultado = $conn->query($sql)){
    die("erro");
}
header("Location: cadastroUsuarios.php");