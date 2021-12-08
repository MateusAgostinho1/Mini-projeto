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
		</br></br></br></br></br></br>
		<?php


                                      //credenciais

                                      $servidor="localhost";
                                      $usuario="root";
                                      $senha="";
                                      $dbname="ispcan";

                                      //conexao
                                     $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                                       //Select

                                      $result_usuarios = "SELECT * FROM professor
                                      INNER JOIN ano ON professor.id_prof_ano = ano.id_ano
                                      INNER JOIN curso ON professor.id_prof_curso  = curso.id_curso";
                                      $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                                      while($row_usuario = mysqli_fetch_assoc($resultado_usuarios))
                                      {
                                        echo "" . $row_usuario['id_prof']. " - ";
                                       	echo "" . $row_usuario['nome_prof']. "<br>";
                                        echo "disciplina: " . $row_usuario['disciplina']." <br> ";
                                       	echo "Ano: " . $row_usuario['ano']. "<br>";
                                        echo "Curso: " . $row_usuario['curso']." <br><hr>  ";

                                      }

        ?>
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
