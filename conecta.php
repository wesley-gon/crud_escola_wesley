<?php /* SCRIPT DE CONEXÃO AO SERVIDOR DE BANCO DE DADOS */
$servidor = "localhost";
$usuario = "------------";
$senha = "------------------";
$banco = "-------------";


try {
    // Criando a conexão com o MySQL (API/friver de conexão)
    $conexao = new PDO("mysql:host=$servidor; dbname=$banco; charset=utf8", $usuario, $senha);

    // Habilita  averifcação de erros
$conexao->setAttribute(PDO::ATTR_ERRMODE, /* CONSTANTE DE ERROS EM GERAL */ PDO::ERRMODE_EXCEPTION /* CONSTANTE DE EXCEÇÕES DE ERRO*/);

} catch (Exception $erro){
    die("Erro: ".$erro->getMessage());
}
//var_dump($conexao);  //teste