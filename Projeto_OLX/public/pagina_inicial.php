
<?php
    include'../app/Funcoes/Funcoes.php';
    use App\Funcoes\Funcoes as Funcoes;
    
    include '../app/includes/geraAnuncio.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style/styleTeste.css">

    <title>Projeto OLX</title>
</head>

<body>

<header>
        <a href="pagina_inicial.php" div class="container-logo">
        <div class="container-logo">
            <div class="logo-imagem"></div>
            <div class="logo-texto">
                <h1>ProjetoO</h1>
            </div>
        </div><!-- container-logo -->

        <div class="menu">
            <ul>
                
                    <li><a href="pagina_inicial.php">Início</a></li>
                    <li><a href="anuncios.php">Vender</a></li>
                    <?php if(Funcoes::isLogged()){
                    
                    echo'<li><a href="menu.php">Perfil</a></li>';
                    echo'<li><a href="../app/includes/logout.php">Logout</a></li>';

                    if(isset($_POST['logout'])) Funcoes::logout();
                    
                 }else echo'<li><a href="login.php">Login</a></li>';
                ?>
                
                    </ul>
        </div>

    </header>

        <form class="pesquisa" action="" method="GET">

        <input id="inputBusca" id="barra-pesquisa" onkeyup="filtrar()" type="text" name="pesquisar" placeholder="O que você procura?">


        <? if(isset($_GET['pesquisar'])) $pesquisa = $_GET['pesquisar'];?>


        </form>
        <ul id="listaProdutos">
            <li>
               <a href="#">
               <img width="50" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAb8phYo4tJt0YdcqOrrcvWTCfTcTXPeUpZeAHk2iWAQ&s">
               <span class="item-name">Título do Produto</span>
            </a>
            </li>
            <li>
                <a href="#">
                    <img width="50"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAb8phYo4tJt0YdcqOrrcvWTCfTcTXPeUpZeAHk2iWAQ&s">
                    <span class="item-name">Título do Produto</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img width="50"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAb8phYo4tJt0YdcqOrrcvWTCfTcTXPeUpZeAHk2iWAQ&s">
                    <span class="item-name">Título do Produto</span>
                </a>
            </li>
        </ul>
       <script src="../app/Funcoes/filtrar.js"></script>
       <?php
        $valor_pesquisa = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';

        $valor_pesquisa_formatado = ucwords(strtolower($valor_pesquisa));


        $params = array(
            'pesquisa' => $valor_pesquisa,
        );
        $query_string = http_build_query($params);
        $url = 'pagina_inicial.php?' . $query_string;

        if($url != 'pagina_inicial.php?pesquisa=') {
            include '../app/includes/pesquisarProdutos.php';
        }
        $num_rows = count($tableData);

        $repetir = range(1, $num_rows);

        if (is_array($tableData) && !empty($tableData)) {
            foreach ($tableData as $dados) {
                if($dados['anuncio_liberado'] == 'S'){
                    echo '<div class="card" >'; 
                    echo '<img src="' . $dados['foto_anuncio'] . '" class="card-img-top" alt="..">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $dados['titulo_anuncio'] . '</h5>';
                    echo '<p class="card-text">R$' . $dados['preco'] . '</p>';
                    echo '<form action="" method="GET">'; 
                    echo '<button name="verAnuncio" class="button-form borda-inversa" value="'. $dados['id'].'">Ver Anuncio'; 
                    echo'</form>';
                    echo '</div>';
                    echo '</div>';
                }

            }

        } else {
            echo "Sem resultados para essa consulta!";
        }
    ?>

      
  
</body>

</html>