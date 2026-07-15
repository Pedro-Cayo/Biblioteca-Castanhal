<?php
    include("conexao.php");

//esse e o codigo responsavel por atualizar
// as informacoes do livro na database
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];
    $editora = $_POST["editora"];
    $ano_lanc = $_POST["ano_lanc"];
    $n_pag = $_POST["n_pag"];

    $query = "
        UPDATE livros
        SET nome='$nome',
            autor='$autor',
            genero='$genero',
            editora='$editora',
            ano_lanc= '$ano_lanc',
            n_pag='$n_pag'
        WHERE id=$id
    ";

    if (mysqli_query($conexao, $query)){
        header("location: exibir_acervo.php");
        exit();
    }else{
        echo "Erro ao atualizar livro.";        
    }
?>
