<?php
require_once "dbperfil.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["salvar"])) {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar_senha) {
        header("Location: index.html?msg=Senhas+não+coincidem");
        exit;
    }

    // Criptografa a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, sobrenome, email, telefone, senha)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $sobrenome, $email, $telefone, $senha_hash);

    if ($stmt->execute()) {
        header("Location: index.html?msg=Perfil+salvo+com+sucesso");
    } else {
        header("Location: index.html?msg=Erro+ao+salvar");
    }

    $stmt->close();
    $conn->close();
}
?>
