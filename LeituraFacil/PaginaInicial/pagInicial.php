<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Biblioteca</title>
	<link rel="stylesheet" href="assetsInicial/stylesinicial.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
			<button id="dark" class="btn-dark">Night</button>
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

$(document).ready(function(){
			$(".book-link").click(function(e){
				e.preventDefault(); 
				var bookId = $(this).data('id'); 
				var bookImg = $(this).data('img');
				var bookTitle = $(this).data('title');
				window.location.href = `../PaginaLivros/detalhesLivro.html?id=${bookId}&img=${encodeURIComponent(bookImg)}&title=${encodeURIComponent(bookTitle)}`;
			});
		});

document.addEventListener('DOMContentLoaded', () => {
  // Carrossel
  const prevButtons = document.querySelectorAll('.prev');
  const nextButtons = document.querySelectorAll('.next');
  const scrollAmount = 220;

  function handleCarousel(event) {
    const targetId = event.currentTarget.dataset.target;
    const container = document.getElementById(targetId);
    if (!container) return;

    if (event.currentTarget.classList.contains('prev')) {
      container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    } else {
      container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
  }

  prevButtons.forEach(btn => btn.addEventListener('click', handleCarousel));
  nextButtons.forEach(btn => btn.addEventListener('click', handleCarousel));

  // Modo Dark
if (localStorage.getItem('darkMode') === 'true') {
  document.body.classList.add('dark-mode');
}

const darkModeBtn = document.getElementById('dark');
if (darkModeBtn) {
  darkModeBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
  });
}

});
</script>


		<section class="banner">
    <div class="container-slider">
        <button class="prev" onclick="mudarSlide(-1)">❮</button>
        <div class="container-img">
            <img class="slide" src="assetsinicial/githubLogo2.png" alt="seta">
            <img class="slide" src="assetsinicial/githubLogo.png" alt="Banner GitHub bellzinn">
        </div>
        <button class="next" onclick="mudarSlide(1)">❯</button>
    </div>
</section>


		<section class="sugestoes">
  			<div class="container-conteudo">
   				 <h2 style="color: #1E40AF;">Sugestões de Obras</h2>
   				 <div class="book-carousel">
   			     	<div id="sugestoes" class="book-container" style="overflow-x: auto; scroll-behavior: smooth; white-space: nowrap;">
        				<?php
          				require '../listaLivros.php';
          				listaLivros("select * from sugestoes");
        				?>
      				</div>
      				<div class="carousel-navigation">
        				<button class="prev" aria-label="Anterior" data-target="sugestoes">❮</button>
        				<button class="next" aria-label="Próximo" data-target="sugestoes">❯</button>
      			</div>
    		</div>
 		 </div>
	</section>

		<section class="lancamentos">
  			<div class="container-conteudo">
   				 <h2 style="color: #1E40AF;">Lançamentos</h2>
   				 <div class="book-carousel">
   			     	<div id="lancamentos" class="book-container" style="overflow-x: auto; scroll-behavior: smooth; white-space: nowrap;">
        				<?php
          				require '../listaLivros.php';
          				listaLivros("select * from livro");
        				?>
      				</div>
      				<div class="carousel-navigation">
        				<button class="prev" aria-label="Anterior" data-target="lancamentos">❮</button>
        				<button class="next" aria-label="Próximo" data-target="lancamentos">❯</button>
      			</div>
    		</div>
 		 </div>
	</section>

		<section class="eventos">
			<div class= "container-conteudo">
				<h2 style="color: #1E40AF; text-align: center;">Noticias</h2>
				<div class= "depoimento-conteudo">

				</div>
			</div>

		</section>

		<section class="depoimentos">
			<div class= "container-conteudo">
				<h2 style="color: #1E40AF; text-align: center;">Depoimentos dos leitores</h2>
				<div class= "depoimento-conteudo">

				</div>
			</div>

		</section>

		<section class="eventos">
			<div class= "container-conteudo">
				<h2 style="color: #1E40AF; text-align: center;">Eventos</h2>
				<div class= "depoimento-conteudo">

				</div>
			</div>

		</section>

		<section class="recursos">
			<div class="container-conteudo">
				<h2 style="color: #1E40AF; text-align: center;">Recursos</h2>
				<div class="opcoes">
					<button class="btn-opcoes" style="font-size: 20px;" onclick="location.href='../PerfilUsuario/perfilusuario.html'">Perfil</button>
					<button class="btn-opcoes" style="font-size: 20px;">Historico</button>
					<button class="btn-opcoes" style="font-size: 20px;" onclick="location.href='../PaginaLivros/pagLivros.php'">Acervo</button>
				</div>
			</div>
		</section>

		<section class="atendimento">
			<div class="container-conteudo">
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
			<div class="container-info">
				<h2 style="color: #1d61bf;">Informações</h2>
				<p style="font-size: 18px; text-align: center;">Projeto em andamento de uma biblioteca online desenvolvido com HTML, 
																CSS e JavaScript para o front-end, e PHP para conexão com banco de dados. 
																Permite o cadastro, consulta e gerenciamento de livros de forma simples e eficiente..</p>
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

	
	
	<script>
let slideIndex = 0;
mostrarSlide(slideIndex);

function mudarSlide(n) {
    slideIndex += n;
    mostrarSlide(slideIndex);
}

function mostrarSlide(n) {
    let slides = document.getElementsByClassName("slide");
    if (n >= slides.length) { slideIndex = 0; }
    if (n < 0) { slideIndex = slides.length - 1; }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex].style.display = "block";
}
</script>


	</body>
</html>
