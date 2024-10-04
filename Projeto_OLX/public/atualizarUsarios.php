<?php
    include('../app/includes/conexao.php');
    include ('../app/Funcoes/Funcoes.php');
    use App\Funcoes\Funcoes as Funcoes;
    $infoUsr = Funcoes::getInfo();
              


                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['botaoAtualizarUser'])) {

                    $id = $infoUsr['id'];
                    $email = $_POST['email'];
                    $nome = $_POST['nome'];
                    $contato = $_POST['contato'];
                    $senha = md5($_POST['senha']);


                    $query_atualiza = "UPDATE usuario SET email='$email',
                            senha='$senha', contato='$contato', nome='$nome', nivel='USER' WHERE id='$id' ";

                   // echo $query;

                    $result_atualiza = mysqli_query($con, $query_atualiza);

                    if ($result_atualiza) echo '<script>alert("Usuário atualizado com sucesso! ");window.location.href ="./pagina_inicial.php";</script>';
                    else echo '<script>alert("Erro ao atualizar usuário! ");window.location.href ="./pagina_inicial.php";</script>';
                }

                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['botaoAtualizar'])) {
                    //atualiza os dados no SQL
                    if ($infoUsr['nivel'] == 'ADM') {
                        $id = $_POST['id'];
                        $email = $_POST['email'];
                        $senha = md5($_POST['senha']);
                        $contato = $_POST['contato'];
                        $nome = $_POST['nome'];
                        $nivel = $_POST['nivel'];

                        $query_atualiza = "UPDATE usuario SET email='$email',
                            senha='$senha',contato='$contato',nome='$nome', nivel='$nivel' WHERE id='$id' ";

                        
                        $result_atualiza = mysqli_query($con, $query_atualiza);
                        
                        if ($result_atualiza) echo '<script>alert("Usuario atualizado com sucesso!");window.location.href ="relatorio.php";</script>';
                        else echo '<script>alert("[ERRO] Não foi possivel atualizar usuario.");window.location.href ="relatorio.php";</script>';

                    } else echo '<script>alert("Você não tem permissão!");window.location.href ="pagina_inicial.php";</script>'; //alerta caso o login não esteja conectado

                } elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['botaoExcluir'])) {
                    if ($infoUsr['nivel'] == 'ADM') {
                        $id = $_POST['id'];
                        //deleta os dados do usuario
                        $query_excluir = "DELETE FROM usuario WHERE id = '$id' ";

                        $result_excluir = mysqli_query($con, $query_excluir);
                        if ($result_excluir) echo '<script>alert("Excluido com Sucesso!");window.location.href ="relatorio.php";</script>';
                        else echo '<script>alert("Erro ao Excluir usuario.");window.location.href ="relatorio.php";</script>';
                    }
                }


                ?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização Usuarios</title>
    <link rel="stylesheet" href="style/styleAnuncio.css">
</head>

<body>

    <div>
        <?php       
        if ($infoUsr['nivel'] == 'USER') {
        ?>

            <body>

                <div class="div">
                <h1>Atualizar Cadastro</h1>
                    <form id='' action="" method="POST" enctype="multipart/form-data">

                        <label class="label">

                        <input type="text" class="input-bordas" id="email" name="email" 
                        
                        placeholder="Novo Email: " value="<?php echo $infoUsr['email']?>" required><br><br>

                        </label>
                        <label class="label">

                        <input type="text" class="input-bordas" id="contato" name="contato" 
                        placeholder="Novo Contato: "value="<?php echo $infoUsr['contato']?>" required><br><br>

                        </label>

                        <label class="label">

                        <input type="text" class="input-bordas" id="nome" name="nome" placeholder="Novo Nome: "value="<?php echo $infoUsr['nome']?>" required><br><br>

                        </label>

                        <label class="label">

                        <input type="password" class="input-bordas" id="senha" name="senha" placeholder="Nova Senha: "required><br><br>

                        </label>

                        <button type="submit" name="botaoAtualizarUser" class="button-form borda-inversa">Atualizar</button>
                        <br>
                        <br>

                    </form>
                    <a href="menu.php"><button class="button-form borda-inversa">Voltar</button></a>

                </div>
 








            <?php
        } elseif ($infoUsr['nivel'] == 'ADM') {
            $id = $_POST['atualizar'];
            $query = "SELECT * FROM usuario WHERE id='$id'";
            $result_query = mysqli_query($con, $query);
            $tabelaData = array();
            while($row=mysqli_fetch_array($result_query)){
                $tabelaData = $row;
            }
            ?>

                <body>
        </body>


        <div class="div">
                <h1>Atualizar Usuário</h1>
                <form id='form-atualizar' action="#" method="POST">

                    <label class="label">
                    <input type="text" id="id" class="input-bordas" name="id" placeholder="ID do Usuário:"  value="<?php echo $tabelaData['id']?>" required><br><br>
                    </label>

                    <label class="label">
                    <input type="text" id="email" class="input-bordas" name="email" placeholder="Novo Email: "  value="<?php echo $tabelaData['email']?>" required><br><br>
                    </label>

                    <label class="label">
                    <input type="text" id="senha" class="input-bordas" name="senha" placeholder="Nova Senha: " required><br><br>
                    </label>
                    
                    <label class="label">
                    <input type="text" id="contato" class="input-bordas" name="contato" placeholder="Novo Contato: "  value="<?php echo $tabelaData['contato']?>" required><br><br>
                    </label>

                    <label class="label">
                    <input type="text" id="nome" class="input-bordas" name="nome" placeholder="Novo Nome:"  value="<?php echo $tabelaData['nome']?>" required><br><br>
                    </label>


                    <label for="nivel">
                    <input type="text" id="nivel" class="input-bordas" name="nivel" placeholder="Novo Nível: "  value="<?php echo $tabelaData['nivel']?>" required><br><br>
                    </label>

                        <button type="submit" name="botaoAtualizar" class="button-form borda-inversa">Atualizar</button>
                        <br>
                        <br>
                        <input type="submit" name="botaoExcluir" class="button-form borda-inversa" value="Excluir"></input>
                </form>
                <br>
                <br>
                <a href="relatorio.php"><button class="button-form borda-inversa">Voltar</button></a>


                </div>
            </body>
        <?php
        } else echo "[ERRO] Faça o Login primeiro!";
        ?>
    </div>

</body>

</html>