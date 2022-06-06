<?php
require_once "funcoes-alunos.php";
$listaDeAlunos = lerAlunos($conexao);

//dump($listaDeProdutos);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<style>
    
</style>

<body>

<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->

<br>
        <table>
            <caption><b>Lista de alunos</b></caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Media</th>
                    <th>Situação</th> <!-- colspan=2 funciona muito parecido com o mesclar do exel,
                     ele ocupa no cabeçalho o campo de duas colunas da tabela -->
                </tr>
            </thead>
            <tbody>
            <?php
    // String com comando AQL
    /* ( foi separado em funções na pasta src) $sql = "SELECT id, nome FROM fabricantes";             

    //preparação do comando
    $consulta = $conexao->prepare($sql);

    //execução do comando
    $consulta->execute();

    //capturar os resultados
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    */

    //echo "<pre>";
    //var_dump($resultado);
    foreach ($listaDeAlunos as $alunos) {
        //echo $fabricante ["nome"];

    /* Exercício:
    Ajuste o foreach para exibir cada dado em seu respectivo lugar,
ou seja,  o valo di id deve aparecer embaixo do cabeçalho nome.
    Tudo isso em cada nova linha gerada peloa foreach */
    ?>
    <tr>
        <div class="dados">
        <td><?=$alunos ["id"] ?></td>
        <td><?=$alunos ["nome"] ?></td>
        <td><?=$alunos ["nota1"] ?></td>
        <td><?=$alunos ["nota2"] ?></td>
        </div>

        <div class="media">
        <td><?=$alunos ["media"] ?></td>
        </div>
        <td><?=$alunos ["situacao"] ?></td>
        <td><a href="atualizar.php?id=<?=$alunos['id']?>">Atualizar</a></td>
        <td><a class="excluir" href="excluir.php?id=<?=$alunos['id']?>" class="excluir">Excluir</a></td>
        
    </tr>
    <?php
}
?>

    <li><a href="visualizar.php"></a></li>

</ul>


<div class="voltar"><p><a href="index.php">Voltar ao início</a></p>
</div>


<script src="confirma.js"></script>

</body>
</html>