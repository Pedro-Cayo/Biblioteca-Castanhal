<?php
include("conexao.php");
include("paginacao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acervo de Livros</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .busca-container { margin: 20px 0; }
        .busca-input { 
            padding: 6px; 
            width: 380px; 
        }
        .busca-btn { padding: 6px 12px; cursor: pointer; }
        .paginacao { margin-top: 20px; display: flex; gap: 5px; }
        .paginacao a { padding: 5px 10px; border: 1px solid #ccc; text-decoration: none; color: #333; }
        .paginacao span { padding: 5px 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; }
    </style>
    </style>
</head>
<body>

    <a href="../index.html">
        <button type="button">Voltar ao Início</button>
    </a>

    <br><br>
    <h2>Lista de Livros:</h2>

    <div class="busca-container">
        <form method="GET" action="exibir_acervo.php">
            <input 
                type="text" 
                name="busca" 
                class="busca-input" 
                placeholder="Buscar por nome, autor ou gênero..." 
                value="<?php echo htmlspecialchars($busca); ?>"
            >
            <button type="submit" class="busca-btn">Pesquisar</button>
            <?php if (!empty($busca)): ?>
                <a href="exibir_acervo.php"><button type="button" class="busca-btn">Limpar</button></a>
            <?php endif; ?>
        </form>
    </div>
    
    <?php if (!empty($busca)): ?>
        <p>Resultados encontrados para: <strong>"<?php echo htmlspecialchars($busca); ?>"</strong> (<?php echo $total_livros; ?> livros)</p>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Autor</th>
                <th>Gênero</th>
                <th>Editora</th>
                <th>Ano Lanç.</th>
                <th>Nº Pág</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
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
                    <a href="excluir_livro.php?id=<?php echo $linha['id']; ?>" onclick="return confirm('Deseja realmente excluir este livro?');">
                        EXCLUIR
                    </a>
                </td>
            </tr>
            <?php
            } 
                } else {
                echo "<tr><td colspan='9' style='text-align:center;'>Nenhum livro encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php if ($total_paginas > 1): ?>
        <div class="paginacao">
            <?php 
            for ($i = 1; $i <= $total_paginas; $i++) {
                $url_params = "pagina=" . $i;
                if (!empty($busca)) {
                    $url_params .= "&busca=" . urlencode($busca);
                }

                if ($i === $pagina_atual) {
                    echo "<span>$i</span>";
                } else {
                    echo "<a href='exibir_acervo.php?$url_params'>$i</a>";
                }
            }
            ?>
        </div>
    <?php endif; ?>
    <br>
</body>
</html>