<?php

namespace NutriSport\Models;
use NutriSport\Entity\Plano;
use NutriSport\Util\Conexao;
use PDO;


class ModeloPlano {

    public function __construct() {
        
    }

    public function inserirPlano(Plano $p) {   
        try {
            $sql = "INSERT INTO `plano` (`idPlano`, `tipo`, `descricao`, `duracao`, `preco`, `convenio`, `imagemPlano`) "
                    . "VALUES (NULL, ?, ?, ?, ?, ?, ?)";
          
            $p_sql = Conexao::getInstance()->prepare($sql);
                               
            $p_sql->bindValue(1, $p->getTipo());
            $p_sql->bindValue(2, $p->getDescricao());
            $p_sql->bindValue(3, $p->getDuracao());
            $p_sql->bindValue(4, $p->getPreco());
            $p_sql->bindValue(5, $p->getConvenio());
            $p_sql->bindValue(6, $p->getImagemPlano());
            if ($p_sql->execute()) {
                return Conexao::getInstance()->lastInsertId();
            }
            
            return 0;
            
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $e";
        }
    }
    
   public function buscaPlano($idPlano) {
        try {
            $sql = "SELECT * FROM `plano` WHERE idPlano = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $idPlano);
            $p_sql->execute();
            if ($p_sql->rowCount() == 1) {
                return $p_sql->fetch(PDO::FETCH_OBJ);
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function alterarPlano($idPlano , $tipo, $descricao, $duracao, $preco, $convenio, $imagemPlano) {
        try {
            $sql = "UPDATE plano set plano.tipo = ? , plano.descricao = ? , plano.duracao = ? , plano.preco = ? , plano.convenio = ? ,plano.imagemPlano = ?  WHERE plano.idPlano = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $tipo);
            $p_sql->bindValue(2, $descricao);
            $p_sql->bindValue(3, $duracao);
            $p_sql->bindValue(4, $preco);
            $p_sql->bindValue(5, $convenio);
            $p_sql->bindValue(6, $imagemPlano);
            $p_sql->bindValue(7, $idPlano);
            
            if ($p_sql->execute()) {
                return true;
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     public function excluirPlano($idPlano) {
        try {
            $sql = "DELETE FROM plano WHERE idPlano = :idPlano";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':idPlano', $idPlano);
            if ($p_sql->execute()) {
                return true;
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     public function relatorioPlano() {
        try {
            $sql = "SELECT * FROM plano";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();         
                return $p_sql->fetchAll(PDO::FETCH_OBJ);          
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    }
    


