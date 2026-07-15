<?php
    include("conexao.php");

    //puxa os livros que serao exibidos
    // atraves do id
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $query = "SELECT * FROM livros WHERE id = $id";
        $resultado = mysqli_query($conexao, $query);
        $livro = mysqli_fetch_assoc($resultado);
    }else{
        die("ID nao informado.");
    }
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>editar livro</title>
    </head>
    <body>
        <h2>editar livro</h2>
        <form action= "atualizar_livro.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $livro["id"]; ?>">

            Nome: <br>
            <input
                type="text"
                name="nome"
                //a funcao echo entra aqui pra exibir
                // as informacoes do livro em seus
                // respectivos campos
                value="<?php echo $livro["nome"]; ?>"
                required
            >
            <br><br>
            Autor: <br>
            <input
                type="text"
                name="autor"
                value="<?php echo $livro["autor"]; ?>"
                required
            >
            <br><br>
            Genero: <br>
            <input
                type="text"
                name="genero"
                value="<?php echo $livro["genero"]; ?>"
                required
            >
            <br><br>
            Editora: <br>
            <input
                type="text"
                name="editora"
                value="<?php echo $livro["editora"]; ?>"
                required
            >
            <br><br>
            Ano de lancamento: <br>
            <input
                type="text"
                name="ano_lanc"
                value="<?php echo $livro["ano_lanc"]; ?>"
                required
            >
            <br><br>
            Numero de paginas: <br>
            <input
                type="number"
                name="n_pag"
                value="<?php echo $livro["n_pag"]; ?>"
                required
            >
            <br><br>
            <input type="submit" value="Atualizar">
        </form>
        <br><br>
        <a href="exibir_acervo.php">Cancelar</a>
    </body>
</html>
