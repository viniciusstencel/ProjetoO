<?php
    include('../app/includes/conexao.php');
    include('../app/Funcoes/Funcoes.php');
    use App\Funcoes\Funcoes as Funcoes;
    $usrInfo = Funcoes::getInfo();
    if($usrInfo['nivel'] !== 'ADM'){
        header('Location: pagina_inicial.php');
    }
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
            <li><a href="anuncios_usuario.php">Meus Anuncios</a></li>
            <li><a href="requisicao_anuncio.php">Requisição anuncios</a></li>
            <li><a href="../app/includes/todosAnuncios.php">Todos Anuncios</a></li>
            <li><a href="relatorio_user.php">Configuração da conta</a></li>
            <li><a href="menu.php">Voltar</a></li>
        </ul>
    </div><!-- menu -->
    <html>


 <div class="baixo">
    <h1>Procure pelo Nome</h1>
    <div className="container">
        <form action=# method=POST>
            <br>
            <input type=text name=user>
            <br>
            <br>
            <input type="submit" name=botao class="button-form borda-inversa" value= "Procurar">
            <br>
        </form>
    </div>
    <?php if (@$_REQUEST['botao'])
    //buscar no banco de dados todos os usuários que contenham parte do nome.
    { ?>
        <table id="tabela">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
                <th scope="col">Nome</th>
                <th scope="col">Senha</th>
                <th scope="col">Contato</th>
                <th scope="col">Nivel</th>
                <th scope="col">Edição</th>
            </tr>
            <?php
            //consulta SQL na tabela
            $email = $_POST['user'];
            $query = "SELECT *
              FROM usuario
              WHERE id > 0 ";
            $query .= ($email ? " AND email LIKE '%$email%'" : "");
            $query .= " ORDER by id";
            $result = mysqli_query($con, $query);
            while ($coluna = mysqli_fetch_array($result)) {
                // exibe os resultados
            ?>
                <tr>

                    <th width="5%"> <?php echo $coluna['id']; ?> </th>
                    <th width="30%"> <?php echo $coluna['email']; ?> </th>
                    <th width="30%"> <?php echo $coluna['nome']; ?> </th>
                    <th width="15%"> ****************************</th>
                    <th width="12%"> <?php echo $coluna['contato']; ?></th>
                    <th width=12%> <?php echo $coluna['nivel']; ?></th>
                    <td>
                        <form action="atualizarUsarios.php" method="POST">
                        <button class="button-form borda-inversa" value="<?php echo $coluna['id']?>"name="atualizar">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        </div>
    <?php
    }
    ?>
</body>

</html>
</body>