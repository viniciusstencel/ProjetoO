<?php
    include('../app/Funcoes/Funcoes.php');
    include('../app/includes/conexao.php');
    use App\Funcoes\Funcoes as Funcoes;
    if(!Funcoes::isLogged()) echo '<script>alert("Você precisa fazer login. Por favor, tente novamente!");
                                    window.location.href ="login.php";</script>';

    // Consulta para obter todas as categorias
    $query = "SELECT * FROM categorias WHERE id > 0";
    $result_query = mysqli_query($con, $query);
    
    // Extrair todas as linhas da consulta como um array associativo
    $categorias = mysqli_fetch_all($result_query, MYSQLI_ASSOC);

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
</head>
<body>
   <div class="div">
    <h1>Anunciar Produto</h1>
    <form action="../app/includes/publicar_anuncio.php" method="POST" enctype="multipart/form-data">


        <label class="label">
        <input type="text" class="input-bordas" name="titulo" placeholder="Titulo:" required><br><br>
        </label>

        <label class="label">
        <select class="input-bordas" name="categoria" required>
            <option value="">Selecione uma categoria</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['nome']; ?>"><?php echo $categoria['nome']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        </label>
        
        <label class="label">
        <input type="text" class="input-bordas" name="marca" placeholder="Marca:" required><br><br>
        </label>

        <label class="label">
        <textarea class="input-bordas" name="descricao" rows="4"  placeholder="Descrição:" required></textarea><br><br>
        </label>
        
        <label class="label">
        <input type="text" class="input-bordas" name="preco" id="preco" placeholder="Preço" required><br><br>
        </label>

        <label class="label">Imagem:
        <input type="file" class="name" name="imagens" required><br><br>
        </label>

        <button type="submit" name="anunciar" class="button-form borda-inversa">Anunciar</button>
        <br>
        <br>
    </form>
    <a href="pagina_inicial.php"><button class="button-form borda-inversa">Voltar</button></a>

    <script>
        // Função para formatar o preço enquanto o usuário digita
        document.getElementById('preco').addEventListener('input', function (e) {
            var input = e.target;
            var value = input.value;
            // Remove qualquer formatação existente
            value = value.replace(/\D/g, '');
            // Formata o preço (adiciona separador de milhares e vírgula decimal)
            value = (parseFloat(value) / 100).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+,)/g, '$1.');
            // Atualiza o valor do campo de preço
            input.value = value;
        });
    </script>
</div>
</body>
</html>
