<?php
require_once '../config.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Obtém os valores dos campos do formulário
	$email = $_POST['email'];
	$senha = $_POST['senha'];
   
	$sql = "
		select
			*
		from
			usuario
		where
			email = '$email' and
			senha = '$senha'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$usuario = $result->fetch_assoc();

		if ($usuario['admin'] == 1) {
			header("Location: http://".$_SERVER['HTTP_HOST']."/LeituraFacil/Paginas/PaginaADM/pagADM.html");
		} else {
			header("Location: http://".$_SERVER['HTTP_HOST']."/LeituraFacil/PaginaInicial/pagInicial.php");
		}
		exit();
	} else {
		echo "Credenciais inválidas, tente novamente.";
	}
}

$conn->close();
?>
