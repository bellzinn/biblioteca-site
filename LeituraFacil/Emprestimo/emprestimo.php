<?php
require_once '../config.php';

$id_usuario = 1;
$sql = "
	insert into emprestimo (
		id_usuario,
		dataretirada,
		devolucaoprevista
	) values (
		'$id_usuario',
		curdate(),
		curdate() + interval 30 day
	)";

$id_emprestimo = $conn->insert_id;
$id_livro = 55555;
$sql = "
	insert into emprestimo_has_livro (
		emprestimo_id_emprestimo,
		livro_idlivro
	) values (
		'$id_emprestimo',
		'$id_livro'
	)";

if ($conn->query($sql) === TRUE) {
	echo "Empréstimo realizado.";
} else {
	echo "SQL error: '$conn->error'";
}

$conn->close();
?>
