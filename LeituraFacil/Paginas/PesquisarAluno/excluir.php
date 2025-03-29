<?php

require_once __DIR__ . '/../../config.php';

$servername = DB_HOST;
$username   = DB_USERNAME;
$password   = DB_PASSWORD;
$dbname     = DB_NAME;

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
