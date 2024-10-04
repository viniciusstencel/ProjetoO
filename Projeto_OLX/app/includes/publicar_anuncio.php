<?php 
    include('../Funcoes/Funcoes.php');
    include('conexao.php');
    use App\Funcoes\Funcoes as Funcoes;

    if(!Funcoes::isLogged()){
        echo '<script>alert("Você precisa fazer login. Por favor, tente novamente!");window.location.href ="../../public/login.php";</script>';
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['anunciar'])){

        $imagem = $_FILES['imagens'];
        
        
        move_uploaded_file($imagem['tmp_name'], '../imgs/anuncios/' . $imagem['name']);

        $endereco_imagem = '../imgs/anuncios/' . $imagem['name'];

        $titulo = $_POST['titulo'];
        $categora = $_POST['categoria'];
        $departamento = $_POST['departamento'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];
        $preco = $_POST['preco'];
        $id = Funcoes::getInfo();
        $idUsr = $id['id'];
        

        $query = "INSERT INTO anuncio (foto_anuncio, categoria, marca, departamento, descricao_anuncio, preco, id_usuario, anuncio_liberado, titulo_anuncio) 
        VALUES ('$endereco_imagem', '$categoria', '$marca', '$departamento', '$descricao', '$preco', '$idUsr', 'N', '$titulo');";
        echo $query;
        
        $result_anuncio = mysqli_query($con, $query);
        if($result_anuncio) echo '<script>alert("Anuncio em análise! Em breve será publicado");window.location.href ="../../public/anuncios.php";</script>';
        else echo 'Erro ao anunciar!';

    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])){
        $imagem = $_FILES['imagens'];
        $idAnuncio = $_POST['atualizar']; 
        echo $idAnuncio;
        
        move_uploaded_file($imagem['tmp_name'], '../imgs/anuncios/' . $imagem['name']);

        $endereco_imagem = '../imgs/anuncios/' . $imagem['name'];

        $titulo = $_POST['titulo'];
        $departamento = $_POST['departamento'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];
        $preco = $_POST['preco'];
        $id = Funcoes::getInfo();
        $idUsr = $id['id'];
        

        $query = "UPDATE anuncio SET foto_anuncio ='$endereco_imagem', categoria = '$categoria', marca ='$marca', departamento ='$departamento', descricao_anuncio ='$descricao', preco ='$preco', id_usuario ='$idUsr',
         anuncio_liberado = 'N', titulo_anuncio ='$titulo' WHERE id = '$idAnuncio';";
         echo $query;
        
        $result_anuncio = mysqli_query($con, $query);
        if($result_anuncio) echo '<script>alert("Atualização do Anuncio em análise! Em breve será publicado");window.location.href ="../../public/anuncios_usuario.php";</script>';
        else echo 'Erro ao anunciar!';
    }

    
    ?>