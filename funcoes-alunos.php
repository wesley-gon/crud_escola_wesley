<?php

require_once "conecta.php";

function lerAlunos(PDO $conexao): array {   
    $sql = "SELECT id, nome, nota1, nota2, media, situacao FROM alunos";             
    
    try{
    $consulta = $conexao->prepare($sql);

    $consulta->execute();

    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
}catch (exception $erro) {
    die("Erro: ".$erro->getMessage());
}
    return $resultado;
}

function lerUmAluno(PDO $conexao, int $id):array {
    $sql = "SELECT id, nome, nota1, nota2, media, situacao FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $erro){
        die("Erro: ". $erro->getMessage());
    }
    return $resultado;
}

function atualizarAluno(PDO $conexao, int $id, string $nome, float $nota1, float $nota2, float $media, string $situacao):void{
    $sql = "UPDATE alunos SET nome = :nome, nota1 = :nota1, nota2 = :nota2, media = :media, situacao = :situacao WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':nota1', $nota1, PDO::PARAM_STR);
        $consulta->bindParam(':nota2', $nota2, PDO::PARAM_STR);
        $consulta->bindParam(':media', $media, PDO::PARAM_STR);
        $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);

        $consulta->execute(); 
    } catch(Exception $erro){
        die("Erro: ". $erro->getMessage());
    }
}

function inserirAlunos(PDO $conexao, string $nome, float $nota1, float $nota2, float $media, string $situacao):void {
    $sql = "INSERT INTO alunos (nome, nota1, nota2, media, situacao) VALUES(:nome, :nota1, :nota2, :media, :situacao)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':nota1', $nota1, PDO::PARAM_INT);
        $consulta->bindParam(':nota2', $nota2, PDO::PARAM_INT);
        $consulta->bindParam(':media', $media, PDO::PARAM_INT);
        $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);

        $consulta->execute(); 
    } catch(Exception $erro){
        die("Erro: ". $erro->getMessage());
    }
}

function excluirAluno(PDO $conexao, int $id):void{
    $sql = "DELETE FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute(); 
    } catch(Exception $erro){
        die("Erro: ". $erro->getMessage());
    }
}