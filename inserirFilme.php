<?php
include("conexao.php");

$ano = $_POST["ano"];
$nome = $_POST["nome"];
$genero = $_POST["genero"];

if($genero == ''){
    die("insira um genero");
}

$sql = "insert into filmes (nome,ano,genero) values(?,?,?) ";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sii", $nome, $ano, $genero);
    if($stmt->execute()){
        header("Location: cadastroFilmes.php");
        die;
    }else{
        die("erro ao inserir filme");
    }
    
}else{
    die("erro ao inserir filme");
}