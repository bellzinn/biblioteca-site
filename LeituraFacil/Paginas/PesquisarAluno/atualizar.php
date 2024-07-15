<?php
$servername = "localhost";
$username = "root";
$password = "4733105";
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter os dados atualizados do aluno do formulário
$id_usuario = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

// Query para atualizar os dados do aluno com base no ID
$sql = "UPDATE usuario SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id_usuario = $id_usuario";

if ($conn->query($sql) === TRUE) {
    echo "Dados do usuário atualizados com sucesso.";
} else {
    echo "Erro ao atualizar dados do usuário: " . $conn->error;
}

$conn->close();
?>
