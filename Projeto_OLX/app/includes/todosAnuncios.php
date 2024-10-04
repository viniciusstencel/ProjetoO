<?php
include('conexao.php');
include('../funcoes/funcoes.php');
use App\Funcoes\Funcoes as Funcoes;
$infoUsr = Funcoes::getInfo();
if($infoUsr['nivel'] !== 'ADM') echo '<script>alert("Você não tem permissão!");
                                    window.location.href ="../../public/pagina_inicial.php";</script>';
                                   
                                   
                                   
                                   
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário à Esquerda</title>
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
                <li><a href="logout.php">logout</a></li>
                </form>
            </ul>
        </div><!-- menu -->

</header>
<body>
                <div class="menu-inicial">
                    <ul>
                        <li><a href="../../public/relatorio.php">Relatório usuarios</a></li>
                        <li><a href="../../public/anuncios_usuario.php">Meus Anuncios</a></li>
                        <li><a href="../../public/requisicao_anuncio.php">Requisição Anuncios</a></li>
                        <li><a href="../../public/relatorio_user.php">Configuração da conta</a></li>
                        <li><a href="../../public/menu.php">Voltar</a></li>

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
                    </tr>'; 
                    $query = "SELECT * FROM anuncio WHERE anuncio_liberado = 'S'";
                    $result = mysqli_query($con, $query);
                    while ($coluna = mysqli_fetch_array($result)){
                        //exibe os resultados
                        echo'<tr>

                                <th width="5%"> '. $coluna['id'].' </th>
                                <th width="20%"> '. $coluna['foto_anuncio'].'  </th>
                                <th width="20%"> '. $coluna['titulo_anuncio'].'  </th>
                                <th width="8%"> '.  $coluna['departamento'] .' </th>
                                <th width="8%"> '. $coluna['categoria'].' </th>
                                <th width="8%"> '. $coluna['marca'].' </th>
                                <th width=30%>  '.$coluna['descricao_anuncio'].' </th>
                                <th width=10%>  '. $coluna['preco'].' </th>
                                <th width=5%> '. $coluna['id_usuario'].' </th>
                                <th width=5%>  '. $coluna['anuncio_liberado'].'</th>
                                <td>
                                    <form action="editar_anuncios.php" method="POST">
                                    <button class="button-form borda-inversa" name="excluir" value = "'.$coluna['id'].'">Excluir</button>
                                    <button class="button-form borda-inversa" name="modificar" value = "'.$coluna['id'].'">Modificar Anuncio</button>
                                    </form>
                                    
                                </td>
                        </tr>';
                    }


?>