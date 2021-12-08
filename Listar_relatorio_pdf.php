
<?php

include_once 'conexao.php';
?>


<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  


    <style>
        body{
            text-align: center;
           
        }
        div.tabela{
            margin-top: 20px;
        }
           
       div.tabela table thead{
           background-color: black;
           padding: 30px;
           color: white;
       }
        div.tabela table{
            width: 100%;
            margin: 0;
            padding: 0;
            font-size:13px ;
            
        }
        div.tabela table td {
            text-align: center;
           border-bottom: solid 1px black;
            border-collapse: collapse;
            padding: 5px;

            
        }
        img{
            width: 110px;
            text-align: center;
            align-items: center;
        }
       

        h2{
            background-color: cornflowerblue;
            margin-top: -20px;
            color: white;
        }
        h1{
            margin-top: -20px;
        }
    </style>
</head>
<body>
    <img src="dompdf/logo.jpg" alt="">
    <h1>ISPCAN</h1>
    <h4>Instituto Superior Politécnico Dom Alexandre Cardeal do Nascimento</h4>
    <h2>Relatório de Estudantes</h2>
    <div class="tabela">

<table>
    <thead>
  <tr>
      <th>Nome Completo</th>
      <th>Curso</th>
      <th>Periodo</th>
      <th>Turma</th>
      <th>Ano</th>
   
    

  </tr>
    </thead>

    <tbody>
        <?php 

          $result_usuarios = "SELECT * FROM alunos
          INNER JOIN ano ON alunos.ano_id = ano.id_ano
          INNER JOIN curso ON alunos.curso_id = curso.id_curso
          INNER JOIN periodo ON alunos.periodo_id = periodo.id_periodo
          INNER JOIN turma ON alunos.turma_id = turma.id_turma ORDER BY nome";
          $resultado_usuarios = mysqli_query($conn, $result_usuarios);

         foreach($resultado_usuarios as $sp):
     ?>
<tr>
     <td><?php echo$sp['nome'] ;?></td>
     <td><?php echo$sp['curso'] ;?></td>
     <td><?php echo$sp['periodo'] ;?></td>
     <td><?php echo$sp['bloco'] ;?></td>
     <td><?php echo$sp['ano'] ;?></td>
   
</tr>
         <?php endforeach;?>
    </tbody>
</table>
    </div>
</body>
</html>