<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 26/03/2019
 * Time: 18:29
 */

namespace Controller\App;

use Helper\Apoio;
use Model\Promocao;
use Sistema\Controller as CI_controller;


class Promocoes extends CI_controller
{

    // Objetos
    private $objModelPromocoes;
    private $objHelperApoio;

    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelPromocoes = new Promocao();
        $this->objHelperApoio = new Apoio();

    }

    /**
     * Método responsável por montar a página de promocoes
     * do painel administrativo.
     * -------------------------------------------------------
     * @url painel/promocoes
     * @method GET
     */
    public function listar()
    {
        // Verifica a permissão do usuario
        //$usuario = $this->objHelperApoio->seguranca();
        $usuario->nivel = "admin";

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // ========== LISTA DE PROMOCOES ========== //
            $promocoes = $this->objModelPromocoes
                ->get("","id_promocao ASC")
                ->fetchAll(\PDO::FETCH_OBJ);

            // Array de dados
            $dados = [
                "usuario" => $usuario,
                "promocoes" => $promocoes
            ];

            // Carrega a view
            $this->view("painel/promocoes/listar",$dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::listar()



} // END::Class Principal