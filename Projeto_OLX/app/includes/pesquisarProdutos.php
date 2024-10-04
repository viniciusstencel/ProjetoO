<?php

include 'conexao.php';


    $colunas = ['foto_anuncio', 'departamento', 'categoria', 'marca', 'descricao_anuncio', 'preco', 'titulo_anuncio']; 


$pesquisa = $valor_pesquisa_formatado;

$condicoes = '';

foreach ($colunas as $coluna) {
    $condicoes .= "$coluna LIKE '$pesquisa' OR ";
}
$condicoes = rtrim($condicoes, ' OR ');

$query = "SELECT * FROM anuncio WHERE $condicoes;";

    $result = mysqli_query($con, $query);

    if ($result) {
        $tableData = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $tableData[] = $row;
        }
        
    } else {
        echo "Sem resultados para essa consulta! ";
    }
?>