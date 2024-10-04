<?php
include '../app/includes/conexao.php';

$query = "SELECT * FROM anuncio WHERE id > 0;";
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