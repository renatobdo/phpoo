<?php
require ("Pessoa.php");
require ("Retangulo.php");
class Fruta{
    // atributos
    private $nome;
    public $cor;

    //Métodos
    function __construct($nome, $cor)
    {
        $this->nome = $nome;
        $this->cor = $cor;
    }

    function set_name($nome){
        $this->nome = $nome;        
    }
    function get_name(){
        return $this->nome;
    }
    function set_cor($cor){
        $this->cor = $cor;
    }
    function get_cor(){
        return $this->cor;
    }
}
//criando um objeto
$maca = new Fruta("maca_ifsp_turmaB","vermelha");
$banana = new Fruta("banana_ifsp_turmaB","amarela");

/*$maca->set_name("maca_ifsp_turmaB");
$banana->set_name("banana_ifsp_turmaB");
*/

//echo $maca->nome;
echo $maca->get_name();
echo "<br>".$banana->get_name();

$aluno1 = new Pessoa("Renato",18,"Professor");
$aluno2 = new Pessoa("Rafael",18,"Bombeiro");

echo $aluno1->apresentar();
echo $aluno2->apresentar();

$retangulo = new Retangulo(2, 4);
echo "<br>Área do retângulo = ".$retangulo->calcular_area();
echo "<br>Perímetro = ".$retangulo->calcular_perimetro();

?>