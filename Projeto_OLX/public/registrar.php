<?php
            include '../app/includes/conexao.php';       
        
    
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['botao'])){
                
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $contato = $_POST['contato'];
            $nome = $_POST['nome'];

            $verifica = "SELECT * FROM usuario WHERE email = '$email';";           
            $result = mysqli_query($con, $verifica);
          
            
            if($result){
                $tabelaData = array();
                while($row = mysqli_fetch_assoc($result)){
                    $tabelaData = $row; 
                }
                
            }
            if($tabelaData['email'] !== $email){
                
                $query = "INSERT INTO usuario (email, senha, contato, nome, nivel) VALUES ('$email','$senha','$contato','$nome', 'USER');";
                $result = mysqli_query($con, $query);
                echo '<script>alert("Cadastro feito com Sucesso!"); window.location.href = "login.php";</script>';
            }else echo '<script>alert("Erro ao fazer Cadastro (E-mail já cadastrado). Por favor, tente novamente!"); window.location.href ="registrar.php"</script>';
           

        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style/styleLR.css">
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
            </ul>
        </div><!-- menu -->

    </header>
    <section>
        <form action='' method ="POST">
            <h1>Registro</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name='email' required>
                <label for="">E-mail</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="senha" required>
                <label for="">Insira a Senha</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="text" name="contato" required>
                <label for="">Insira seu contato</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="text" name="nome" required>
                <label for="">Insira seu Nome</label>
            </div>

            <input type="submit" value="Registrar-se" name="botao">
            <div class="register">
                <p>Já possuo uma conta <a href="login.php">Entrar</a></p>
            </div>
        </form>
    </section>

</body>
</html>