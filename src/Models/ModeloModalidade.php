<?php

namespace NutriSport\Models;
use NutriSport\Entity\Modalidade;
use NutriSport\Util\Conexao;
use PDO;


class ModeloModalidade {

    function __construct() {
        
    }

    public function inserirModalidade(Modalidade $m) {   
        try {
            $sql = "INSERT INTO `modalidade` (`idModalidade`, `categoria`, `descricao`, `preco`, `vagas`, `imagemMod`) "
                    . "VALUES (NULL, ?, ?, ?, ?, ?)";
          
            $p_sql = Conexao::getInstance()->prepare($sql);             
            $p_sql->bindValue(1, $m->getCategoria());
            $p_sql->bindValue(2, $m->getDescricao());
            $p_sql->bindValue(3, $m->getPreco());
            $p_sql->bindValue(4, $m->getVagas());
            $p_sql->bindValue(5, $m->getImagemMod());
           

            if ($p_sql->execute()) {
                return Conexao::getInstance()->lastInsertId();
            }
            return 0;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $e";
        }
    }
    
    
    
    
public function buscaModalidade($idModalidade) {
        try {
            $sql = "SELECT * FROM `modalidade` WHERE idModalidade = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $idModalidade);
            $p_sql->execute();
            if ($p_sql->rowCount() == 1) {
                return $p_sql->fetch(PDO::FETCH_OBJ);
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function alterarModalidade($idModalidade , $categoria, $descricao, $preco, $vagas, $imagemMod) {
        try {
            $sql = "UPDATE modalidade set modalidade.categoria = ? , modalidade.descricao = ? , modalidade.preco = ? , modalidade.vagas = ? ,modalidade.imagemMod = ?  WHERE modalidade.idModalidade = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $categoria);
            $p_sql->bindValue(2, $descricao);
            $p_sql->bindValue(3, $preco);
            $p_sql->bindValue(4, $vagas);
            $p_sql->bindValue(5, $imagemMod);
            $p_sql->bindValue(6, $idModalidade);
            
            if ($p_sql->execute()) {
                return true;
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     public function excluirModalidade($idModalidade) {
        try {
            $sql = "DELETE FROM modalidade WHERE idModalidade = :idModalidade";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':idModalidade', $idModalidade);
            if ($p_sql->execute()) {
                return true;
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     public function relatorioModalidade() {
        try {
            $sql = "SELECT * FROM modalidade";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();         
                return $p_sql->fetchAll(PDO::FETCH_OBJ);          
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    }
    


