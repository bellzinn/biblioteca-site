<?php
if (!function_exists('listaLivros'))   {
	require_once '../config.php';
	function listaLivros($sql) {
		$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["id_livro"];
			$titulo = $row["titulo"];
			$img = '../ImagensLivros/'.$row["imagem"];
			echo <<<HTML
				<div class="book">
					<a href="#" class="book-link" data-id="$id" data-img="$img" data-title="$titulo"> 
						<img src="${img}" alt="${titulo}">
						<h4>$titulo</h4>
					</a>	
					<button class="btn-emprestimo">Empréstimo</button>
				</div>
			HTML;
		}
	}
}
?>
