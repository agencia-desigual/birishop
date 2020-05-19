<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 26/03/2019
 * Time: 18:29
 */

namespace Controller\App;

use Helper\Apoio;
use Model\Categoria;
use Model\Promocao;
use Sistema\Controller as CI_controller;


class Promocoes extends CI_controller
{

    // Objetos
    private $objModelPromocoes;
    private $objModelUsuario;
    private $objHelperApoio;
    private $objModelCategoria;

    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelPromocoes = new Promocao();
        $this->objModelUsuario = new \Model\Usuario();
        $this->objHelperApoio = new Apoio();
        $this->objModelCategoria = new Categoria();

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
        if($usuario->nivel == "admin" || $usuario->nivel == "associado")
        {
            // ========== LISTA DE PROMOCOES DO PAINEL ADMIN ========== //
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

            // ========== LISTA DE PROMOCOES DO ASSOCIADO ========== //
            $promocoesUsuario = $this->objModelPromocoes
                ->get(["id_usuario" => $usuario->id_usuario],"id_promocao ASC")
                ->fetchAll(\PDO::FETCH_OBJ);

            foreach ($promocoesUsuario as $promoUsuario)
            {
                $promoUsuario->empresa = $usuario->nome_estabelecimento;

                // Convertendo a data para o padrão BR
                $promoUsuario->data_validade = date("d/m/Y",strtotime($promoUsuario->data_validade));
                $promoUsuario->data_cadastro = date("d/m/Y",strtotime($promoUsuario->data_cadastro));
            }

            // Array de dados
            $dados = [
                "usuario" => $usuario,
                "promocoes" => $promocoes,
                "promocoesUsuario" => $promocoesUsuario
            ];

            if ($usuario->nivel == "admin")
            {
                // Carrega a view
                $this->view("painel/promocoes/listar",$dados);
            }
            else
            {
                $dados["js"] = [
                    "modulos" => ["Promocoes"]
                ];

                // Carrega a view
                $this->view("associado/promocoes/listar",$dados);
            }

        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::listar()


    /**
     * Método responsável por montar a página de inserir
     * promocoes do painel do associado.
     * -------------------------------------------------------
     * @url painel/promocoes/inserir
     * @method GET
     */
    public function inserir()
    {
        // Verifica a permissão do usuario
        $usuario = $this->objHelperApoio->seguranca();

        // Buscando as categorias
        $categorias = $this->objModelCategoria
            ->get()
            ->fetchAll(\PDO::FETCH_OBJ);

        // Verifica se é admin
        if($usuario->nivel == "associado")
        {
            // Array de dados
            $dados = [
                "usuario" => $usuario,
                "categorias" => $categorias,
                "js" => [
                    "modulos" => ["Promocoes"]
                ]
            ];


            // Carrega a view
            $this->view("associado/promocoes/cadastrar",$dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::inserir()


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
        if($usuario->nivel == "admin" || $usuario->nivel == "associado")
        {
            // ========== LISTA DE PROMOCOES DO PAINEL ADMIN ========== //
            $promocao = $this->objModelPromocoes
                ->get(["id_promocao" => $id],"")
                ->fetch(\PDO::FETCH_OBJ);

            $empresa = $this->objModelUsuario
                ->get(["id_usuario" => $promocao->id_usuario])
                ->fetch(\PDO::FETCH_OBJ);

            // Removendo a senha
            unset($empresa->senha);


            // ========== LISTA DE PROMOCOES DO ASSOCIADO ========== //
            $promocaoUsuario = $this->objModelPromocoes
                ->get(["id_promocao" => $id, "id_usuario" => $usuario->id_usuario],"")
                ->fetch(\PDO::FETCH_OBJ);


            // Convertendo a data para o padrão BR
            $promocao->data_validade = date("d/m/Y",strtotime($promocao->data_validade));
            $promocao->data_cadastro = date("d/m/Y",strtotime($promocao->data_cadastro));

            // Pegando a empresa
            $promocao->empresa = $empresa;

            // ========== LISTA DE CATEORIAS DAS PROMOCOES DO ASSOCIADO ========== //
            $categorias = $this->objModelCategoria
                ->get()
                ->fetchAll(\PDO::FETCH_OBJ);

            // Array de dados
            $dados = [
                "usuario" => $usuario,
                "promocao" => $promocao,
                "promocaoUsuario" => $promocaoUsuario,
                "categorias" => $categorias,
                "js" => [
                    "modulos" => ["Promocoes"]
                ]
            ];


            if ($usuario->nivel == "admin")
            {
                // Carrega a view
                $this->view("painel/promocoes/editar",$dados);
            }
            else
            {
                // Carrega a view
                $this->view("associado/promocoes/editar",$dados);
            }

        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::alterar()


} // END::Class Principal