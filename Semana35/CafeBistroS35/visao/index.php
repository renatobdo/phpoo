<?php
session_start(); 

require_once 'menu.php';
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

include '..\controladora\conexao.php';
include '..\Modelo\Produto.php';
include '..\Repositorio\ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($conn);
$cafes = $produtosRepositorio->listarCafes();
$almocos = $produtosRepositorio->listarAlmocos();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>IFSP - Cardápio</title>
</head>
<body>
    <main>
    
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="../img/logo-ifsp-removebg.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
        <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="../img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
        <?php 
               
               
                foreach ($cafes as $cafe):?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $cafe->getImagemDiretorio() ?>">
                        </div>
                        <p><?= $cafe->getNome() ?></p>
                        <p><?= $cafe->getDescricao() ?></p>
                        <p><?= "R$ ".number_format($cafe->getPreco(), 2) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="../img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
            <?php 
               
               
               foreach ($almocos as $almoco):?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?= $almoco->getImagemDiretorio() ?>">
                    </div>
                    <p><?= $almoco->getNome() ?></p>
                    <p><?= $almoco->getDescricao() ?></p>
                    <p><?= "R$ ".number_format($almoco->getPreco(), 2) ?></p>
                </div>
                <?php endforeach; ?>
            </div>

        </section>
    </main>
</body>
</html>