<?php
include 'conexao.php';
include '..\Modelo\Usuario.php';
include '..\Repositorio\UsuarioRepositorio.php';

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarsenha = $_POST["confirmarsenha"];

    if ($senha === $confirmarsenha) {
        //conexão com o banco de dados;
        
        $usuario = new Usuario(0,
        $nome,
        $email,
        $senha,
        );
        $usuarioRepositorio = new UsuarioRepositorio($conn);
        //cadastrar o usuário
        if ($usuarioRepositorio->cadastrar($usuario)) {
            // Redirecionar para a página de sucesso após o cadastro
            header("Location: ../visao/cadastrar-usuario-sucesso.php");
            exit();
        } else {
            echo "erro! tente novamente!";
        }
    }else{
        header("Location: ..\visao\cadastrar-usuario.php?erro=1");
    } 
}
