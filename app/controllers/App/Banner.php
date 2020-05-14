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


class Banner extends CI_controller
{

    // Objetos
    private $objModelBanner;
    private $objHelperApoio;

    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelBanner = new \Model\Banner();
        $this->objHelperApoio = new Apoio();

    }

    /**
     * Método responsável por montar a página de banners
     * do painel administrativo.
     * -------------------------------------------------------
     * @url painel/banner
     * @method GET
     */
    public function listar()
    {
        // Verifica a permissão do usuario
        $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // ========== LISTA DE BANNERS ========== //
            $banners = $this->objModelBanner
                ->get("","ordem ASC")
                ->fetchAll(\PDO::FETCH_OBJ);

            // Array de dados
            $dados = [
                "usuario" => $usuario,
                "banners" => $banners,
                "js" => [
                    "modulos" => ["Banner"]
                ]
            ];

            // Carrega a view
            $this->view("painel/banner/listar",$dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::listar()



    /**
     * Método responsável por montar a página de inserir banners
     * do painel administrativo.
     * -------------------------------------------------------
     * @url painel/banner/inserir
     * @method GET
     */
    public function inserir()
    {
        // Verifica a permissão do usuario
        $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // Array de exibição
            $dados = [
                "usuario" => $usuario,
                "js" => [
                    "modulos" => ["Banner"]
                ]
            ];

            // Carrega a view
            $this->view("painel/banner/cadastrar", $dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::inserir()


} // END::Class Principal