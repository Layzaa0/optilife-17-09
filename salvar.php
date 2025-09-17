<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "perfil";

// Conectar ao MySQL
$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, sobrenome, email, telefone, senha)
        VALUES ('$nome', '$sobrenome', '$email', '$telefone', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Perfil salvo com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
