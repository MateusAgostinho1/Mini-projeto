<?php
session_start();
include_once("conexao.php");

$curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO curso (curso) VALUES ('$curso')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Curso cadastrado com sucesso</p>";
	header("Location: lista_curso.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Curso não foi cadastrado com sucesso</p>";
	header("Location:cad_curso.php");
}
