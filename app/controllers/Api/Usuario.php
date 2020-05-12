<?php

// NameSpace
namespace Controller\Ap1;

// Importação
use Helper\Apoio;
use Helper\Email;
use Sistema\Controller as CI_controller;
use Sistema\Helper\Input;
use Sistema\Helper\Seguranca;

// Classe
class Usuario extends CI_controller
{

    // Objetos
    private $objModelUsuario;

    private $objHelperApoio;
    private $objSeguranca;
    private $objInput;
    private $objEmail;


    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelUsuario = new \Model\Usuario();

        $this->objHelperApoio = new Apoio();
        $this->objSeguranca = new Seguranca();
        $this->objInput = new Input();
        $this->objEmail = new Email();

    } // End >> fun::__construct()



    /**
     * Método responsável por realizar o login do usuário
     * no sistema, verificando se o mesmo possui permissão
     * para isso.
     * -------------------------------------------------------
     * @url api/usuario/login
     * @method POST
     */
    public function login()
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $token = null;
        $dadosLogin = null;

        // Recupera os dados de login
        $dadosLogin = $this->objSeguranca->getDadosLogin();

        // Criptografa a senha
        $dadosLogin["senha"] = md5($dadosLogin["senha"]);

        // Busca o usuário
        $usuario = $this->objModelUsuario
            ->get(["email" => $dadosLogin["usuario"], "senha" => $dadosLogin["senha"]])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou
        if(!empty($usuario))
        {
            // Verifica se está ativo
            if($usuario->status == true)
            {
                // Gera um token
                $token = $this->objSeguranca->getToken($usuario->id_usuario);

                // Verifica se gerou um token
                if(!empty($token))
                {
                    // Remove a senha
                    unset($usuario->senha);

                    // Salva os dados na session
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["token"] = $token;

                    // Array de retorno
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Sucesso! Aguarde...",
                        "objeto" => [
                            "usuario" => $usuario,
                            "token" => $token
                        ]
                    ];
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao gerar o token"];
                } // Error >> Ocorreu um erro ao gerar token.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Sua conta ainda não foi aprovada."];
            } // Error >> Usuário sem acesso
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "E-mail ou senha informados estão incorretos."];
        } // Error >> Email ou senha incorretos.

        // Api
        $this->api($dados);

    } // End >> fun::login()


    /**
     * Método responsável por buscar os dados atualizados
     * de um usuário logado e atualizar a session do mesmo.
     * -----------------------------------------------------
     * @author igorcacerez
     * -----------------------------------------------------
     * @method POST
     * @url api/usuario/session-refresh
     */
    public function sessionRefresh()
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $usuarioAtualiza = null;

        // Recupera o usuário logado
        $usuario = $this->objSeguranca->security();

        // Busca os dados atualizados do usuário
        $usuarioAtualiza = $this->objModelUsuario
            ->get(["id_usuario" => $usuario->id_usuario])
            ->fetch(\PDO::FETCH_OBJ);

        // Remove a senha
        unset($usuarioAtualiza->senha);

        // Atualiza os dados na session
        $_SESSION["usuario"] = $usuarioAtualiza;


        // Array de retorno
        $dados = [
            "tipo" => true,
            "code" => 200,
            "objeto" => [
                "usuario" => $usuarioAtualiza
            ]
        ];

        // Retorno
        $this->api($dados);

    } // End >> fun::sessionRefresh()



    /**
     * Método responsável por retornar um usuario especifico e suas
     * FK, deve ser informado via paramento o ID do item.
     * -----------------------------------------------------------------
     * @param $id
     * -----------------------------------------------------------------
     * @author igorcacerez
     * @url api/usuario/get/[ID]
     * @method GET
     */
    public function get($id)
    {
        // Seguranca
        $this->objSeguranca->security();

        // Variaveis
        $dados = null;
        $objeto = null;

        // Busca o Objeto com páginacao
        $objeto = $this->objModelUsuario->get(["id_usuario" => $id]);

        // Fetch
        $total = $objeto->rowCount();
        $objeto = $objeto->fetch(\PDO::FETCH_OBJ);


        // Monta o array de retorno
        $dados = [
            "tipo" => true,
            "code" => 200,
            "objeto" => [
                "total" => $total,
                "item" => $objeto,
            ]
        ];

        // Retorna
        $this->api($dados);

    } // End >> fun::get()



    /**
     * Método responsável por retornar todos os usuários cadastrados
     * no sistema, podendo informar a ordem, limit e where.
     * -----------------------------------------------------------------
     * @author igorcacerez
     * -----------------------------------------------------------------
     * @url api/usuario/get
     * @method GET
     */
    public function getAll()
    {
        // Seguranca
        $this->objSeguranca->security();

        // Variaveis
        $dados = null;
        $objeto = null;
        $ordem = null;
        $where = null;

        // Variaveis Paginação
        $pag = (isset($_GET["pag"])) ? $_GET["pag"] : 1;
        $limite = (isset($_GET["limit"])) ? $_GET["limit"] : NUM_PAG;

        // Variveis da busca
        $orderBy = (isset($_GET["order_by"])) ? $_GET["order_by"] : null;
        $orderTipo = (isset($_GET["order_by_type"])) ? $_GET["order_by_type"] : "ASC";

        // Verifica se retornou o where
        $where = (isset($_GET["where"])) ? $_GET["where"] : null;

        // Verifica se foi informado a ordem
        if($orderBy != null)
        {
            // cria a ordem
            $ordem = $orderBy . " " . $orderTipo;
        }

        // Atribui a variável inicio, o inicio de onde os registros vão ser mostrados
        // por página, exemplo 0 à 10, 11 à 20 e assim por diante
        $inicio = ($pag * $limite) - $limite;

        // Busca o Objeto com páginacao
        $objeto = $this->objModelUsuario->get($where, $ordem, ($inicio . "," . $limite));

        // Fetch - Total
        $total = $objeto->rowCount();
        $objeto = $objeto->fetchAll(\PDO::FETCH_OBJ);


        // Monta o array de retorno
        $dados = [
            "tipo" => true,
            "code" => 200,
            "objeto" => [
                "total" => $total,
                "pagina" => $pag,
                "itens" => $objeto,
            ]
        ];

        // Retorna
        $this->api($dados);

    } // End >> fun::getAll()



    public function insert()
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $post = null;

        // Recupera os dados post
        $post = $_POST;

        // Verifica se informou os campos obrigatórios
        if(!empty($post["email"]) && !empty($post["nome"]) && !empty($post["senha"]))
        {

        }
        else
        {

        } // Error >>

        // Retorno
        $this->api($dados);

    } // End >> fun::insert()


    public function update($id)
    {

    } // End >> fun::update()


    public function delete()
    {

    } // End >> fun::delete()

} // END::Class Principal