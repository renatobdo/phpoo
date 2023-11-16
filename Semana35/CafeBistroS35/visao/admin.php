<?php
session_start(); 



?>
<!doctype html>



<?php
// Verifica se os dados foram recebidos via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    // Obtém os dados enviados
    $usuario = $_POST['usuario'];
    $nomeusuario = $_POST['nome'];

    // Faz alguma coisa com os dados recebidos, se necessário
    // ...

    // Configura as variáveis de sessão, se necessário
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nomeusuario'] = $nomeusuario;
}else{
  header("Location: login.php");
  exit;
}
require_once 'menu.php';
require "..\controladora\Autenticacao.php";


require_once('../controladora/conexao.php');
require_once('../Modelo/Produto.php');
require_once('../Repositorio/ProdutoRepositorio.php');

$produtoRepositorio = new ProdutoRepositorio($conn);
$produtos = $produtoRepositorio->buscarTodos();


?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="../img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>IFSP - Admin</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <!--<img src="../img/logo-ifsp-removebg.png" class="logo-admin" alt="logo-serenatto"> -->

      <!--<img class= "ornaments" src="../img/ornaments-coffee.png" alt="ornaments">-->
    </section>
    <h2>Lista de Produtos</h2>
    <?php if (isset($_POST['codcad'])){ ?>
        <label for="codigo">Produto cadastrado com sucesso!</label>
        <?php }?>
    <section class="container-table">
      <table>
        <thead>
          <tr>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Descricão</th>
            <th>Valor</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $produto) : ?>
            <tr>
              <td><?= $produto->getNome();  ?></td>
              <td><?= $produto->getTipo();  ?></td>
              <td><?= $produto->getDescricao();  ?></td>
              <td>R$ <?= $produto->getPreco();  ?></td>
              <td>
                <form action="editar-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
                  <input type="hidden" name="tipo" value="<?= $produto->getTipo(); ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                  <input type="submit" class="botao-editar" value="Editar">
                </form>
                
              </td>
              <td>
                <form action="excluir-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nome" value="<?= $_SESSION['nomeusuario']; ?>">
                  <input type="hidden" name="tipo" value="<?= $produto->getTipo(); ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                  <input type="submit" class="botao-excluir" value="Excluir">
                </form>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
      <form action="cadastrar-produto.php" method="POST">
      <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario'];?>">
        <input type="submit" class="botao-cadastrar" name="cadastrar" value="Cadastrar produto">
      </form>
      <form action="#" method="post">
        <input type="submit" class="botao-cadastrar" value="Baixar Relatório" />
      </form>
    </section>
  </main>
</body>

</html>