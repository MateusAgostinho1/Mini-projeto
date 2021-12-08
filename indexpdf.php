<?php

	include_once("conexao.php");
	$html = '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>N°</th>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Curso</th>';
	$html .= '<th>Periodo</th>';
	$html .= '<th>Turma</th>';
	$html .= '<th>Ano</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	$result_usuarios = "SELECT * FROM alunos
INNER JOIN ano ON alunos.ano_id = ano.id_ano
INNER JOIN curso ON alunos.curso_id = curso.id_curso
INNER JOIN periodo ON alunos.periodo_id = periodo.id_periodo
INNER JOIN turma ON alunos.turma_id = turma.id_turma ORDER BY nome";
	$resultado_usuarios = mysqli_query($conn, $result_usuarios);

		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
		$html .= '<tr><td>'.$row_usuario['id_aluno'] . "</td>";
		$html .= '<td>'.$row_usuario['nome'] ."</td>";
		$html .= '<td>'.$row_usuario['curso'] ."</td>";
		$html .= '<td>'.$row_usuario['periodo'] . "</td>";
		$html .= '<td>'.$row_usuario['bloco'] . "</td>";
		$html .= '<td>'.$row_usuario['ano'] . "</td></tr>";
	}

	$html .= '</tbody>';
	$html .= '</table';


	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			<h4 style="text-align: center;">Instituto Superior Politécnico Dom Alexandre Cardeal do Nascimento</h4>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio.pdf",
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
