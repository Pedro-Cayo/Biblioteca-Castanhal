<?php
    include("conexao.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $query = "DELETE FROM livros WHERE id = $id";
        mysqli_query($conexao, $query); 
    }

    header("Location: exibir_acervo.php");
    exit();
?>
