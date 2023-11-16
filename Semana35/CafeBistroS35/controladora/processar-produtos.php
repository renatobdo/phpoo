<?php
session_start();
require "conexao.php";
require "..\Modelo\Produto.php";
require "..\Repositorio\ProdutoRepositorio.php";

//if (isset($_POST['cadastro'])){ ou
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $imagem = $_FILES['imagem']['name'];
    
    
    
    $produto = new Produto( NULL,
        $tipo,
        $nome,
        $descricao,$preco,$imagem
        );

    $produtoRepositorio = new ProdutoRepositorio($conn);
    if (isset($_FILES['imagem'])){
        $produto->setImagem(uniqid() . $_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio());
    }
    $sucess = $produtoRepositorio->cadastrar($produto);
    if ($sucess){
        $codcad = rand(0, 1000000);
        echo "<form id='redirectForm' action='../visao/admin.php' method='POST'>";
        echo "<input type='hidden' name='codigo' value={'$codcad'}>";

        echo "<input type='hidden' name='nome' value=".$_SESSION['nomeusuario'].">";
        echo "<input type='hidden' name='usuario' value=".$_SESSION['usuario'].">";
       
        echo "</form>";
        echo "<script>document.getElementById('redirectForm').submit();</script>";


       // header("Location: ../visao/admin.php?codcad=$codigo");
      //  exit();
    }else{
        echo "erro ao cadastrar produto";
    }
    
}









?>