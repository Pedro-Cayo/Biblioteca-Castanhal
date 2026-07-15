<?php
include("conexao.php");

$nome = $_POST["nomeLivro"];
$autor = $_POST["nomeAutor"];
$genero = $_POST["generoLivro"];
$editora = $_POST["editoraLivro"];
$ano_lanc = $_POST["anoLivro"]; 
$n_pag = $_POST["pagLivro"];

$sql = "
    INSERT INTO livros(nome, autor, genero, editora
    , ano_lanc, n_pag)
    VALUES ('$nome', '$autor', '$genero', '$editora',
    '$ano_lanc', '$n_pag')
";

if (mysqli_query($conexao, $sql)){
    echo "Livro cadastrado com sucesso";
    header("location: ../index.html");
} else {
    echo "Erro ao cadastrar";
}

?>
