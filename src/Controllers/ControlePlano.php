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
        if ($this->sessao->get("usuario") == "") {

            echo '<script>window.location.href = "/editarCliente"</script>';
        } else {
            return $this->response->setContent($this->twig->render('EditarUsuarioCliente.html', array('user' => $this->sessao->get("usuario"))));
        }
    }

    public function excluirPlano() {
        $id = $_POST['id'];
        $modelo = new ModeloPlano();
        $modelo->excluirPlano($id);
        $this->sessao->rem("usuario");
        echo '<script>window.location.href = "/"</script>';
    }

    public function alterarCliente() {
        $id = $this->sessao->get("usuario")->idUsuario;
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $modelo = new ModeloUsuario();
        if ($modelo->alterarCliente($id, $nome, $cpf, $telefone, $email)) {
            $this->sessao->rem("usuario");
// adicionar a sessão de novo;
            $u = $modelo->buscaCliente($id);
            $this->sessao->add("usuario", $u);
            echo 'Alterado com sucesso';
        } else {
            echo 'Erro';
        }
    }

}
