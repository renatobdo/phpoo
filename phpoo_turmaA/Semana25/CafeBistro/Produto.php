<?php
class Produto {
    private $conn; // Sua conexão com o banco de dados
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function listarProdutos() {
        $sql = "SELECT * FROM cafe";
        $result = $this->conn->query($sql);
        
        $produtos = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produtos[] = $row;
            }
        }
        
        return $produtos;
    }
}
?>