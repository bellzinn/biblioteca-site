<?php
$servername = "localhost";
$username = "root";
$password = "4733105";
$dbname = "biblioteca";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtém os dados do formulário
$nome = $_POST['nome'];
$id_usuario = $_POST['id'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

// Prepara a consulta
$sql = "SELECT * FROM usuario WHERE nome LIKE '%$nome%' AND email LIKE '%$email%' AND telefone LIKE '%$telefone%' AND id_usuario LIKE '%$id_usuario%'";
$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    // Itera pelos resultados e adiciona ao array de resposta
    while($row = $result->fetch_assoc()) {
        $response[] = array(
            "id" => $row["id_usuario"],
            "nome" => $row["nome"],
            "email" => $row["email"],
            "telefone" => $row["telefone"]
        );
    }
} 

// Fecha a conexão
$conn->close();

// Retorna os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
