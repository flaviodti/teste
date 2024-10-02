<?php
include("conexao.php");

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
ini_set("display_errors","on");
$sql = "select nome from usuarios where cpf = '$cpf' and senha='$senha' ";

if($resultado = $conn->query($sql)){
        $row = $resultado->fetch_assoc();
        if(isset($row) && $row['nome'] != ''){
            session_start();
            $_SESSION["cpf"] = $cpf;
            $_SESSION["senha"] = $senha;
            $_SESSION["nome"] = $row['nome'];
            
            header("Location: principal.php");
        }else{
            die("Senha incorreta");
        }

}else{
    die("erro na query");
}