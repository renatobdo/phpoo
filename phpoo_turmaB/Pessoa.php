<?php
class Pessoa{
    //atributos da classe Pessoa
    public $nome;
    public $idade;
    public $profissao;

    //métodos da classe
    function __construct($nome,$idade,$profissao){
        $this->nome = $nome;
        $this->idade = $idade;
        $this->profissao = $profissao;
    }
    function get_nome(){
        return $this->nome; 
    }
    function get_profissao(){
        return $this->profissao;
    }
    function get_idade(){
        return $this->idade;
    }
    function apresentar(){
        return "<br>Olá, meu nome é ".$this->get_nome()." , 
            tenho ". $this->get_idade()." 
            anos e sou ". $this->get_profissao();
    }
}

?>