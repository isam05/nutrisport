<?php

namespace NutriSport\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use NutriSport\Entity\Produto;
use NutriSport\Util\Sessao;
use NutriSport\Models\ModeloProduto;

class ControleProduto {

    private $response;
    private $request;
    private $twig;
    private $sessao;

    function __construct(Response $response, Request $request, \Twig_Environment $twig, Sessao $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
        
    }

    
    public function cadProduto() {
        
        return $this->response->setContent($this->twig->render('CadastroProduto.html'));
    }
    
    public function CadastrarProduto() {        
        try {                              
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            

            if ($nome == '') {
                echo 'O Nome é obrigatório.';
                return;
            }

            if ($descricao == '') {
                echo 'O número do CPF é obrigatório.';
                return;
            }


            if ($preco == '') {
                echo 'O número do telefone é obrigatório.';
                return;
            }

            
                
       
            $produto = new Produto();
            $produto->setNome($nome);
            $produto->setDescricao($descricao);
            $produto->setPreco($preco);
            
                                  
            $mod = new ModeloProduto();
            $deu = $mod->inserirProduto($produto);
                         
            if ($deu != 0) {
                echo 'Produto cadastrado com sucesso.';
            } else {
                echo 'O número do CPF já cadastrado.';
            }
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}