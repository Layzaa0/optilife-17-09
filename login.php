<?php
session_start();
include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta para verificar se o e-mail e senha existem
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conexao, $sql);

if(mysqli_num_rows($result) == 1) {
    // Login correto — redireciona
    header("Location: tutorial.html"); 
    exit();
} else {
    // Login incorreto — exibe alerta e volta
    echo "<script>alert('E-mail ou senha incorretos!'); window.location.href='login.html';</script>";
}
?>
