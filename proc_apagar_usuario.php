<?php
session_start();
include_once("conexao.php");
$id_aluno = filter_input(INPUT_GET, 'id_aluno', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id_aluno)){
	$result_usuario = "DELETE FROM alunos WHERE id_aluno='$id_aluno'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Estudante apagado com sucesso</p>";
		header("Location: lista.php");
	}else{

		$_SESSION['msg'] = "<p style='color:red;'>Erro o estudante não foi apagado com sucesso</p>";
		header("Location: lista.php");
	}
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um estudante</p>";
	header("Location: lista.php");
}
