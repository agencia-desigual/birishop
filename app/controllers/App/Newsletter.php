<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 26/03/2019
 * Time: 18:29
 */

namespace Controller\App;

use Helper\Apoio;
use Sistema\Controller as CI_controller;


class Newsletter extends CI_controller
{

    // Objetos
    private $objModelNewsletter;
    private $objHelperApoio;

    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelNewsletter = new \Model\Newsletter();
        $this->objHelperApoio = new Apoio();

    }

    /**
     * Método responsável por montar a página de newsletter
     * do painel administrativo.
     * -------------------------------------------------------
     * @url painel/newsletter
     * @method GET
     */
    public function listar()
    {
        // Verifica a permissão do usuario
        $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // ========== LISTA DE NEWSLETTER ========== //
            $newsletter = $this->objModelNewsletter
                ->get("","id_newsletter ASC")
                ->fetchAll(\PDO::FETCH_OBJ);

            // Array de dados
            $dados = [
                "usuario" => $usuario,
                "newsletter" => $newsletter,
            ];

            // Carrega a view
            $this->view("painel/newsletter/listar",$dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::listar()



} // END::Class Principal