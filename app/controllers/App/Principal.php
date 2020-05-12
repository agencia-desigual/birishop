<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 26/03/2019
 * Time: 18:29
 */

namespace Controller\App;

use Sistema\Controller as CI_controller;


class Principal extends CI_controller
{

    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();
    }



    public function index()
    {
       $this->view("site/index");
    }

    public function login()
    {
        $this->view("site/login");
    }

    public function promocoes()
    {
        $this->view("site/promocoes");
    }

    public function promocaoDetalhes()
    {
        $this->view("site/promocao-detalhes");
    }

    public function cadastro()
    {
        $this->view("site/cadastro");
    }



} // END::Class Principal