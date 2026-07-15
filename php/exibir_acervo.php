<?php
include("conexao.php");
$select_livros = "SELECT * FROM livros";
$resultado = mysqli_query($conexao, $select_livros)
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>acervo</title>
    </head>
<!--
uso o "../index.html" pro php aqui entender
que o arquivo index.html esta no diretorio acima dele
-->
    <a href="../index.html">
        <button type="button">Voltar ao Início</button>
    </a>
    <body>
        <h2>Lista de Livros:</h2>
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Autor</th>
                <th>Genero</th>
                <th>Editora</th>
                <th>Ano Lanc.</th>
                <th>n. pag</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php
                while($linha = mysqli_fetch_assoc($resultado)){
            ?>

            <tr>
                <td><?php echo $linha["id"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["autor"]; ?></td>
                <td><?php echo $linha["genero"]; ?></td>
                <td><?php echo $linha["editora"]; ?></td>
                <td><?php echo $linha["ano_lanc"]; ?></td>
                <td><?php echo $linha["n_pag"]; ?></td>
                <td>
                    <a href="editar_livro.php?id=<?php echo $linha['id']; ?>">
                        EDITAR
                    </a>
                </td>
                <td>
                    <a href="excluir_livro.php?id=<?php echo $linha['id']; ?>"
                    onclick="return confirm('Tem certeza que deseja excluir este livro?');"> <!--Função para confirmar antes de excluir-->
                        EXCLUIR
                    </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
        <br>
    </body>
</html>
