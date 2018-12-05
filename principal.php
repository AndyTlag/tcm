<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php 

require_once 'assets/lib/bancoDeDados.php';

if (! conectar ()) {
    echo "Falha ao atualizar o banco de dados!";
    return;
}
?>
<html>
	<head>
		<title>Principal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/anuncio.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php"><img class="imglogo" src="images/escrita-white.png" /></a></h1>
					<nav id="nav">
						<ul>
				            <li><a href="index.php">Sobre</a></li>						
							<li><a href="principal.php">Ofertas</a></li>
							<li><a href="upload.php" class="button primary">Anunciar</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Ofertas</h2>
							<p>Entre em contato com o anunciante para mais informações</p>
						</header>
                        <section>
                            
                            
                            <div class="adcenter">
    <?php
		executarSQL ( "select nome, titulo, genero, contato from Livro" );
		$arrResultados = recuperarResultados ();

		foreach ( $arrResultados as $linha ) {
            $nomeDoArquivo = $linha["nome"];
    ?>
                            
                            <div class="adorder">
           
                                <img  class="ad" src="./livros/<?php echo $nomeDoArquivo?>"/>
                                <label class="adfont">Titulo: <?php echo $linha["titulo"]; ?> </label>
                                <label class="adfont">Genero: <?php echo $linha["genero"]; ?></label>
                                <label class="adfont">Contato anunciante: <?php echo $linha["contato"]; ?></label>
                           
                            </div>
    <?php
		}
    ?>
                            
                            </div>

                            
                        </section>
                    
                        
			<!-- Five -->
				<section id="five" class="wrapper style2 special fade">
					<div class="container">
						<p id="pDeletar">Deseja deletar um de seus anuncios? <br> <a href="deletar.php">Clique Aqui!</a></p>
					</div>
				</section>

				<!-- Footer -->
				<footer id="footer">

					<ul class="icons">						
						<li><a class="icon alt fa-envelope" target="blank" ><span class="label">Email</span></a></li>
						<li>mercadolivro.help@gmail.com</li>
					</ul>

					<ul class="copyright">
						<li>&copy; Copyright © 2018.</li>
						<li>Criators: Andy Lima &amp; Cau&ecirc; Luiz</li>
					</ul>
					<br>
					<ul class="icons">
						<li><a href="https://github.com/AndyTlag/tcm" class="icon alt fa-github" target="blank"><span class="label">GitHub</span></a></li>

					</ul>

				</footer>

			</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            </div>
        </div>
        
	</body>
</html>