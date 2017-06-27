<?php


namespace NutriSport\Entity;

/**
 * Description of Modalidade
 *
 * @author isabela
 */
class Plano {
    private  $tipo;
    private  $descricao;
    private  $duracao;
    private  $preco;
    private  $convenio;
    private  $imagemPlano;

     function __construct(){
    
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDuracao() {
        return $this->duracao;
    }

    function getPreco() {
        return $this->preco;
    }

    function getConvenio() {
        return $this->convenio;
    }

    function getImagemPlano() {
        return $this->imagemPlano;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setConvenio($convenio) {
        $this->convenio = $convenio;
    }

    function setImagemPlano($imagemPlano) {
        $this->imagemPlano = $imagemPlano;
    }
    
    
}