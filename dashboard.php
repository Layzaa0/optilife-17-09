
<link rel="stylesheet" href="dashboard.css">
<style>
  a{
    padding:20px
  }

  .btn {
    padding: 6px 12px;
    margin: 2px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    font-family: Arial, sans-serif;
    display: inline-block;
    transition: 0.3s;
  }
  
  .btn.editar {
    background-color: #4CAF50; /* Verde */
    color: white;
  }
  
  .btn.editar:hover {
    background-color: #3e8e41;
  }
  
  .btn.deletar {
    background-color: #f44336; /* Vermelho */
    color: white;
  }
  
  .btn.deletar:hover {
    background-color: #c62828;
  }

</style>
<?php
// Incluindo a conexão
include("conexao.php");

// fazendo a busca no banco
$sql = "SELECT * FROM usuarios";
//Variável result responsável por trazer os dados do banco para
// Interface do usuário
$result = mysqli_query($conexao, $sql);
?>

<div class="container">
    <h2>Lista de Usuários</h2>
    <table>
  <tr>
    <th>ID</th>
    <th>Nome do Usuário</th>
    <th>E-mail</th>
    <th>Senha</th>
    <th>Telefone</th>
    <th>Ações</th>
  </tr>
  <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['id_usuario']; ?></td>
      <td><?php echo $row['nome']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['senha']; ?></td>
      <td><?php echo $row['telefone']; ?></td>
      <td>
  <a class="btn editar" href="editar_cadastro.php?id=<?php echo $row['id_usuario']; ?>">Editar</a>
  <a class="btn deletar" href="deletar.php?id=<?php echo $row['id_usuario']; ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
</td>

    </tr>
  <?php } ?>
</table>

  </div>