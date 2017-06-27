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
}