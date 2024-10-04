<?php
    include('../app/includes/conexao.php');
    include('../app/funcoes/funcoes.php');
    use App\Funcoes\Funcoes as Funcoes;
    $infoUsr = Funcoes::getInfo();
    
    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['verAnuncio'])){
        $idAnuncio = $_GET['verAnuncio'];
        
        $query = "SELECT * FROM anuncio WHERE id='$idAnuncio';";
        
        $result = mysqli_query($con, $query);
        $dadosAnuncio = mysqli_fetch_array($result);

        $fkUsrId = $dadosAnuncio['id_usuario'];

        $query_usuario = "SELECT * FROM usuario WHERE id='$fkUsrId'";
        $result_usr = mysqli_query($con, $query_usuario);
        $dadosAnuncioUsr = mysqli_fetch_array($result_usr);

        if($result){
            if(Funcoes::isLogged()){

                echo '
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
                <body>
                        <div name"fotoAnuncio">
                            <img src="'. $dadosAnuncio['foto_anuncio'] .'">
                        </div>
                        <div name="dadosAnuncio">
                            <h1>'. $dadosAnuncio['titulo_anuncio'] .'</h1>
                            <p>'. $dadosAnuncio['descricao_anuncio'] .'</p>
                            <p>'. $dadosAnuncio['marca'] .'</p>
                            <p> Contato: '. $dadosAnuncioUsr['contato'] .'<br>
                            E-Mail: '. $dadosAnuncioUsr['email'] .'</p>
                            <p></p>
                        </div>
                </body>    
                ';

            }else{
                echo '
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
                                <li><a href="login.php">login</a></li>
                                </form>
                            </ul>
                        </div><!-- menu -->
                
                </header>
                <body>
                        <div name"fotoAnuncio">
                            <img src="'. $dadosAnuncio['foto_anuncio'] .'">
                        </div>
                        <div name="dadosAnuncio">
                            <h1>'. $dadosAnuncio['titulo_anuncio'] .'</h1>
                            <p>'. $dadosAnuncio['descricao_anuncio'] .'</p>
                            <p>'. $dadosAnuncio['marca'] .'</p>
                            <p> Contato: '. $dadosAnuncioUsr['contato'] .'<br>
                            E-Mail '. $dadosAnuncioUsr['email'] .'</p>
                            <p></p>
                        </div>
                </body>    
                ';
            }

        }




    }else echo '[ERRO]';
?>