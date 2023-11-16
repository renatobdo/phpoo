<?php
session_start();
require '../visao/menu.php';
require_once "conexao.php";
require '../Repositorio/ProdutoRepositorio.php';
require '../Modelo/Produto.php';
// ...

//$codigo = rand(0, 100000);
$produtosRepositorio = new ProdutoRepositorio($conn);

if (isset($_POST['editar'])){
    $produto = new Produto($_POST['id'], 
    $_POST['tipo'], $_POST['nome'], $_POST['descricao'], $_POST['preco']);

    if (isset($_FILES['imagem'])){
        $produto->setImagem(uniqid() . $_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio());
    }


    $produtosRepositorio->atualizarProduto($produto);
  //  header("Location: ../visao/admin.php?codedit=$codigo");

    echo "<form id='redirectForm' action='../visao/admin.php' method='POST'>";
    echo "<input type='hidden' name='id' value='{$_POST['id']}'>";
    echo "<input type='hidden' name='tipo' value='{$_POST['tipo']}'>";
    echo "<input type='hidden' name='nome' value='{$_POST['nome']}'>";
    echo "<input type='hidden' name='nomeusuario' value='{$_SESSION['nomeusuario']}'>";
    echo "<input type='hidden' name='usuario' value='{$_SESSION['usuario']}'>";
    echo "<input type='hidden' name='descricao' value='{$_POST['descricao']}'>";
    echo "<input type='hidden' name='preco' value='{$_POST['preco']}'>";
    echo "</form>";
    echo "<script>document.getElementById('redirectForm').submit();</script>";



}