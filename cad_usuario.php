<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ISPCAN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
	<div class="container" id="sendjobs">
		<header>
			<nav>
				<div class="nav-container">
			        <a href="index.html">
						<img id="logo" src="img/casa.png" alt="JobFinder">
			        </a>
					<i class="fas fa-bars btn-menumobile"></i>
					<ul>
						<li><a href="cadastrar.html">CADASTRAR</a></li>
						<li><a href="#">AJUDA</a></li>
						<li><a href="#">SOBRE NÓS</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<?php
                    		if(isset($_SESSION['msg'])){
                    			echo $_SESSION['msg'];
                    			unset($_SESSION['msg']);
                    		}
                    		?>
		<form method="POST" action="proc_cad_usuario.php">
                    			<main id="sendjobs-container" class="wrapper">
                                			<h1>Preencha os dados do estudante</h1>
						<h align="center">
                                             <h4>PARA OS CURSOS E PERIODOS INSIRA APENAS OS CÓDIGOS </h4>
                                                <h5>INFORMÁTICA COD:1 | C. CIVIL COD:2 | ELECTRÓNICA COD:3 | C.GESTÃO COD:4 | ENFERMAGEM COD:5 | ECONOMIA COD:6
                                                | PSICOLOGIA COD:7 | G.R.H COD:8 | FISIOTERAPIA COD:9 | L. PORTUGUESA COD:10</h5>

                                                <h5>MANHÃ COD:1 | TARDE COD:2 | NOITE COD:3</h5>
						<h5>AS SALAS DISPONÍVEIS VARIAM DE 15 A 34 </h5><br>
                                            <h align="left">
                                			<div class="input-box">
                                				<label>Nome Completo <span class="required">*</span></label>
                                				<input type="nome" name="nome" placeholder="Insira o nome do estudante">
                                			</div>
                                			<div class="input-box">
                                				<label>Insira o ano <span class="required">*</span></label>
                                				<input type="ano_id" name="ano_id" placeholder="Insira o ano"></input>
                                			</div>
                                			<div class="input-box">
                                				<label>Insira a sala <span class="required">*</span></label>
                                				<input type="turma_id" name="turma_id" placeholder="Insira a sala">
                                			</div>
                                			<div class="input-box">
                                				<label>Insira o periodo <span class="required">*</span></label>
                                				<input type="periodo_id" name="periodo_id" placeholder="Insira o periodo">
                                			</div>
                                			<div class="input-box">
                                             	<label>Insira o curso <span class="required">*</span></label>
                                                <input type="curso_id" name="curso_id" placeholder="Insira o curso">
                                            </div>
                                			<div class="input-box">
                                				<input type="submit" name="Enviar">
                                			</div>
                                		</main>
                    		</form>
		<footer>
        			<div class="wrapper">
        				<div class="footer-box">
        					<div class="company-footer">
        						<img src="img/logo.jpg" width="60" height="50">
        						<h2>ISPCAN</h2>
        					</div>
        				</div>
        				<div class="footer-box">
        					<div class="articles-footer">
        						<h2>Copyright 2021</h2>
        						<ul class="footer-list footer-article-list">
        							<li>
        								<a href="#">TELL:+244 942 736 420 | +244 995 637 156</a>
        								<span class="article-date">Malanje Angola</span>
        							</li>
        						</ul>
        					</div>
        				</div>
        				<div class="footer-box">
        					<h2>Nos encontre nas redes sociais</h2>
        					<ul class="footer-list">
        						<li>
        							<a href="#">
        								<i class="fab fa-instagram"></i>
        								<span>Instagram</span>
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<i class="fab fa-linkedin"></i>
        								<span>Linkedin</span>
        							</a>
        						</li>
        					</ul>
        				</div>
        			</div>

        		</footer>
	</div>
</body>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</html>
