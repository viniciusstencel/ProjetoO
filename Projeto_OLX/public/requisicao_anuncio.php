<?php
    include('../app/includes/conexao.php');
    include ('../app/Funcoes/Funcoes.php');
    use App\Funcoes\Funcoes as Funcoes;
    $usrInfo = Funcoes::getInfo();

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
                <li><a href="../app/includes/logout.php">logout</a></li>
                </form>
            </ul>
        </div><!-- menu -->

</header>
        <?php
    if($usrInfo['nivel']  == 'ADM') {
        ?>

            <body>
                <div class="menu-inicial">
                    <ul>

                        <li><a href="relatorio.php">Relatório usuarios</a></li>
                        <li><a href="anuncios_usuario.php">Meus Anuncios</a></li>
                        <li><a href="../app/includes/todosAnuncios.php">Todos Anuncios</a></li>
                        <li><a href="relatorio_user.php">Configuração da conta</a></li>
                        <li><a href="menu.php">Voltar</a></li>
                    
                    </ul>
                </div>

                <div class="baixo">
                <h1>Anúncios</h1>
                <table id="tabela">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Foto do Anuncio</th>
                        <th scope="col">Título do Anuncio</th>
                        <th scope="col">Depart.</th>
                        <th scope="col">Categ.</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">ID do Usuario</th>
                        <th scope="col">Situaçao de liberação</th>
                    </tr>
                    <?php
                    //consulta SQL na tabela
                    
                    $query = "SELECT *
                    FROM anuncio
                    WHERE anuncio_liberado = 'N'";
                    $result = mysqli_query($con, $query);
                    
                    while ($coluna = mysqli_fetch_array($result)) {
                        // exibe os resultados
                    
                        echo'<tr>

                            <th width="5%"> '. $coluna['id'].' </th>
                            <th width="30%"> '. $coluna['foto_anuncio'].'  </th>
                            <th width="30%"> '. $coluna['titulo_anuncio'].'  </th>
                            <th width="12%"> '.  $coluna['departamento'] .' </th>
                            <th width="12%"> '. $coluna['categoria'].' </th>
                            <th width="12%"> '. $coluna['marca'].' </th>
                            <th width=30%>  '.$coluna['descricao_anuncio'].' </th>
                            <th width=10%>  '. $coluna['preco'].' </th>
                            <th width=5%> '. $coluna['id_usuario'].' </th>
                            <th width=5%>  '. $coluna['anuncio_liberado'].'</th>
                            <td>
                                <form action="" method="POST">
                                <button class="button-form borda-inversa" name="autorizar" value = "'.$coluna['id'].'">Autorizar</button>
                                </form>
                                
                            </td>
                        </tr>';
                   
                    } 
                    if(@$_REQUEST['autorizar']){
                        $id_anuncio = $_POST['autorizar']; 
                        $autorizar_query = "UPDATE anuncio SET anuncio_liberado = 'S' WHERE id = '$id_anuncio';";
                        $result_query = mysqli_query($con, $autorizar_query);
                        if($result_query) {
                            echo'Autorizado'; 
                            header('Location: requisicao_anuncio.php');
                        }else echo '[ERRO]';
                    }
                    ?>
                </table>
                </div>
            </body>

        <?php
        } else echo "[ERRO] Faça o Login primeiro!";
        ?>
    </div>
</html>
