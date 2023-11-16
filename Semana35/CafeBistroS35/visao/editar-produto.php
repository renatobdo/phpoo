<?php

session_start();
 ?>

<!doctype html>

<?php
// Verifica se os dados foram recebidos via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtém os dados enviados
  $usuario = $_POST['usuario'];
  $nomeusuario = $_POST['nomeusuario'];

  // Faz alguma coisa com os dados recebidos, se necessário
  // ...

  // Configura as variáveis de sessão, se necessário
  $_SESSION['usuario'] = $usuario;
  $_SESSION['nomeusuario'] = $nomeusuario;

} else {
  header("Location: login.php");
  exit;
}
include 'menu.php';
include '..\controladora\conexao.php';
include '..\Modelo\Produto.php';
include '..\Repositorio\ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($conn);


if ($_POST['tipo'] == 'Almoço'){
  $produto = $produtosRepositorio->listarAlmocoPorId($_POST['id']);
}else{
  $produto = $produtosRepositorio->listarCafePorId($_POST['id']);
}




?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="../img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>IFSP - Editar Produto</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <!-- <img src="../img/logo-ifsp-removebg.png" class="logo-admin" alt="logo-serenatto"> -->
      <h1>Editar Produto</h1>
      <img class="ornaments" src="../img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
      <form method="POST" action="../controladora/processar-editar-produto.php" id="editarForm" enctype="multipart/form-data">

        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?= $produto->getNome(); ?>" required>

        <div class="container-radio">
          <div>
            <label for="cafe">Café</label>
            <input type="radio" id="cafe" name="tipo" value="Café" <?php if ($produto->getTipo() == "Café") { ?>checked><?php } else { ?> > <?php } ?>
          </div>
          <div>
            <label for="almoco">Almoço</label>
            <input type="radio" id="almoco" name="tipo" value="Almoço" <?php if ($produto->getTipo() == "Almoço") { ?>checked><?php } else { ?> > <?php } ?>
          </div>
        </div>

        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" value="<?= $produto->getDescricao(); ?>" required>

        <label for="preco">Preço</label>
        <input type="text" id="preco" name="preco" value="<?= $produto->getPreco(); ?>" required>

        <?php $imagemfake = $produto->getImagem();


        // Remove a parte "C:\fakepath\" do valor (apenas no caso de navegadores baseados em Windows)
        $imagem = basename($imagemfake);

        // Agora, $imagem conterá apenas o nome do arquivo, sem a parte "C:\fakepath\"
        ?>
        <label for="imagem">Envie uma nova imagem do produto ou mantenha a imagem atual:
          <div class="container-foto">
            <img src="<?= $produto->getImagem(); ?>" alt="<?php echo $imagem; ?>" width="200">
          </div><?php echo $imagem; ?>
        </label>
        <input type="file" name="imagem" accept="image/*" id="imagem" value="<?php echo $imagem; ?>">
        <input type='hidden' name='nome' value=<?php echo $_SESSION['nomeusuario'];?>>
        <input type='hidden' name='usuario' value=<?php echo $_SESSION['usuario'];?>>
        <input type="hidden" name="id" id="id" value="<?= $produto->getId(); ?>">
        <input type="submit" name="editar" class="botao-cadastrar" value="Editar produto" />
      </form>

    </section>
  </main>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/index.js"></script>
</body>

</html>