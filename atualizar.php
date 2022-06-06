<?php
require_once 'funcoes-alunos.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$aluno = lerUmAluno($conexao, $id);

if(isset($_POST['atualizar'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    
    $media = ($nota1 + $nota2) / 2;

    if($media >= 7) {
        $situacao = "Aprovado";
    } else {
        $situacao = "reprovado";
    };

    atualizarAluno($conexao, $id, $nome, $nota1, $nota2, $media, $situacao);

    //REDIRECIONAMENTO
    header("location:visualizar.php");
}  

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="#" method="post">
        
	    <p><label for="nome">Nome:</label>
	    <input value="<?=$aluno['nome']?>" type="text" name="nome" id="nome" required></p>
        
        <p><label for="primeira">Primeira nota:</label>
	    <input value="<?=$aluno['nota1']?>"  name="nota1" type="number" id="primeira" step="0.1" min="0.0" max="10" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input value="<?=$aluno['nota2']?>" name="nota2" type="number" id="segunda" step="0.1" min="0.0" max="10" required></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média:</label>
            <input value="<?=$aluno['media']?>" name="media" type="number" id="media" step="0.1" min="0.0" max="10" readonly disabled>
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input value="<?=$aluno['situacao']?>" type="text" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button type="submit" name="atualizar">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>


</body>
</html>