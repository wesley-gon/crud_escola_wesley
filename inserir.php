
<?php 
require_once 'funcoes-alunos.php';
$listaDeAluno = lerAlunos($conexao);


// senha do banco J1}%*)^3hDxDNI}>



if(isset($_POST['inserir'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        //CHAMADO DA FUNÇÃO E PASSANDO OS DADOS DE CONEXÃO E O NOME DIGITADO
        
		$media = ($nota1 + $nota2) / 2;

		if($media >= 7) {
			$situacao = "Aprovado";
		} else {
			$situacao = "reprovador";
		};

		inserirAlunos($conexao, $nome, $nota1, $nota2, $media, $situacao);

        //REDIRECIONAMENTO
        header("location:visualizar.php");
    }
	
	
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
	    <p><label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome" required></p>
        
      <p><label for="primeira">Primeira nota:</label>
	    <input type="number" name="nota1" id="primeira" step="0.1" min="0.0" max="10" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input type="number" name="nota2" id="segunda" step="0.1" min="0.0" max="10" required></p>
	    
		<button type="submit" name="inserir" >Cadastrar Aluno</button>
	</form>

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>