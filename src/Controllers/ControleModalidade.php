<?php

namespace NutriSport\Controllers;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use NutriSport\Entity\Modalidade;
use NutriSport\Models\ModeloModalidade;


class ControleModalidade {
    
    private $response;
    private $request;
    private $twig;
    private $sessao;

    function __construct(Response $response, Request $request, \Twig_Environment $twig,$sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    public function modalidade() {
        return $this->response->setContent($this->twig->render('Modalidade.html'));
    } 
    
    public function cadModalidade() {
        return $this->response->setContent($this->twig->render('CadastroModalidade.html'));
    } 
    
    public function CadastrarModalidade() {        
        try {                              
         
            $categoria = $_POST['categoria'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $vagas= $_POST['vagas'];
            $imagemMod = $_POST['imagemMod'];
            

           

            if ($categoria == '') {
                echo 'A Categoria é obrigatório.';
                return;
            }

            if ($descricao == '') {
                echo 'A Descrição é obrigatório.';
                return;
            }

            if ($preco == '') {
                echo 'O Preço é obrigatório.';
                return;
            }
            
            if ($vagas == '') {
                echo 'O número de vagas disponíveis é obrigatório.';
                return;
            }
            
            if ($imagemMod == '') {
                echo 'A Imagem é obrigatório.';
                return;
            }

       
                
       
            $modalidade = new Modalidade();
            $modalidade->setCategoria($categoria);
            $modalidade->setDescricao($descricao);
            $modalidade->setPreco($preco);
            $modalidade->setVagas($vagas);
            $modalidade->setImagemMod($imagemMod);
                                  
            $mod = new ModeloModalidade();
            $deu = $mod->inserirModalidade($modalidade);
                         
            if ($deu != 0) {
                echo 'Modalidade cadastrada com sucesso.';
            } else {
                echo 'Modalidade já foi cadastrada.';
            }
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    
    public function editarModalidade() {
        return $this->response->setContent($this->twig->render('EditarModalidade.html'));
    }

    public function buscarModalidade() {
        $idModalidade = $_POST['idModalidade'];
        $modelo = new ModeloModalidade();
        $m = $modelo->buscaModalidade($idModalidade);
        if ($m) {
            echo $m->categoria . "#" . $m->descricao . "#" . $m->preco . "#" . $m->vagas . "#" . $m->imagemMod;
        } else {
            echo 'Error';
        }
        echo 'erro';
    }

    public function alterarModalidade() {
        
        $idModalidade = $_POST['idModalidade'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $vagas = $_POST['vagas'];
        $imagemMod = $_POST['imagemMod'];
        
        $modelo = new ModeloModalidade();
        if ($modelo->alterarModalidade($idModalidade, $categoria, $descricao, $preco, $vagas, $imagemMod)) {
            echo '<script>window.location.href = "/editarModalidade"</script>';
        } else {
            echo 'Erro';
        }
    }

    public function excluirModalidade() {
        $idModalidade = $_POST['idModalidade'];
        $modelo = new ModeloModalidade();
        $modelo->excluirModalidade($idModalidade);
        echo '<script>window.location.href = "/"</script>';
    }
    
    public function relatorioModalidade() {
        $modelo = new ModeloModalidade();
        $m = $modelo->relatorioModalidade();
        return $this->response->setContent($this->twig->render('RelatorioModalidade.html', array('mod' => $m))); 
    }
}


