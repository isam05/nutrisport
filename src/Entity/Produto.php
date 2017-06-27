<?php
namespace NutriSport\Entity;

class Produto {
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    
    function __construct() {
        
    }

        function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco() {
        return $this->preco;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }
    
}