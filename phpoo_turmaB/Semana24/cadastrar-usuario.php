<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>IFSP - Cadastrar Usuário</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
        <h1>Cadastro de Usuários</h1>
        <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form method="post">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>
            
            <label for="email">e-mail</label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite uma senha" required>
           
            <input type="submit" name="cadastro" class="botao-cadastrar" value="Cadastrar usuario"/>
        </form>

    </section>
</main>
</body>
</html>
<?php
include 'conexao.php';
include 'Usuario.php';

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
//conexão com o banco de dados;
    $usuario = new Usuario($conn);
//cadastrar o usuário
    if ($usuario->cadastrar($nome,$email,$senha)){
    // Redirecionar para a página de sucesso após o cadastro
        header("Location: cadastrar-usuario-sucesso.php");
        exit();
    }else{
        echo "erro! tente novamente!";
    }
}
?>
