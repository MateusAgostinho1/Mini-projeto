<?php
session_start();

//Criar a conexao

include_once("conexao.php");

$nome_prof = filter_input(INPUT_POST, 'nome_prof', FILTER_SANITIZE_STRING);
$id_prof_curso = filter_input(INPUT_POST, 'id_prof_curso', FILTER_SANITIZE_STRING);
$id_prof_ano = filter_input(INPUT_POST, 'id_prof_ano', FILTER_SANITIZE_STRING);
$disciplina = filter_input(INPUT_POST, 'disciplina', FILTER_SANITIZE_STRING);



//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO professor (nome_prof, id_prof_curso, id_prof_ano, disciplina) VALUES ('$nome_prof', '$id_prof_curso', '$id_prof_ano', '$disciplina', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Professor cadastrado com sucesso</p>";
	header("Location: lista_professor.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Professor não foi cadastrado com sucesso</p>";
	header("Location: cad_professor.php");
}
