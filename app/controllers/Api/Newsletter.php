<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 15/04/2020
 * Time: 14:44
 */

// NameSpace
namespace Controller\Api;

// Importação
use Sistema\Controller;
use Sistema\Helper\Seguranca;

// Classe
class Newsletter extends Controller
{
    // Objetos
    private $objModelNewslatter;
    private $objSeguranca;

    // Método construtor
    public function __construct()
    {
        // Instancia o pai
        parent::__construct();

        // Instancia os objeto
        $this->objModelNewslatter = new \Model\Newsletter();
        $this->objSeguranca = new Seguranca();

    } // End >> fun::__construct()


    /**
     * Método responsável por retornar um endereco especifico e suas
     * FK, deve ser informado via paramento o ID do item.
     * -----------------------------------------------------------------
     * @param $id
     * -----------------------------------------------------------------
     * @author igorcacerez
     * @url api/newsletter/get/[ID]
     * @method GET
     */
    public function get($id)
    {
        // Seguranca
        $this->objSeguranca->security();

        // Variaveis
        $dados = null;
        $objeto = null;
        $usuario = null;
        $total = 0;

        // Recupera o usuário
        $usuario = $this->objSeguranca->security();

        // Verifica se o usuário possui permissão
        if($usuario->nivel == "admin")
        {
            // Busca o Objeto com páginacao
            $objeto = $this->objModelNewslatter->get(["id_newsletter" => $id]);

            // Fetch
            $total = $objeto->rowCount();
            $objeto = $objeto->fetch(\PDO::FETCH_OBJ);
        }

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
     * @url api/newsletter/get
     * @method GET
     */
    public function getAll()
    {
        // Seguranca
        $usuario = $this->objSeguranca->security();

        // Variaveis
        $dados = null;
        $objeto = null;
        $ordem = null;
        $where = null;
        $total = 0;

        // Variaveis Paginação
        $pag = (isset($_GET["pag"])) ? $_GET["pag"] : 1;
        $limite = (isset($_GET["limit"])) ? $_GET["limit"] : NUM_PAG;

        // Verifica se o usuário possui permissão
        if($usuario->nivel == "admin")
        {
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
            $objeto = $this->objModelNewslatter->get($where, $ordem, ($inicio . "," . $limite));

            // Fetch - Total
            $total = $objeto->rowCount();
            $objeto = $objeto->fetchAll(\PDO::FETCH_OBJ);
        }

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



    /**
     * Método responsável por inseri um cadastro do newsletter
     * -----------------------------------------------------------------
     * @author igorcacerez
     * -----------------------------------------------------------------
     * @url api/newsletter/insert
     * @method POST
     */
    public function insert()
    {
        // Variaveis
        $dados = null;
        $post = null;
        $salva = null;
        $obj = null;

        // Recupera o post
        $post = $_POST;

        // Verifica se informou o email
        if(!empty($post["email"]))
        {
            // Deixa tudo minusculo
            $salva["email"] = strtolower($post["email"]);

            // Verifica se o e-mail já está cadastrado
            if($this->objModelNewslatter->get(["email" => $salva["email"]])->rowCount() == 0)
            {
                // Data do cadastro
                $salva["cadastro"] = date("Y-m-d H:i:s");

                // Salva
                $obj = $this->objModelNewslatter->insert($salva);

                // Verifica se inseriu
                if($obj != false)
                {
                    // Busca o objeto adicionado
                    $obj = $this->objModelNewslatter
                        ->get(["id_newsletter" => $obj])
                        ->fetch(\PDO::FETCH_OBJ);

                    // Array de retorno
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Seu e-mail foi cadastrado com sucesso.",
                        "objeto" => $obj
                    ];
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao salvar cadastro."];
                } // Error >> Ocorreu um erro ao salvar cadastro.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Seu e-mail já está cadastrado em nossa lista."];

            } // Error >> E-mail já está cadastrado.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "E-mail não informado."];

        } // Error >> E-mail não informado.

        // Retorno
        $this->api($dados);

    } // End >> fun::insert()



    /**
     * Método responsável por deletar um cadastro de newslatter.
     * -----------------------------------------------------------------
     * @author igorcacerez
     * -----------------------------------------------------------------
     * @param $hash
     * @param $id
     * -----------------------------------------------------------------
     * @url api/newsletter/delete/[HASH]/[ID]
     * @method DELETE
     */
    public function delete($hash, $id)
    {
        // Variaveis
        $dados = null;
        $news = null;

        // Verifica se a hash está correta
        if($hash == md5($id))
        {
            // Busca o cadastro
            $news = $this->objModelNewslatter
                ->get(["id_newsletter" => $id])
                ->fetch(\PDO::FETCH_OBJ);

            // Verifica se encontrou
            if(!empty($news))
            {
                // Deleta
                if($this->objModelNewslatter->delete(["id_newsletter" => $id]) != false)
                {
                    // Array de sucesso
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Cadastro deletado com sucesso.",
                        "objeto" => $news
                    ];
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao deletar o cadastro."];

                } // Error >> Ocorreu um erri
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "O cadastro já foi deletado."];

            } // Error >> Cadastro não encontrado.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Usuário sem permissão."];

        } // Erro >> Usuário sem permissão

        // Retorno
        $this->api($dados);

    } // End >> fun::delete()


} // End >> Class::Api\Newslatter