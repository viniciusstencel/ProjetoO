<?php
    include('../app/Funcoes/Funcoes.php');
    include('../app/includes/conexao.php');
    use App\Funcoes\Funcoes as Funcoes;
    $infoUsr = Funcoes::getInfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário à Esquerda</title>
    <link rel="stylesheet" href="style/styleRelato.css">
</head>
<header>
        <a href="pagina_inicial.php" div class="container-logo">
        <div class="logo-imagem"></div>
        <div class="logo-texto">
            <h1>ProjetoO</h1>
        </div>
        </div><!-- container-logo -->

        <div class="menu">
            <ul>
                <form action="#" method="POST">
                <li><a href="pagina_inicial.php">Início</a></li>
                <li><a href="anuncios.php">Vender</a></li>
                <li><a href="menu.php">Perfil</a></li>
                <li><a href="../app/includes/logout.php">Logout</a></li>
                </form>
            </ul>
        </div><!-- menu -->

</header>

<body>


    <div>
            <body>
                <div class="menu-inicial">
                    <ul>
                        <?php if($infoUsr['nivel'] == 'ADM'){
                            echo'
                            <li><a href="relatorio.php">Relatório Usuarios</a></li>
                            <li><a href="requisicao_anuncio.php">Requisição Anuncios</a></li>
                            <li><a href="../app/includes/todosAnuncios.php">Todos Anuncios</a></li>
                            <li><a href="relatorio_user.php">Configuração da conta</a></li>
                            <li><a href="menu.php">Voltar</a></li>';
                        }else if($infoUsr['nivel'] == 'USER'){
                            echo'
                            <li><a href="relatorio_user.php">Configuração da conta</a></li>
                            <li><a href="menu.php">Voltar</a></li>';
                        }?>
                        </ul>
                </div><!-- menu -->
                <div class="baixo">
                    <h1>Meus Anuncios</h1>

        <table id="tabela">
            <tr>  
                <th scope="col">Titulo Anuncio</th>
                <th scope="col">Descrição</th>
                <th scope="col">Departamento</th>

            </tr>
            <?php
            //consulta SQL na tabela
            $infoUsr = Funcoes::getInfo();

            $id = $infoUsr['id'];
            $query = "SELECT *
              FROM anuncio
              WHERE id_usuario = '$id' AND anuncio_liberado = 'S' ";
            $query .= " ORDER by id;";

            $result = mysqli_query($con, $query);
            
            while ($coluna = mysqli_fetch_array($result)) {
                // exibe os resultados
            
                echo'
                <form action="../app/includes/editar_anuncios.php" method="POST">
                <tr>
                    <th width="30%"> '. $coluna['titulo_anuncio'].' </th>
                    <th width="30%"> '. $coluna['descricao_anuncio'].' </th>
                    <th width="12%"> '. $coluna['departamento'].' </th>
                    <td>
                    <a><button class="button-form borda-inversa" name="excluir" value = "'.$coluna['id'].'">Excluir Anuncio</button></a>
                    <a><button class="button-form borda-inversa" name="modificar" value = "'.$coluna['id'].'">Modificar Anuncio</button></a>
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