<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Anunciar</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
							<h2>CRIE SEU ANUNCIO</h2>
							<p id="pDel">Deseja deletar um de seus anuncios? <a href="deletar.php">clique aqui</a></p>
						</header>

						<!-- Text -->
							<section>
				<form id="Livform" name="Livform" class="formulario" action="upload.php" method="post" enctype="multipart/form-data">


                    
<input type="text" name="txtTitulo" id="Titulo" class="form_input" required>
<label for="Titulo" class="form_label">Titulo do livro:</label>
                    
<input type="text" name="contato" id="contato" class="form_input" required>
<label for="contato" class="form_label">Informe um email para contato:</label>
                    
<input type="password" name="txtSenha" id="Senha" class="form_input" required>
<label for="Senha" class="form_label">Senha do anuncio:</label>
		
<!-- <label for="arquivo" class="form_label">Foto do livro:</label> -->
		<input class="form_input" type="file" id="arquivo" name="arquivo" required /><br />

	<label for="genero" class="formlabel">Genero Principal:</label>
        <select id="genero" name="Genero" form="Livform" required>
  <option value="Selecione o Genero">Selecione o Genero...</option>
            <option id="listGen" value="Direito">Direito</option>
            <option id="listGen" value="Literatura Estrangeira">Literatura Estrangeira</option>
            <option id="listGen" value="Literatura Infantojuvenil">Literatura Infantojuvenil</option>
            <option id="listGen" value="Literatura Brasileira">Literatura Brasileira</option>
            <option id="listGen" value="Didáticos">Didáticos</option>
            <option id="listGen" value="HQs">HQs</option>
            <option id="listGen" value="Manga">Manga</option>
            <option id="listGen" value="Medicina">Medicina</option>
            <option id="listGen" value="Administração">Administração</option>
            <option id="listGen" value="Autoajuda">Autoajuda</option>
            <option id="listGen" value="Artes">Artes</option>
            <option id="listGen" value="Cusos e idiomas">Cusos e idiomas</option>
            <option id="listGen" value="Dicionarios e Manuais de Conversação">Dicionarios e Manuais de Conversação</option>
            <option id="listGen" value="Romance">Romance</option>
            <option id="listGen" value="Misterio">Misterio</option>
            <option id="listGen" value="Ação">Ação</option>
            <option id="listGen" value="Aventura">Aventura</option>
            <option id="listGen" value="Ficção cientifica">Ficção cientifica</option>
            <option id="listGen" value="Fantasia">Fantasia</option>
            <option id="listGen" value="Suspense">Suspense</option>
            <option id="listGen" value="Poesia">Poesia</option>

        </select>

		<input class="form_submit" type="submit" onclick="return verificaForm()" value="Enviar">
	
	</form>	
<?php 
require_once 'assets/lib/bancoDeDados.php';
if (! conectar ()) {
	echo "Falha ao atualizar o banco de dados!";
	return;
}

    function formularioEnviado() {
	return isset ( $_POST ["txtTitulo"] ) && isset ( $_POST ["txtSenha"] ) && isset ( $_FILES ["arquivo"] ) && isset ( $_POST ["Genero"] );
}
if (formularioEnviado ()) {

	 @$nomeDoArquivo = rand () . microtime ( true ) . "." . end ( explode ( ".", $_FILES ["arquivo"] ["name"] ) );
	$caminhoDoArquivo = $_FILES ["arquivo"] ["tmp_name"];

	$titulo = $_POST ["txtTitulo"];
	$genero = $_POST ["Genero"];
    $contato = $_POST ["contato"];
    $senha= $_POST ["txtSenha"];

	$destino = "./livros/$nomeDoArquivo";

	$resultado = move_uploaded_file ( $caminhoDoArquivo, $destino );

    
    if($resultado){
        $sql = "insert into Livro (nome, titulo, genero, senha, contato) values	('$nomeDoArquivo','$titulo','$genero','$senha','$contato')";
        executarSQL ( $sql );
        echo "<script type=\"text/javascript\">alert('Anuncio criado com sucesso!');</script>";
		
    } else {
		
        echo "<script type=\"text/javascript\">alert('Falha ao criar anuncio!');</script>";
	}
}
desconectar ();
?>

								<hr />
								<header>
								<hr />
								</header>
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
            <script src="assets/js/form.js"></script>
            </div>
        </div>
	</body>
</html>