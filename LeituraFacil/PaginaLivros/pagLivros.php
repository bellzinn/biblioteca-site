<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acervo</title>
	<link rel="stylesheet" href="assetsPagLivro/styleLivros.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<div>
		<div class="profile">
			<img src="person-circle.svg" alt="Ícone de Perfil">
			<a href="#"style="color: #1d61bf"; >Perfil</a>
		</div>
		<div class="search-box">
			<input type="text" placeholder="Pesquisar...">
		</div>
		<div class="logosite">
			<a href="../PaginaInicial/pagInicial.php">
				<img src="imgPagLivros/logo.jpg" alt="logo do site">
			</a>
		</div>
	</div>

	<nav class = "menulateral">
		<div class = "expandir">
			<i class="bi bi-list"></i>
		</div>

		<ul>
			<li class = "itens">
				<a href="#">
					<span class="icon"><i class="bi bi-person-lines-fill"></i></span>
					<span class = txtlink>Perfil</span>
				</a>
			</li>
			<li class = "itens">
				<a href="pagLivros.php">
					<span class="icon"><i class="bi bi-book"></i></span>
					<span class = txtlink>Acervo</span>
				</a>
			</li>
			<li class = "itens">
				<a href="#">
					<span class="icon"><i class="bi bi-basket"></i></span>
					<span class = txtlink>Historico</span>
				</a>
			</li>
			<li class = "itens">
				<a href="#">
					<span class="icon"><i class="bi bi-basket"></i></span>
					<span class = txtlink>Teste</span>
				</a>
			</li>
		</ul>
	</nav>
   
	<!-- scripts  -->   

	<script> //redirecionar para a pagina de detalhes de livro
		$(document).ready(function(){
			$(".book-link").click(function(e){
				e.preventDefault(); // Impede que o link redirecione imediatamente
				
				var bookId = $(this).data('id'); //obtem o ID do livro no qual o usuario clicou
				$(document).ready(function(){
				$(".book-link").click(function(e){
									
				var bookId = $(this).data('id');
				var bookImg = $(this).data('img');
				var bookTitle = $(this).data('title');
									
				// Redireciona para a nova página com os parâmetros na URL
				window.location.href = `detalhesLivro.html?id=${bookId}&img=${encodeURIComponent(bookImg)}&title=${encodeURIComponent(bookTitle)}`;
					});
				});
				  
			});
		});
	</script>

	<script> //script para deslocamento dos livros
		document.addEventListener('DOMContentLoaded', function () {
			const prevButton = document.querySelector('.prev');
			const nextButton = document.querySelector('.next');
			const bookContainer = document.querySelector('.book-container');
	
			prevButton.addEventListener('click', function () {
				bookContainer.scrollBy({
					left: -200, // deslocamento
					behavior: 'smooth' // adiciona um efeito de deslocamento suave
				});
			});
	
			nextButton.addEventListener('click', function () {
				bookContainer.scrollBy({
					left: 200, // deslocamento
					behavior: 'smooth' // adiciona um efeito de deslocamento suave
				});
			});
		});
	</script>

	<script> //mostrar mais
		document.addEventListener("DOMContentLoaded", function() {
			const books = document.querySelectorAll('.todos-os-livros .book');
			const showMoreButton = document.getElementById('show-more');
			const booksToShow = 15; // Quantidade de livros a serem mostrados por clique
		
			let currentIndex = 0;
		
			function showMoreBooks() {
				for (let i = 0; i < booksToShow; i++) {
					if (currentIndex < books.length) {
						books[currentIndex].classList.remove('hidden');
						currentIndex++;
					}
				}
				// Se todos os livros estiverem visíveis, esconda o botão
				if (currentIndex >= books.length) {
					showMoreButton.style.display = 'none';
				}
			}
		
			// Inicialmente esconder todos os livros extras
			books.forEach((book, index) => {
				if (index >= booksToShow) {
					book.classList.add('hidden');
				}
			});
		
			showMoreButton.addEventListener('click', showMoreBooks);
		});
	</script>

	<!-- conteudo -->

	<div class = conteudo>
		<div class = titulo>
			<h2 style="color: #1d61bf";>Acervo</h2>
		</div>
	</div>

	<div class="content-wrapper">
		<div class="library-content">
			<h2 style="color: #1d61bf;">Sugestões de Obras</h2>
			<div class="book-carousel">
				<div class="book-container">
					<?php
					require_once '../config.php';
					$sql = "select * from livro";
					$result = $conn->query($sql);
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row["id_livro"];
						$titulo = $row["titulo"];
						$imagem = "http://".$_SERVER['HTTP_HOST'].'/LeituraFacil/ImagensLivros/'.$row["imagem"];
						echo <<<HTML
						<div class="book">
							<a href="#" class="book-link" data-id="$id" data-img="$imagem" data-title="$titulo"> 
								<img src="$imagem" alt="">
								<h4>$titulo</h4>
							</a>	
							<button class="btn-emprestimo1">Empréstimo</button>
						</div>
						HTML;
					}
					?>
				</div>
				<div class="carousel-navigation">
					<button class="prev">&#10094;</button>
					<button class="next">&#10095;</button>
				</div>
			</div>
		</div>
	</div>

	<div class = conteudo1>
		<div class = titulo1>
			<h2 style="color: #1d61bf";>Todos os livros</h2>
		</div>
		<div class="todos-os-livros">
			<?php
			require_once '../config.php';
			$sql = "select * from livro";
			$result = $conn->query($sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row["id_livro"];
				$titulo = $row["titulo"];
				$imagem = "http://".$_SERVER['HTTP_HOST'].'/LeituraFacil/ImagensLivros/'.$row["imagem"];
				echo <<<HTML
				<div class="book">
					<img src="$imagem" alt="">
					<h4>$titulo</h4>
					<button class="btn-emprestimo">Empréstimo</button>
				</div>
				HTML;
			}
			?>
		</div>
		<button id="show-more" class = "botaoMostrar">Mostrar mais</button>
	</div>

	<div class="rodape">
		<div class="logorodape">
			<img src="imgPagLivros/logo.jpg" alt="logo do site">
		</div>
		<p style="font-size: 16px; text-align: left; margin-top: 170px;margin-left: 110px;" >blablablababalbalbal.</p>
		<p style="font-size: 16px; text-align: left; margin-top: 20px;margin-left: 110px;" >blablkabkabbakbakbaka.</p>
		<p style="font-size: 16px; text-align: left; margin-top: 20px;margin-left: 110px;" >blabldandndanadknkada.</p>
		<p style="font-size: 16px; text-align: left; margin-top: 20px;margin-left: 110px;" >blabladnjndjkanjdnajkdna.</p>
	</div>
</body>
</html>
