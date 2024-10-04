<?php
include('../app/includes/conexao.php');
include ('../app/Funcoes/Funcoes.php');
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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
                <li><a href="pagina_inicial.php">Início</a></li>
                <li><a href="anuncios.php">Vender</a></li>
                <li><a href="menu.php">Perfil</a></li>
                <li><a href="../app/includes/logout.php">Logout</a></li>
            </ul>
        </div><!-- menu -->

</header>

<body>
    <div class="menu-inicial">
        <ul>
            <?php 
                if($infoUsr['nivel'] == 'ADM'){
                    echo'
                    <li><a href="relatorio.php">Relatório Usuarios</a></li>
                    <li><a href="anuncios_usuario.php">Meus Anuncios</a></li>
                    <li><a href="requisicao_anuncios.php">Requisição Anuncios</a></li>
                    <li><a href="../app/includes/todosAnuncios.php">Todos Anuncios</a></li>
                    <li><a href="menu.php">Voltar</a></li>';
                }else if($infoUsr['nivel'] == 'USER'){
                    echo'            
                    <li><a href="anuncios_usuario.php">Meus Anuncios</a></li>
                    <li><a href="menu.php">Voltar</a></li>';
                }?>
        </ul>
    </div><!-- menu -->
    <html>




    <div class="baixo">
    <h1>Informações da Conta</h1>

    <?php
    //buscar no banco de dados todos os usuários que contenham parte do nome.
     ?>
     <table id="tabela">
            <tr>  
                <th scope="col">Email</th>
                <th scope="col">Nome</th>
                <th scope="col">Senha</th>
                <th scope="col">Contato</th>
            </tr>
            <?php
            //consulta SQL na tabela
            

            $email = $infoUsr['email'];
            $query = "SELECT *
              FROM usuario
              WHERE email = '$email' ";
            $query .= " ORDER by id;";
            $result = mysqli_query($con, $query);
            
            while ($coluna = mysqli_fetch_array($result)) {
                // exibe os resultados
            ?>
                <div class = "dados">
                    <th width="30%"> <?php echo $coluna['email']; ?> </th>
                    <th width="30%"> <?php echo $coluna['nome']; ?> </th>
                    <th width="15%"> ****************************</th>
                    <th width="12%"> <?php echo $coluna['contato']; ?></th>
                    </table>
                    <br>
                        <a href="atualizarUsarios.php?php echo $coluna['id']; ?>"><button class="button-form borda-inversa">Atualizar</button></a>
                </div>
             </div>
    <?php
      }
    ?>
</body>

</html>
</body>