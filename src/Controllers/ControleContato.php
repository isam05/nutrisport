<?php


namespace NutriSport\Controllers;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;


class ControleContato {

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
    
    public function contato(){
     return $this->response->setContent($this->twig->render('Contato.html'));
     
    }
}

