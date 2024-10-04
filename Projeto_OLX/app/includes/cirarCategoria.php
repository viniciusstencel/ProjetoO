<?php
    include('../Funcoes/Funcoes.php');
    include('conexao.php');
    use App\Funcoes\Funcoes as Funcoes;
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['criarCategoria'])){
        $nome = $_POST['nome'];
        
        $query = "INSERT INTO categorias (nome) VALUES ('$nome'); ";
        $result = mysqli_query($con, $query);
        if($result){echo '<script>alert("Categoria Cadastrada!");
                    window.location.href ="../../public/menu.php";</script>';}
        else echo'erro';

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Anúncio</title>
    <link rel="stylesheet" href="./style/styleAnuncio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="../../public/style/styleAnuncio.css">
</head>
<body>
   <div class="div">
    <h1>Criar Categoria</h1>
    <form action="#" method="POST">
            
        <label class="label">
        <input type="text" class="input-bordas" name="nome" placeholder="Nome:" required><br><br>
        <button type="submit" class="button-form borda-inversa" name="criarCategoria">Criar</button>
        </label>
    </form>
    <a href="../../public/pagina_inicial.php"><button class="button-form borda-inversa">Voltar</button></a>

</div>
</body>
</html>
