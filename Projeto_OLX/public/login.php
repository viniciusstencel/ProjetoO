<?php
    
    include '../app/Funcoes/Funcoes.php';
    use App\Funcoes\Funcoes as Funcoes;
    
    include '../app/includes/conexao.php';
    

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['botao'])){
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
    
        $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'; ";

        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0){
            if($result){
                $tabelaData = array();
                while($row = mysqli_fetch_assoc($result)){
                    $tabelaData = $row; 
                }
                $nome = $tabelaData['nome'];
                $id = $tabelaData['id'];
                $nivel = $tabelaData['nivel'];
                $contato = $tabelaData['contato'];
                Funcoes::login($email, $nome, $id, $nivel, $senha, $contato);
                header('Location: pagina_inicial.php');
            }
            
        }else {
            echo '<script>alert("[ERRO] Usuario ou senha incorretos!");
            window.location.href ="login.php";</script>';
        }   
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleLR.css">
    <title>Login</title>
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
            </ul>
        </div><!-- menu -->
    </header>

    <section>
        <form action=# method='post'>
            <h2>Login</h2>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" name='email' required>
                <label for="">Email</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="senha" required>
                <label for="">Insira a Senha</label>
            </div>
            <div class="forget">


            </div>
            <input type="submit" value="Entrar" name="botao">
            <div class="register">
                <p>Não possuo uma conta <a href="registrar.php">Registrar-se</a></p>
            </div>
        </form>
    </section>
 
    
</body>

</html>