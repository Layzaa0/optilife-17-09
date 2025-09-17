<?php
// Conexão com banco
$host = "localhost";
$user = "root";   // ajuste se precisar
$pass = "";       // senha do seu MySQL
$db   = "perfil";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Pegando usuário (exemplo: id = 1)
$idUsuario = 1;
$sqlUsuario = "SELECT * FROM usuarios WHERE id = $idUsuario";
$resultUsuario = $conn->query($sqlUsuario);
$usuario = $resultUsuario->fetch_assoc();

// Locais
$sqlLocais = "SELECT * FROM locais WHERE usuario_id = $idUsuario";
$locais = $conn->query($sqlLocais);

// Estatísticas
$sqlEst = "SELECT * FROM estatisticas WHERE usuario_id = $idUsuario";
$estatisticas = $conn->query($sqlEst)->fetch_assoc();

// Histórico
$sqlHist = "SELECT * FROM historico WHERE usuario_id = $idUsuario ORDER BY data_ocorrencia DESC LIMIT 5";
$historico = $conn->query($sqlHist);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Perfil de <?php echo $usuario['nome']; ?></title>
  <link rel="stylesheet" href="perfil.css">
</head>
<body>

<!-- Card Perfil -->
<div class="card">
  <div class="perfil-header">
    <img src="uploads/<?php echo $usuario['foto_perfil']; ?>" alt="Foto de perfil">
    <div>
      <h2>
        <?php echo $usuario['nome']; ?>
        <?php if ($usuario['conta_verificada']) { ?>
          <span class="badge">✔ Verificado</span>
        <?php } ?>
      </h2>
      <p><?php echo $usuario['cidade'] . " - " . $usuario['estado']; ?></p>
      <p>Membro desde: <?php echo date("d/m/Y", strtotime($usuario['data_membro'])); ?></p>
    </div>
  </div>
</div>

<!-- Card Locais -->
<div class="card">
  <h2>Locais</h2>
  <?php while ($l = $locais->fetch_assoc()) { ?>
    <div class="local-item">
      <span><?php echo $l['nome_local'] . " (" . $l['bairro'] . ")"; ?></span>
      <span class="status <?php echo $l['status'] == 'com_energia' ? 'ok' : 'off'; ?>">
        <?php echo $l['status'] == 'com_energia' ? 'Com energia' : 'Sem energia'; ?>
      </span>
    </div>
  <?php } ?>
</div>

<!-- Card Estatísticas -->
<div class="card">
  <h2>Estatísticas</h2>
  <div class="estatisticas">
    <div class="estatistica-box">
      <h3><?php echo $estatisticas['tempo_sem_energia']; ?></h3>
      <p>Tempo sem energia</p>
    </div>
    <div class="estatistica-box">
      <h3><?php echo $estatisticas['quedas_registradas']; ?></h3>
      <p>Quedas registradas</p>
    </div>
    <div class="estatistica-box">
      <h3><?php echo $estatisticas['tempo_medio']; ?></h3>
      <p>Tempo médio</p>
    </div>
    <div class="estatistica-box">
      <h3><?php echo $estatisticas['local_mais_afetado']; ?></h3>
      <p>Local mais afetado</p>
    </div>
  </div>
</div>

<!-- Card Histórico -->
<div class="card">
  <h2>Histórico</h2>
  <?php while ($h = $historico->fetch_assoc()) { ?>
    <div class="historico-item">
      <p><strong><?php echo $h['local']; ?></strong></p>
      <p><?php echo date("d/m/Y H:i", strtotime($h['data_ocorrencia'])); ?> - Duração: <?php echo $h['duracao']; ?></p>
    </div>
  <?php } ?>
</div>

</body>
</html>
