<?php
include ("conexao.php");

$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$telefone=$_POST['telefone'];

$sql="INSERT INTO usuarios(nome,email,senha, telefone)
VALUES ('$nome', '$email' , '$senha' ,'$telefone')";

if (mysqli_query ($conexao,$sql)) {
    header('Location: dashboard.php');
 } else {
     echo "erro" . mysqli_connect_erro($conexao);
 }

mysqli_close($conexao);
?>