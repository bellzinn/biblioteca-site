<?php
require_once '../config.php';

header('Content-Type: application/json');

try {
	$pdo = new PDO("mysql:host=DB_HOST;dbname=DB_NAME", DB_USERNAME, DB_PASSWORD);
	// Defina o modo de erro do PDO para exceção
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Erro na conexão: " . $e->getMessage());
}

// Verifica se o ID do livro foi enviado via POST
if (isset($_POST['bookId'])) {
	$bookId = $_POST['bookId'];

	// Prepara a consulta SQL para buscar os detalhes do livro
	$sql = '
		SELECT
			*
		FROM
			livro
		WHERE
			id_livro = :id_livro';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id_livro', $bookId, PDO::PARAM_INT);
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

