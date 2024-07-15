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

	<header>
		<div class="container">
			<div class="logo">
				<a href="../PaginaInicial/pagInicial.php">
					<img src="logo2.0d.png" alt="logo do site">
				</a>
			</div>
			<div class="search-box">
				<input type="text" placeholder="O que você procura?">
			</div>
			<button id="contraste" class="btn-contraste">Alto Contraste</button>
		</div>
	</header>

	<nav class="menulateral">
		<div class="expandir">
			<i class="bi bi-list"></i>
		</div>

		<ul>
			<li class="itens">
				<a href="http://localhost/LeituraFacil/PerfilUsuario/perfilusuario.html">
					<span class="icon"><i class="bi bi-person-lines-fill"></i></span>
					<span class="txtlink">Perfil</span>
				</a>
			</li>
			<li class="itens">
				<a href="../PaginaLivros/pagLivros.php">
					<span class="icon"><i class="bi bi-book"></i></span>
					<span class="txtlink">Acervo</span>
				</a>
			</li>
			<li class="itens">
				<a href="#">
					<span class="icon"><i class="bi bi-basket"></i></span>
					<span class="txtlink">Historico</span>
				</a>
			</li>
		</ul>
	</nav>

	<!-- SCRIPTS  -->   

	<script> 
		$(document).ready(function(){
			$(".book-link").click(function(e){
				e.preventDefault(); 
				var bookId = $(this).data('id'); 
				var bookImg = $(this).data('img');
				var bookTitle = $(this).data('title');
				window.location.href = `detalhesLivro.html?id=${bookId}&img=${encodeURIComponent(bookImg)}&title=${encodeURIComponent(bookTitle)}`;
			});
		});

		document.addEventListener('DOMContentLoaded', function() {
			if (localStorage.getItem('altoContraste') === 'true') {
				document.body.classList.add('alto-contraste');
			}
			document.getElementById('contraste').addEventListener('click', function() {
				document.body.classList.toggle('alto-contraste');
				localStorage.setItem('altoContraste', document.body.classList.contains('alto-contraste'));
			});
		});

	</script>

	<!-- Conteúdo -->
	<div class="content-wrapper">
		<div class="library-content">
			<h2 style="color: #1d61bf;">Acervo</h2>
			<!-- Sugestões de Livro -->
			<div class="book-section">
				<h3>Sugestões de Livro</h3>
				<div class="book-container"> 
					<?php
					require "../listaLivros.php";

					listaLivros("select * from sugestoes");
					?>
				</div>
			</div>
			<!-- Lançamentos -->
			<div class="book-section">
				<h3>Lançamentos</h3>
				<div class="book-container"> 
					<?php
					require "../listaLivros.php";

					listaLivros("select * from lancamentos");
					?>
				</div>
			</div>
			<!-- Logica -->
			<div class="book-section">
				<h3>Logica Computacional</h3>
				<div class="book-container"> 
					<?php
					require "../listaLivros.php";

					listaLivros("select * from livro where genero = 'Lógica Computacional'");
					?>
				</div>
			</div>
			<!-- Psicologia -->
			<div class="book-section">
				<h3>Psicologia</h3>
				<div class="book-container"> 
					<?php
					require "../listaLivros.php";

					listaLivros("select * from livro where genero = 'Psicologia'");
					?>
				</div>
			</div>
			<!-- Todos -->
			<div class="book-section">
				<h3>Todos os Livros</h3>
				<div class="book-container"> 
					<?php
					require "../listaLivros.php";

					listaLivros("select * from livro");
					?>
				</div>
			</div>
		</div>
	</div>

	<!-- Rodapé -->
	<footer>
		<div class="container">
			<div class="footer-center">
				<p>Todos os direitos reservados</p>
			</div>
		</div>
	</footer>
</body>
</html>
