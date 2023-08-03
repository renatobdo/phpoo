<?php
require ("Carro.php");
require ("Retangulo.php");
//nome da classe
class Fruta{
    //nome dos atributos
    private $nome;
    public $cor;

    /*Métodos */

    function __construct($nome, $cor)
    {
        $this->nome = $nome;
        $this->cor = $cor;
    }
    function set_name($nome){
        $this->nome = $nome;
    }
    function set_cor($cor){
        $this->cor = $cor;
    }
    //  
    function get_name(){
        return $this->nome;
    }
    function get_cor(){
        return $this->cor;
    }

}
//A palavra new cria um objeto do tipo Fruta
$maca = new Fruta("maca_ifsp","vermelho");
/* Atribuindo um nome para o meu objeto 
através do métodos set_name */
//$maca->set_name("maca_ifsp");
// o comando abaixo imprime se a atributo for public
//echo $maca->nome;
/* o comando abaixo imprime se o atributo 
for public ou private */
echo "</br>".$maca->get_name();
//$maca->set_cor("vermelho");
echo "</br>".$maca->get_cor();

$carro = new Carro("Hyndai","hb20","2015");
echo "</br>".$carro->get_marca();
echo "</br>".$carro->get_modelo();
echo "</br>".$carro->get_ano();

$retangulo_ifsp = new Retangulo(2,4);
echo "</br>".$retangulo_ifsp->calcular_area();
echo "</br>".$retangulo_ifsp->calcular_perimetro();





?>