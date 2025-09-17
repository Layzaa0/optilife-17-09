<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "optilife";

// Conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica erro
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
