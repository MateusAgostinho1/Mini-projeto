<?php
session_start();

//Criar a conexao

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$curso_id = filter_input(INPUT_POST, 'curso_id', FILTER_SANITIZE_STRING);
$ano_id = filter_input(INPUT_POST, 'ano_id', FILTER_SANITIZE_STRING);
$turma_id = filter_input(INPUT_POST, 'turma_id', FILTER_SANITIZE_STRING);
$periodo_id = filter_input(INPUT_POST, 'periodo_id', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO alunos (nome, curso_id, ano_id, turma_id, periodo_id, criado) VALUES ('$nome', '$curso_id', '$ano_id', '$turma_id', '$periodo_id', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Estudante cadastrado com sucesso</p>";
	header("Location: lista.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Estudante não foi cadastrado com sucesso</p>";
	header("Location: cad_usuario.php");
}
