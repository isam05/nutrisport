<?php

namespace NutriSport\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use NutriSport\Entity\Plano;
use NutriSport\Models\ModeloPlano;

class ControlePlano {

    private $response;
    private $request;
    private $twig;
    private $sessao;

    function __construct(Response $response, Request $request, \Twig_Environment $twig, $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    public function plano() {
        return $this->response->setContent($this->twig->render('Plano.html'));
    }

    public function cadPlano() {
        return $this->response->setContent($this->twig->render('CadastroPlano.html'));
    }

    public function CadastrarPlano() {
        try {
            $tipo = $_POST['tipo'];
            $descricao = $_POST['descricao'];
            $duracao = $_POST['duracao'];
            $preco = $_POST['preco'];
            $convenio = $_POST['convenio'];
            $imagemPlano = $_POST['imagemPlano'];

            if ($tipo == '') {
                echo 'O Tipo é obrigatório.';
                return;
            }

            if ($descricao == '') {
                echo 'A Descrição é obrigatório.';
                return;
            }

            if ($duracao == '') {
                echo 'A Duração é obrigatório.';
                return;
            }



            if ($preco == '') {
                echo 'O Preço é obrigatório.';
                return;
            }

            if ($convenio == '') {
                echo 'O Convenio é obrigatório.';
                return;
            }

            if ($imagemPlano == '') {
                echo 'A imagem do Plano é obrigatório.';
                return;
            }






            $plano = new Plano();
            $plano->setTipo($tipo);
            $plano->setDescricao($descricao);
            $plano->setDuracao($duracao);
            $plano->setPreco($preco);
            $plano->setConvenio($convenio);
            $plano->setImagemPlano($imagemPlano);



            $mod = new ModeloPlano();
            $deu = $mod->inserirPlano($plano);

            if ($deu != 0) {
                echo 'Plano cadastrado com sucesso.';
            } else {
                echo 'Plano já foi cadastrado.';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function editarPlano() {
       

        return $this->response->setContent($this->twig->render('EditarPlano.html', array('plano' => $this->sessao->get("plano"))));
        
    }
    
    public function buscarPlano() {
        $idPlano = $_POST['idPlano'];
        $modelo = new ModeloPlano();
        $p = $modelo->buscaPlano($idPlano);
        if ($p) {
            echo $p->tipo . "#" . $p->descricao . "#" . $p->duracao . "#" . $p->preco . "#" . $p->convenio . "#" . $p->imagemPlano;
        } else {
            echo 'Error';
        }
        echo 'erro';
    }

    public function alterarPlano() {
        
        $idPlano = $_POST['idPlano'];
        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];
        $duracao = $_POST['duracao'];
        $preco = $_POST['preco'];
        $convenio = $_POST['convenio'];
        $imagemPlano = $_POST['imagemPlano'];
        
        $modelo = new ModeloPlano();
        if ($modelo->alterarPlano($idPlano, $tipo, $descricao,$duracao, $preco, $convenio, $imagemPlano)) {
            echo '<script>window.location.href = "/editarPlano"</script>';
        } else {
            echo 'Erro';
        }
    }

    public function excluirPlano() {
        $idPlano = $_POST['idPlano'];
        $modelo = new ModeloPlano();
        $modelo->excluirPlano($idPlano);
        echo '<script>window.location.href = "/indexAdmin"</script>';
    }

   public function relatorioPlano() {
        $modelo = new ModeloPlano();
        $p = $modelo->relatorioPlano();
        return $this->response->setContent($this->twig->render('RelatorioPlano.html', array('plano' => $p))); 
    }
}


