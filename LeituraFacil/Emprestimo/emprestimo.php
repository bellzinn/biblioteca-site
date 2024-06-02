<?php
require_once '../config.php';

$id_usuario = 1;
$sql = "
	insert into emprestimo (
		id_usuario,
		data_retirada,
		devolucao_prevista
	) values (
		'$id_usuario',
		curdate(),
		curdate() + interval 30 day
	)";

$conn->query($sql);

$id_emprestimo = $conn->insert_id;
$id_livro = 1;
$sql = "
	insert into emprestimo_livros (
		id_emprestimo,
		id_livro
	) values (
		'$id_emprestimo',
		'$id_livro'
	)";

$conn->query($sql);

echo "Empréstimo realizado.";

$conn->close();
?>
