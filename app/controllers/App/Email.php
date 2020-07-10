<?php

// NameSpace
namespace Controller\App;

// Importação
use Sistema\Controller;

// Classe
class Email
    extends Controller
{

    // Método Construtor
    public function __construct()
    {
        // Inicia o método pai
        parent::__construct();

    } // End >> fun::__construct()

    /**
     * Método responsável por gerar o email
     * de recuperar senha.
     */
    public function recuperarSenha()
    {

        // Chama a view
        $this->view("email/recuperar-senha");

    } // End >> fun::recuperarSenha()


} // End >> Class::App\Usuario