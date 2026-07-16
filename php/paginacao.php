<?php
$busca = isset($_GET['busca']) ? mysqli_real_escape_string($conexao, $_GET['busca']) : '';
// Filtro do SQL
$filtro_sql = "";
if (!empty($busca)) {
    $filtro_sql = " WHERE nome LIKE '%$busca%' OR autor LIKE '%$busca%' OR genero LIKE '%$busca%'";
}
// Paginação de limite 10
$limite = 10;
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_atual < 1) { 
    $pagina_atual = 1; 
}
$offset = ($pagina_atual - 1) * $limite;

// Query que conta o total de livros encontrados
$sql_total = "SELECT COUNT(*) as total FROM livros" . $filtro_sql;
$res_total = mysqli_query($conexao, $sql_total);
$row_total = mysqli_fetch_assoc($res_total);
$total_livros = $row_total['total'];

$total_paginas = ceil($total_livros / $limite);

// Query que busca apenas os 10 livros da página atual
$select_livros = "SELECT * FROM livros" . $filtro_sql . " LIMIT $limite OFFSET $offset";
$resultado = mysqli_query($conexao, $select_livros);
?>