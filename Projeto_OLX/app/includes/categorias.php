<?php
    include('../Funcoes/Funcoes.php');
    include('conexao.php');
    use App\Funcoes\Funcoes as Funcoes;
    $infoUsr = Funcoes::getInfo();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['excluir'])){

        $idCategoria = $_POST['excluir'];
        $query = "DELETE FROM categorias WHERE id ='$idCategoria';";
        $result = mysqli_query($con, $query);
        if($result) echo '<script>alert("Categoria Exluida com sucesso!");
                            window.location.href ="categorias.php";</script>';
        else echo'[ERRO] Não foi possivel excluir';

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Categorias</title>
    <link rel="stylesheet" href="../../public/style/styleRelato.css">
</head>
<header>
        <a href="../../public/pagina_inicial.php" div class="container-logo">
        <div class="logo-imagem"></div>
        <div class="logo-texto">
            <h1>ProjetoO</h1>
        </div>
        </div><!-- container-logo -->

        <div class="menu">
            <ul>
                <form action="#" method="POST">
                <li><a href="../../public/pagina_inicial.php">Início</a></li>
                <li><a href="../../public/anuncios.php">Vender</a></li>
                <li><a href="../../public/menu.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
                </form>
            </ul>
        </div><!-- menu -->

</header>

<body>


    <div>
            <body>
                <div class="menu-inicial">
                    <ul>
                        <li>
                            <a href="../../public/relatorio.php">Relatório Usuarios</a></li>
                            <li><a href="../../public/requisicao_anuncio.php">Requisição Anuncios</a></li>
                            <li><a href="todosAnuncios.php">Todos Anuncios</a></li>
                            <li><a href="../../public/relatorio_user.php">Configuração da conta</a></li>
                            <li><a href="../../public/menu.php">Voltar</a></li>
                        </ul>
                </div><!-- menu -->
                <div class="baixo">
                    <h1>Categorias</h1>
                    <form action="cirarCategoria.php" method="POST">
                        <button type="submit" class="button-form borda-inversa" name="criar">Criar Categoria</button>
                    </form>
                </div>    

        <table id="tabela">
            <tr>  
                <th scope="col">Nome Categoria</th>

            </tr>
            <?php
            //consulta SQL na tabela
            $query = "SELECT *
              FROM categorias
              WHERE id > 0 ";
            $query .= " ORDER by id;";

            $result = mysqli_query($con, $query);
            
            while ($coluna = mysqli_fetch_array($result)) {
                // exibe os resultados
            
                echo'
                <form action="#" method="POST">
                <tr>
                    <th width="30%"> '. $coluna['nome'].' </th>
                    <td>
                    <a><button class="button-form borda-inversa" name="excluir" value = "'.$coluna['id'].'">Excluir Categoria</button></a>
                    </td>
                </tr>
            </form>';
        }
            ?>
        </table>
        </div>
            </body>
    </div>

</body>

</html>