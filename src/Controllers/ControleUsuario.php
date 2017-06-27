<?php

namespace NutriSport\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use NutriSport\Entity\Usuario;
use NutriSport\Util\Sessao;
use NutriSport\Models\ModeloUsuario;

class ControleUsuario {

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

    public function exibeLogin() {
        return $this->response->setContent($this->twig->render('Login.html'));
    }
    
    public function cadCliente() {
        
        return $this->response->setContent($this->twig->render('CadastroCliente.html'));
    }
    
    public function Cadastrar() {        
        try {                              
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            if ($nome == '') {
                echo 'O Nome é obrigatório.';
                return;
            }

            if ($cpf == '') {
                echo 'O número do CPF é obrigatório.';
                return;
            }

            if ($cpf < 11) {
                echo 'O número do CPF deve conter 11 digitos.';
                return;
            }

            if ($telefone == '') {
                echo 'O número do telefone é obrigatório.';
                return;
            }

            if ($telefone < 11) {
                echo 'telefone deve conter todos os digitos.';
                return;
            }

            if ($email == '') {
                echo 'O E-mail é obrigatório.';
                return;
            }
            
            if ($login == '') {
                echo 'O Login é obrigatório.';
                return;
            }

            if (strlen($senha) < 8) {
                echo 'A Senha deve conter no mínimo 8 caracteres.';
                return;
            }
                
       
            $usuario = new Usuario();
            $usuario->setNome($nome);
            $usuario->setCpf($cpf);
            $usuario->setTelefone($telefone);
            $usuario->setEmail($email);
            $usuario->setLogin($login);
            $usuario->setSenha($senha);
                                  
            $mod = new ModeloUsuario();
            $deu = $mod->inserirUsuario($usuario);
                         
            if ($deu != 0) {
                echo 'Cliente cadastrado com sucesso.';
            } else {
                echo 'O número do CPF já cadastrado.';
            }
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    
   public function validaLogin() {
        $modelo = new ModeloUsuario();
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $usuario = $modelo->validaLogin($login, $senha);
        if ($usuario) {
            if ($usuario->status == 3) {
                echo'O login falhou tente novamente';
            } else {
                $usuario->senha = "invisível";
                $this->sessao->add("usuario", $usuario);
                if ($this->sessao->get("usuario")->status == 1) {
                    echo '<script>window.location.href = "/indexAdmin"</script>';
 
                } else if ($this->sessao->get("usuario")->status == 2) {
                    echo '<script>window.location.href = "/indexCliente"</script>';
                 
                }
            }
        } else {
            echo 'Falha no login';
        }
    }
    

    public function editarCliente() {
        if ($this->sessao->get("usuario") == "") {
         
            echo '<script>window.location.href = "/editarCliente"</script>';
        } else {
            return $this->response->setContent($this->twig->render('EditarUsuarioCliente.html', array('user' => $this->sessao->get("usuario"))));
        }
    }


    public function excluirCliente() {
        $id = $_POST['id'];
        $modelo = new ModeloUsuario();
        $modelo->excluirCliente($id);
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





    public function redireciona($destino) {
        $redirect = new RedirectResponse($destino);
        $redirect->send();
    }

}
