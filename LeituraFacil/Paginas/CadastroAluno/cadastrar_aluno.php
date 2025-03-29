<?php

require_once __DIR__ . '/../../config.php';

$servername = DB_HOST;
$username   = DB_USERNAME;
$password   = DB_PASSWORD;
$dbname     = DB_NAME;

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = "123"; // Senha
    $admin = 0; //não administrador por padrão

    // Prepara e executa a consulta SQL para inserir os dados
    $stmt = $conn->prepare("INSERT INTO usuario (nome, email, telefone, senha, admin) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $nome, $email, $telefone, $senha, $admin);

    if ($stmt->execute()) {
        echo "Novo aluno cadastrado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
