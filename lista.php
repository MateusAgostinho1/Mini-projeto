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
						<li><a href="indexpdf.php">IMPRIMIR RELATORIO</a></li>
						<li><a href="#">SOBRE NÓS</a></li>
					</ul>
				</div>
			</nav>
		</header>
		</br></br></br></br></br></br>
		<?php
                    		if(isset($_SESSION['msg'])){
                    			echo $_SESSION['msg'];
                    			unset($_SESSION['msg']);
                    		}
                    		//Receber o número da página

                    		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
                    		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                    		//Setar a quantidade de itens por pagina
                    		$qnt_result_pg = 5;

                    		//calcular o inicio visualização
                    		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                    		$result_usuarios = "SELECT * FROM alunos
                      	INNER JOIN ano ON alunos.ano_id = ano.id_ano
                      	INNER JOIN curso ON alunos.curso_id = curso.id_curso
                      	INNER JOIN periodo ON alunos.periodo_id = periodo.id_periodo
                      	INNER JOIN turma ON alunos.turma_id = turma.id_turma ORDER BY nome LIMIT $inicio, $qnt_result_pg";
                    		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
                    		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                    	
                    			echo "" . $row_usuario['nome']. " | ";
                    			echo "Curso: " . $row_usuario['curso']." | ";
                    			echo "Periodo: " . $row_usuario['periodo']. " | ";
                    			echo "Turma: " . $row_usuario['bloco'] . " | ";
                    			echo "Ano: " . $row_usuario['ano']. " | ";
					echo "Cadastado em:" . $row_usuario['criado'] . "<br>";
                    			echo "<a href='edit_usuario.php?id_aluno=" . $row_usuario['id_aluno'] . "'>Editar</a><br>";
                    			echo "<a href='proc_apagar_usuario.php?id_aluno=" . $row_usuario['id_aluno'] . "'>Eliminar</a><br><hr>";
                    		}

                    		//Paginção - Somar a quantidade de usuários
                    		$result_pg = "SELECT COUNT(id_aluno) AS num_result FROM alunos";
                    		$resultado_pg = mysqli_query($conn, $result_pg);
                    		$row_pg = mysqli_fetch_assoc($resultado_pg);
                    		//echo $row_pg['num_result'];
                    		//Quantidade de pagina
                    		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                    		//Limitar os link antes depois
                    		$max_links = 2;
                    		echo "<a href='lista.php?pagina=1'>Primeira</a> ";

                    		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                    			if($pag_ant >= 1){
                    				echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
                    			}
                    		}

                    		echo "$pagina ";

                    		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                    			if($pag_dep <= $quantidade_pg){
                    				echo "<a href='lista.php?pagina=$pag_dep'>$pag_dep</a> ";
                    			}
                    		}

                    		echo "<a href='lista.php?pagina=$quantidade_pg'>Ultima</a>";

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
