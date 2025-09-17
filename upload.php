<?php
$conn = new mysqli("localhost", "root", "", "sistema");

$id = $_POST['id'];

if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novoNome = "perfil_" . $id . "." . $ext;
    move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $novoNome);

    $sql = "UPDATE usuarios SET foto_perfil='$novoNome' WHERE id=$id";
    $conn->query($sql);
}

header("Location: index.php");
exit;
?>
