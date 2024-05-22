<?php

$host = 'localhost';
$dbname = 'biblioteca';
$username = 'root';
$password = '4733105';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores dos campos do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   
    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // obtem os dados do usuario
    $usuario = $result->fetch_assoc();

    // verificação do tipo de usuarip
    if ($usuario['isAdmin'] == 1) {
        // se for admin
        //header("Location: http://localhost/LeituraFacil/PaginaInicial/pagInicialAdmin.html"); 
        header("Location: http://localhost/LeituraFacil/PaginaInicial/pagInicial.html"); 
        exit();
    } else {
        // se for usuario normal
        header("Location: http://localhost/LeituraFacil/PaginaInicial/pagInicial.html"); 
        exit();
    }
} else {
    // se não encontrou, exibe uma mensagem de erro
    echo "Credenciais invalidas,tente novamente.";
 }
}

$conn->close();
?>
