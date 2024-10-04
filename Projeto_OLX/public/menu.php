<?php
    include('../app/Funcoes/Funcoes.php');
    use App\Funcoes\Funcoes as Funcoes;
    $infoUsr = Funcoes::getInfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário à Esquerda</title>
    <link rel="stylesheet" href="./style/styleRelato.css">
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
        <?php
        
        
        if ($infoUsr['nivel'] == 'USER') {
        ?>
            <body>


                <div class="menu-inicial">
                    <ul>

                        <li><a href="relatorio_user.php">Configuração da conta</a></li>
                        <li><a href="anuncios_usuario.php">Meus Anuncios</a></li>
                    </ul>
                </div>




                <div class="bem-vindo">
                    <h1><?php echo 'Bem-vindo '. $infoUsr['nome'];?></h1>
                </div>
            </body>
        <?php
        } elseif ($infoUsr['nivel']  == 'ADM') {
        ?>

            <body>
                <div class="menu-inicial">
                    <ul>
                        
                        <li><a href="relatorio.php">Relatório usuarios</a></li>
                        <li><a href="anuncios_usuario.php">Meus Anuncios</a></li>
                        <li><a href="requisicao_anuncio.php">Requisição anuncios</a></li>
                        <li><a href="../app/includes/todosAnuncios.php">Todos os Anuncios</a></li>
                        <li><a href="../app/includes/categorias.php">Gerenciar Categorias</a></li>
                        <li><a href="relatorio_user.php">Configuração da conta</a></li>

                    </ul>
                </div>
                <div class="bem-vindo">
                    <h1><?php echo 'Bem-vindo '. $infoUsr['nome'];?></h1>
                </div>
            </body>

        <?php
        } else echo "[ERRO] Faça o Login primeiro!";
        ?>
    </div>

</body>

</html>