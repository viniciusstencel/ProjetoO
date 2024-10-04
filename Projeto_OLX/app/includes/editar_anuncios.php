<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulário à Esquerda</title>
            <link rel="stylesheet" href="../../public/style/styleAnuncio.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        </head>
<?php
    include('conexao.php');

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['excluir'])){
       $idAnuncio = $_POST['excluir'];
       $query_excluir = "DELETE FROM anuncio WHERE id = '$idAnuncio';";
       $result_query = mysqli_query($con, $query_excluir);
       if($result_query)echo '<script>alert("Anuncio Exluido!");
                                window.location.href ="../../public/anuncios_usuario.php";</script>';
       else echo'[ERRO] Não foi possivel excluir.';
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['modificar'])){
        $idAnuncioMod = $_POST['modificar'];
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulário à Esquerda</title>
            <link rel="stylesheet" href="../../public/style/styleM.css">
        </head>

        
        <body>
        
        
            <div class="div">


                    <h1>Atualizar Anuncio</h1>

                    <form action="publicar_anuncio.php" method="POST" enctype="multipart/form-data">

                       
                
                        <label class="label">
                        <input type="text" class="input-bordas" name="titulo" id="titulo" placeholder="Título Novo:" required><br><br>
                        </label>
                
                        <label class="label">
                        <input type="text" class="input-bordas" name="categoria" id="categoria" placeholder="Categoria: " required><br><br>
                        </label>
                
                        <label class="label">
                        <input type="text" class="input-bordas" name="departamento" id="departamento" placeholder="Departamento: " required><br><br>
                        </label>
                        
                        <label class="label">
                        <input type="text" class="input-bordas" name="marca" id="marca" placeholder="Marca: " required><br><br>
                        </label>
                
                        <label class="label">
                        <textarea name="descricao" class="input-bordas" id="descricao" rows="4" cols="50" placeholder="Descição: " required></textarea><br><br>
                        </label>
                        
                
                        <label class="label">
                        <input type="text" class="input-bordas" name="preco" id="preco" placeholder="Preço: " required><br><br>
                        </label>

                        <label class="label">Imagem:
                        <input type="file"  name="imagens" id="imagens" required><br><br>
                        </label>
                
                        <a><button class="button-form borda-inversa" name="atualizar" value = "'.$_POST['modificar'].'">Atualizar Anuncio</button></a>
                        <br>
                        <br>
                        
                    </form>
                <a href="../../public/pagina_inicial.php"><button class="button-form borda-inversa">Voltar</button></a>
            </div>
        </body>
        </html>';
    }

?>    