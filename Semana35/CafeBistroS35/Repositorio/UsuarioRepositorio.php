<?php
class UsuarioRepositorio
{
    private $conn; // Sua conexão com o banco de dados
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    function cadastrar(Usuario $usuario) {
        $senhaHash = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES 
            (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $usuario->getNome(), $usuario->getEmail(), $senhaHash);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    





    public function listarCafes()
    {
        $sql = "SELECT * FROM produtos where tipo = 'Café' ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['id'],
                    $row['tipo'],
                    $row['nome'],
                    $row['descricao'],
                    $row['imagem'],
                    $row['preco']
                );
                $produtos[] = $produto;
            }
        }

        return $produtos;
    }
    
}
