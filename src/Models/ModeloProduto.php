<?php

namespace NutriSport\Models;
use NutriSport\Entity\Produto;
use NutriSport\Util\Conexao;
use PDO;


class ModeloProduto {

    public function __construct() {
        
    }

    public function inserirProduto(Produto $u) {   
        try {
            $sql = "INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`)"
                    . "VALUES (NULL, ?, ?, ?)";
          
            $p_sql = Conexao::getInstance()->prepare($sql);
                               
            $p_sql->bindValue(1, $u->getNome());
            $p_sql->bindValue(2, $u->getDescricao());
            $p_sql->bindValue(3, $u->getPreco());
           

            if ($p_sql->execute()) {
                return Conexao::getInstance()->lastInsertId();
            }
            
            return 0;
            
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $e";
        }
    }

}