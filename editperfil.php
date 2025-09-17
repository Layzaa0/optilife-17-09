<?php
// conexão
$conn = new mysqli("localhost", "root", "", "sistema");

// pega o usuário logado (exemplo ID=1)
$id = 1;
$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Perfil Usuário</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="perfil-card">
    <!-- Foto do perfil -->
    <div class="perfil-foto">
      <img src="uploads/<?php echo $usuario['foto_perfil']; ?>" alt="Foto de perfil">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="foto" id="foto" onchange="this.form.submit()">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="foto" class="alterar-btn">Alterar</label>
      </form>
    </div>

    <!-- Dados -->
    <div class="perfil-info">
      <h2><?php echo $usuario['nome']; ?></h2>
      <p><?php echo $usuario['cidade'] . ", " . $usuario['estado']; ?></p>
      <span class="badge">Conta verificada</span>
      <p class="membro">Membro desde: <?php echo date("m/Y", strtotime($usuario['data_membro'])); ?></p>
    </div>
  </div>
</body>
</html>
