<?php



namespace NutriSport\Entity;

/**
 * Description of Modalidade
 *
 * @author isabela
 */
class Modalidade {
    private  $idModalidade;
    private  $categoria;
    private  $descricao;
    private  $preco;
    private  $vagas;
    private  $imagemMod;

    function __construct(){
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco() {
        return $this->preco;
    }

    function getVagas() {
        return $this->vagas;
    }

    function getImagemMod() {
        return $this->imagemMod;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setVagas($vagas) {
        $this->vagas = $vagas;
    }

    function setImagemMod($imagemMod) {
        $this->imagemMod = $imagemMod;
    }
    
}