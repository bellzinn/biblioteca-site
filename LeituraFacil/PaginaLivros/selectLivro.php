<?php
header('Content-Type: application/json');

$host = 'localhost'; // Endereço do servidor de banco de dados
$dbname = 'biblioteca'; // Nome do banco de dados
$username = 'root'; // Nome de usuário do banco de dados
$password = '4733105'; // Senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Defina o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}





// Verifica se o ID do livro foi enviado via POST
if (isset($_POST['bookId'])) {
    $bookId = $_POST['bookId'];

    // Prepara a consulta SQL para buscar os detalhes do livro
    $sql = 'SELECT idlivro, titulo, autor, genero, idioma, editora, situacao FROM livro WHERE idlivro = :idlivro';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idlivro', $bookId, PDO::PARAM_INT);
    $stmt->execute();

    // Busca os dados do livro
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($book) {
        // Retorna os dados do livro em formato JSON
        echo json_encode($book);
    } else {
        // Retorna um erro caso o livro não seja encontrado
        echo json_encode(['error' => 'Livro não encontrado']);
    }
} else {
    // Retorna um erro caso o ID do livro não tenha sido enviado
    echo json_encode(['error' => 'ID do livro não fornecido']);
}
?>

