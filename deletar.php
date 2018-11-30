<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Remover anuncio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/anuncio.css" />
        <link rel="stylesheet" href="assets/css/popup.css" />
        <link href="assets/css/formcadastro.css" rel="stylesheet" type="text/css">
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
							<h2>Anuncios</h2>
							<p>Encontre o anuncio que deseja deletar através do email de contato do mesmo.</p>
						</header>
                        <section>
                            
                       <form id="Delform" name="Delform" class="formulario" action="deletar.php" method="post" enctype="multipart/form-data">
                            <label for="contato">Email do anuncio:</label>                  
                            <input type="text" name="contato" id="contato" class="form_input" required>
                            <input class="form_submit" type="submit"  value="Enviar">
                        </form>
                            <div class="adcenter">
<?php 
require_once 'assets/lib/bancoDeDados.php';
function houveSolicitacaoDeDelecao() {
    return isset ( $_POST ["senha"] ) && isset ( $_POST ["cod_anuncio"] );
}

if (! conectar ()) {
    echo "Falha ao atualizar o banco de dados!";
    return;
}
                                
if ( houveSolicitacaoDeDelecao() ){
    $senha = $_POST ["senha"];
    $cod_anuncio = $_POST ["cod_anuncio"];
    
    executarSQL ( "select cod_anuncio from Livro WHERE cod_anuncio='$cod_anuncio' and senha='$senha'" );
    $arrResultados = recuperarResultados ();

    if( count($arrResultados) > 0 ){
        executarSQL ( "DELETE FROM Livro WHERE cod_anuncio='$cod_anuncio' and senha='$senha'" );
    }else{
        echo "Não foi possivel apagar o livro! Senha incorreta!";
    }
}
                                
$contato = $_POST ["contato"];
executarSQL ( "select nome, titulo, genero, contato, cod_anuncio from Livro where contato= '$contato' " );
$arrResultados = recuperarResultados ();

foreach ( $arrResultados as $linha ) {
    $nomeDoArquivo = $linha["nome"];
?>
    <div class="adorder">
        <img  class="ad" src="./livros/<?php echo $nomeDoArquivo?>"/>
        <label class="adfont">Titulo: <?php echo $linha["titulo"]; ?> </label>
        <label class="adfont">Genero: <?php echo $linha["genero"]; ?></label>
        <label class="adfont">Contato anunciante: <?php echo $linha["contato"]; ?></label>
        <button class="btndeletar" onclick="apagaLivro(<?php echo $linha["cod_anuncio"]; ?>);">Deletar</button>
    </div>
<?php
}
?>                 
        <div class="delete">
            <form action="deletar.php" method="post">
                <label for="deletar">Senha do anuncio:</label>                  
                <input type="password" name="senha" id="senha" class="form_input" required>
                <input class="form_submit" type="submit" value="Enviar">
                <input type="hidden" name="cod_anuncio" value="" id="cod_anuncio">
                <input type="hidden" name="contato" value="<?php echo $linha["contato"]; ?>">
                <button class="btnCancel">Cancelar</button>
            </form>
        </div>
    </div>
    </section>               
			<!-- Footer -->
                        
				<footer id="footer">
					<ul class="icons">
						
						<li><a href="https://github.com/AndyTlag/tcm" class="icon alt fa-github" target="blank"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Copyright © 2018.</li>
						<li>Criators: Andy Lima &amp; Cau&ecirc; Luiz</li>
						<li>mercadolivro.help@gmail.com</li>
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
            <script src="assets/js/popup.js"></script>
            </div>
        </div>
        
	</body>
</html>