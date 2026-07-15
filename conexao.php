<?php
/* a porta está "localhost:3307" devido à existencia de outra conexão do mysql utilizando a porta 3306 em nossos computadores */
$servidor = "localhost:3307";
$usuario = "root";
$senha = "";
$banco = "biblioteca_cast";

$conexao = mysqli_connect(
    $servidor,
    $usuario,
    $senha,
    $banco
);

if(!$conexao) {
    die("erro na conexao");
}

echo "conectado";
?>
