<?php

include("conexao.php");
$cpf=$_POST["cpf"];
$senha=$_POST["senha"];

function validar_cpf($cpf) {
    // Remove possíveis máscaras
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    // Verifica se o número de dígitos é 11
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se todos os números são iguais (CPF inválido)
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Calcula o primeiro dígito verificador
    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

// Exemplo de uso:

if (!validar_cpf($cpf)) {
    die("CPF inválido.");
}



$sql = "select nome from usuarios where cpf = ? and senha=? ";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $cpf, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($row['nome'] != ''){
            session_start();
            $_SESSION["cpf"] = $cpf;
            $_SESSION["senha"] = $senha;
            $_SESSION["nome"] = $row['nome'];
            
            header("Location: principal.php");
        }else{
            die("Senha incorreta");
        }
    }else{
        die("nenhum usuário encontrado");
    }
}
?>
