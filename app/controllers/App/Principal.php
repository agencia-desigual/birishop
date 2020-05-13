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


class Principal extends CI_controller
{

    private $objHelperApoio;
    private $objModelUsuario;
    private $objModelPromocoes;


    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        // Helpers
        $this->objHelperApoio = new Apoio();
    }


    /**
     * Método responsável por montar a tela
     * de inicio do site.
     * --------------------------------------------------------
     * @url /
     * @method GET
     */
    public function index()
    {
        // Carrega a view
       $this->view("site/index");
    }


    /**
     * Método responsável por montar a tela
     * de promocoes do site.
     * --------------------------------------------------------
     * @url promocoes
     * @method GET
     */
    public function promocoes()
    {
        // Carrega a view
        $this->view("site/promocoes");
    }


    /**
     * Método responsável por montar a tela
     * de detalhes da promocoes do site.
     * --------------------------------------------------------
     * @url promocao-detalhes/{id}/{nome-do-produto}
     * @method GET
     */
    public function promocaoDetalhes()
    {
        // Carrega a view
        $this->view("site/promocao-detalhes");
    }


    /**
     * Método responsável por montar a tela
     * de cadastro de um associado do site.
     * --------------------------------------------------------
     * @url cadastro
     * @method GET
     */
    public function cadastro()
    {
        // Carrega a view
        $this->view("site/cadastro");
    }


    /**
     * Método responsável por montar a tela
     * de login.
     * --------------------------------------------------------
     * @url login
     * @method GET
     */
    public function login()
    {
        // Recupera os dados da sessao
        $user = (!empty($_SESSION["usuario"])) ? $_SESSION["usuario"] : null;

        // Verifica se existe session
        if(!empty($user))
        {
            // Redireciona para a página inicial
            header("Location: " . BASE_URL.'painel');
        }
        else
        {
            // Adiciona o conteudo
            $dados["js"] = [
                "modulos" => ["Usuario"]
            ];

            // Chama a view
            $this->view('site/login',$dados);

        } // USUARIO NÃO LOGADO

    } // End >> fun::login()


    /**
     * Método responsável por destruir a session do usuário e
     * enviar o mesmo para a tela de login.
     * -------------------------------------------------------
     * @url sair
     */
    public function sair()
    {
        // Destroi a session
        session_destroy();

        // Chama a página de sair
        $this->view("site/sair");

    } // End >> fun::sair();


    /**
     * Método responsável por montar a tela
     * de dashboard do painel admin e da empresa
     * --------------------------------------------------------
     * @url painel
     * @method GET
     */
    public function dashboard()
    {
        // Verificando o usuario
        $usuario = $this->objHelperApoio->seguranca();

        // Instanciado os objetos
        $this->objModelUsuario = new \Model\Usuario();
        $this->objModelPromocoes= new Promocao();

        // ===== CONTADORES ===== //
        $qtdePromocoes = $this->objModelPromocoes
            ->get(['status' => 'ativo'])
            ->rowCount();

        $qtdeAssociados = $this->objModelUsuario
            ->get(['status' => true, 'nivel' => 'associado'])
            ->rowCount();

        // ===== LISTA DE ASSOCIADOS AINDA NÃO APROVADOS ===== //
        $associados = $this->objModelUsuario
            ->get(['status' => false, 'nivel' => 'associado'])
            ->fetchAll(\PDO::FETCH_OBJ);


        // Buscando os associados

        // Caso der certo o login
        $dados = [
            "usuario" => $usuario,
            "qtdePromocoes" => $qtdePromocoes,
            "qtdeAssociados" => $qtdeAssociados,
            "associados" => $associados,
            "js" => [
                "modulos" => ["Usuario"]
            ]
        ];

        $this->view("painel/dashboard",$dados);
    }



} // END::Class Principal