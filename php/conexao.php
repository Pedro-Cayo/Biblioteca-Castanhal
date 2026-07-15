<?php

//optei por criar a database aqui e rodar um multi_query
//para que quem for testar o codigo nao precise criar a database
//de antemao -JP
$makedb = "
    CREATE DATABASE IF NOT EXISTS biblioteca_cast;
    USE biblioteca_cast;
    CREATE TABLE IF NOT EXISTS livros(
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(250),
        autor VARCHAR(150),
        genero VARCHAR(75),
        editora VARCHAR(50),
        ano_lanc VARCHAR(20),
        n_pag INT
    );
";

//cria uma conexao sem database definida
$servidor = "localhost";
$usuario = "root";
$senha = "";

$conexao = mysqli_connect(
    $servidor,
    $usuario,
    $senha,
    null
);

if(!$conexao) {
    die("erro na conexao");
}


if(!mysqli_multi_query($conexao, $makedb)) {
    die("database nao pode ser criada");
}

//este while e utilizado para limpar "results" que restam em $conexao.
//sem limpar esses results, o proximo comando (select_db) nao roda
while ($conexao->more_results()) {
    $conexao->next_result();
    if ($result = $conexao->store_result()) {
        $result->free();
    }
}

//torna a database "biblioteca_cast" como padrao
if(!mysqli_select_db($conexao, "biblioteca_cast")){
    die("database 'biblioteca_cast' nao pode ser selecionada");
}; 
?>
