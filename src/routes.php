<?php

namespace NutriSport\Routes;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;



$rotas = new RouteCollection();





$rotas->add('index', new Route('/', array('_controller' =>'NutriSport\Controllers\ControleIndex','_method'=> 'index')));
$rotas->add('categoria', new Route('/Modalidade', array('_controller' => 'NutriSport\Controllers\ControleModalidade','_method' => 'modalidade')));
$rotas->add('plano', new Route('/Plano', array('_controller' => 'NutriSport\Controllers\ControlePlano','_method' => 'plano')));
$rotas->add('empresa', new Route('/Empresa', array('_controller' => 'NutriSport\Controllers\ControleEmpresa','_method' => 'empresa')));
$rotas->add('contato', new Route('/Contato', array('_controller' => 'NutriSport\Controllers\ControleContato','_method' => 'contato')));

$rotas->add('indexAdmin', new Route('/indexAdmin', array('_controller' =>'NutriSport\Controllers\ControleIndex','_method'=> 'indexAdmin')));
$rotas->add('cadMod', new Route('/CadastroModalidade', array('_controller' => 'NutriSport\Controllers\ControleModalidade','_method' => 'cadModalidade')));
$rotas->add('ajaxCadModalidade', new Route('/ajaxCadModalidade', array('_controller' =>'NutriSport\Controllers\ControleModalidade','_method'=> 'CadastrarModalidade')));
$rotas->add('editarModalidade', new Route('/editarModalidade', array('_controller' =>'NutriSport\Controllers\ControleModalidade','_method' => 'editarModalidade')));
$rotas->add('buscarModalidade', new Route('/buscarModalidade', array('_controller' =>'NutriSport\Controllers\ControleModalidade','_method' => 'buscarModalidade')));
$rotas->add('alterarModalidade', new Route('/ajaxAlterarMod', array('_controller' =>'NutriSport\Controllers\ControleModalidade','_method' => 'alterarModalidade')));
$rotas->add('excluirModalidade', new Route('/ajaxExcluirMod', array('_controller' =>'NutriSport\Controllers\ControleModalidade','_method' => 'excluirModalidade')));
$rotas->add('relatorio', new Route('/relatorioModalidade', array('_controller' =>'NutriSport\Controllers\ControleModalidade','_method' => 'relatorioModalidade')));
$rotas->add('cadPlano', new Route('/CadastroPlano', array('_controller' => 'NutriSport\Controllers\ControlePlano','_method' => 'cadPlano')));
$rotas->add('ajaxCadPlano', new Route('/ajaxCadPlano', array('_controller' =>'NutriSport\Controllers\ControlePlano','_method'=> 'CadastrarPlano')));
$rotas->add('editarPlano', new Route('/editarPlano', array('_controller' =>'NutriSport\Controllers\ControlePlano','_method' => 'editarPlano')));
$rotas->add('buscarPlano', new Route('/buscarPlano', array('_controller' =>'NutriSport\Controllers\ControlePlano','_method' => 'buscaPlano')));
$rotas->add('alterarPlano', new Route('/alterarPlano', array('_controller' =>'NutriSport\Controllers\ControlePlano','_method' => 'alterarPlano')));
$rotas->add('excluirPlano', new Route('/excluirPlano', array('_controller' =>'NutriSport\Controllers\ControlePlano','_method' => 'excluirPlano')));
$rotas->add('relatorio', new Route('/relatorioPlano', array('_controller' =>'NutriSport\Controllers\ControlePlano','_method' => 'relatorioPlano')));



$rotas->add('indexCliente', new Route('/indexCliente', array('_controller' =>'NutriSport\Controllers\ControleIndex','_method'=> 'indexCliente')));
$rotas->add('cadcliente', new Route('/CadastroCliente', array('_controller' => 'NutriSport\Controllers\ControleUsuario','_method' => 'cadCliente')));
$rotas->add('ajaxCadCliente', new Route('/ajaxCadCliente', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method'=> 'Cadastrar')));
$rotas->add('editarCliente', new Route('/editarCliente', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'editarCliente')));
$rotas->add('alterarCliente', new Route('/ajaxAlterarCliente', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'alterarCliente')));
$rotas->add('excluirCliente', new Route('/ajaxExcluirCliente', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'excluirCliente')));


$rotas->add('login', new Route('/Login', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'exibeLogin')));
$rotas->add('validaLogin', new Route('/validaLogin', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'validaLogin')));
$rotas->add('sairLogin', new Route('/sairLogin', array('_controller' =>'NutriSport\Controllers\ControleIndex','_method' => 'sair')));



//$rotas->add('editarUserAdmin', new Route('/editarUserAdmin', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'editarUserAdmin')));
//$rotas->add('buscarUserAdmin', new Route('/buscarUserAdmin', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'buscarUserAdmin')));
//$rotas->add('alterarUserAdmin', new Route('/ajaxAlterarAdmin', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'alterarUserAdmin')));
//$rotas->add('excluirUserAdmin', new Route('/ajaxExcluirAdmin', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'excluirUserAdmin')));
////$rotas->add('relatorio', new Route('/relatorio', array('_controller' =>'NutriSport\Controllers\ControleUsuario','_method' => 'relatorioDeClientesAjax')));
//$rotas->add('produto', new Route('/produto/{_param}', array('_controller' => 'NutriSport\Controllers\ControleProduto', '_method' => 'show')));
//$rotas->add('formulario', new Route('/formulario', array('_controller' =>'NutriSport\Controllers\ControleProduto','_method' => 'formulario')));
//$rotas->add('salvarImagem', new Route('/setImagem', array('_controller' =>'NutriSport\Controllers\ControleProduto','_method' => 'setImagem')));
//$rotas->add('exibeImagem', new Route('/imagem/{_param}', array('_controller' =>'NutriSport\Controllers\ControleProduto','_method' => 'getImagem')));
//$rotas->add('cadastrarProduto', new Route('/cadastrar', array('_controller' =>'NutriSport\Controllers\ControleProduto','_method' => 'cadastrar')));
//$rotas->add('formularioCadastro', new Route('/formularioCadastro', array('_controller' =>'NutriSport\Controllers\ControleProduto','_method' => 'exibeFormulario')));




$rotas->add('cadprod', new Route('/CadastroProduto', array('_controller' => 'NutriSport\Controllers\ControleProduto','_method' => 'cadProduto')));
$rotas->add('ajaxCadProd', new Route('/ajaxCadProd', array('_controller' =>'NutriSport\Controllers\ControleProduto','_method'=> 'CadastrarProduto')));





return $rotas;
