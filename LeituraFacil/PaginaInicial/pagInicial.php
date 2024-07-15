<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Biblioteca</title>
	<link rel="stylesheet" href="assetsInicial/stylesInicial.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<a href="pagInicial.php">
					<img src="logo2.0d.png" alt="logo do site">
				</a>
			</div>
			<div class="search-box">
				<input type="text" placeholder="O que você procura?">
			</div>
			<button id="contraste" class="btn-contraste">Alto Contraste</button>
		</div>
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

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const prevButtons = document.querySelectorAll('.prev');
			const nextButtons = document.querySelectorAll('.next');
			function handleCarousel(event) {
				const targetId = event.target.dataset.target;
				const bookContainer = document.getElementById(targetId);
				const scrollAmount = 220; 
				if (event.target.classList.contains('prev')) {
					bookContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
				} else {
					bookContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
				}
			}
			prevButtons.forEach(button => button.addEventListener('click', handleCarousel));
			nextButtons.forEach(button => button.addEventListener('click', handleCarousel));
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

		<section class="destaques">
			<div class="container">
				<h2 style="color: #1d61bf;">Sugestões de Obras</h2>
				<div class="book-carousel">
					<div class="book-container">
						<?php
						require '../listaLivros.php';

						listaLivros("select * from sugestoes");
						?>
					</div>
					<div class="carousel-navigation">
						<button class="prev" data-target="sugestoes">❮</button>
						<button class="next" data-target="sugestoes">❯</button>
					</div>
				</div>
			</div>
		</section>

		<section class="lancamentos">
			<div class="container">
				<h2 style="color: #1d61bf;">Lançamentos</h2>
				<div class="book-carousel">
					<div class="book-container">
						<?php
						require '../listaLivros.php';

						listaLivros("select * from lancamentos");
						?>
					</div>
					<div class="carousel-navigation">
						<button class="prev" data-target="lancamentos">❮</button>
						<button class="next" data-target="lancamentos">❯</button>
					</div>
				</div>
			</div>
		</section>

		<section class="recursos">
			<div class="container">
				<h2 style="color: #1d61bf; text-align: center;">Recursos</h2>
				<div class="opcoes">
					<button class="btn-opcoes" style="font-size: 20px;">Perfil</button>
					<button class="btn-opcoes" style="font-size: 20px;">Historico</button>
					<button class="btn-opcoes" style="font-size: 20px;">Acervo</button>
				</div>
			</div>
		</section>

		<section class="atendimento">
			<div class="container">
				<h2 style="color: #1d61bf; text-align: center;">Atendimento</h2>
				<div class="opcoes">
					<button class="btn-opcoes" style="font-size: 20px;">Elogios</button>
					<button class="btn-opcoes" style="font-size: 20px;">Denuncias</button>
					<button class="btn-opcoes" style="font-size: 20px;">Sugestões</button>
					<button class="btn-opcoes" style="font-size: 20px;">Solicitações</button>
				</div>
			</div>
		</section>

		<section class="info">
			<div class="container">
				<h2 style="color: #1d61bf;">Informações</h2>
				<p style="font-size: 18px; text-align: center;">O sistema de gerenciamento de empréstimos de livros em Java é uma solução abrangente projetada para modernizar e otimizar as operações de bibliotecas, este sistema oferece uma gama de opções tanto para admins da biblioteca como também para os usuarios dela.</p>
			</div>
		</section>
	</main>

	<footer>
		<div class="container">
			<div class="footer-center">
				<p>Todos os direitos reservados</p>
			</div>
		</div>
	</footer>

	<script src="assetsInicial/scriptsInicial.js"></script> 
	</body>
</html>
