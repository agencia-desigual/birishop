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
    private $objModelUsuario;
    private $objHelperApoio;

    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelPromocoes = new Promocao();
        $this->objModelUsuario = new \Model\Usuario();
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
        $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // ========== LISTA DE PROMOCOES ========== //
            $promocoes = $this->objModelPromocoes
                ->get("","id_promocao ASC")
                ->fetchAll(\PDO::FETCH_OBJ);

            foreach ($promocoes as $promo)
            {
                $empresa = $this->objModelUsuario
                    ->get(["id_usuario" => $promo->id_usuario])
                    ->fetch(\PDO::FETCH_OBJ);

                $promo->empresa = $empresa->nome_estabelecimento;

                // Convertendo a data para o padrão BR
                $promo->data_validade = date("d/m/Y",strtotime($promo->data_validade));
                $promo->data_cadastro = date("d/m/Y",strtotime($promo->data_cadastro));
            }

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


    /**
     * Método responsável por montar a página de editar
     * promocoes do painel administrativo.
     * -------------------------------------------------------
     * @url painel/promocoes/alterar/{id}
     * @method GET
     */
    public function alterar($id)
    {
        // Verifica a permissão do usuario
        $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // ========== LISTA DE PROMOCOES ========== //
            $promocoes = $this->objModelPromocoes
                ->get("","id_promocao ASC")
                ->fetchAll(\PDO::FETCH_OBJ);

            foreach ($promocoes as $promo)
            {
                $empresa = $this->objModelUsuario
                    ->get(["id_usuario" => $promo->id_usuario])
                    ->fetch(\PDO::FETCH_OBJ);

                $promo->empresa = $empresa->nome_estabelecimento;

                // Convertendo a data para o padrão BR
                $promo->data_validade = date("d/m/Y",strtotime($promo->data_validade));
                $promo->data_cadastro = date("d/m/Y",strtotime($promo->data_cadastro));
            }

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

    } // End >> fun::alterar()


} // END::Class Principal