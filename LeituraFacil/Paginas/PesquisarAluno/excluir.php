<?php
$servername = "localhost";
$username = "root";
$password = "4733105";
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter o ID do aluno a ser excluído do formulário
$id_usuario = $_POST['id'];

// Query para excluir o aluno com base no ID
$sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";

if ($conn->query($sql) === TRUE) {
    echo "Usuário excluído com sucesso.";
} else {
    echo "Erro ao excluir usuário: " . $conn->error;
}

$conn->close();
?>
