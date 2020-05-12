<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 12/05/2020
 * Time: 16:15
 */

// NameSpace
namespace Controller\Api;

// Importação
use Model\Usuario;
use Sistema\Controller;
use Sistema\Helper\Input;
use Sistema\Helper\Seguranca;

// Classe
class Promocao extends Controller
{
    // Objetos
    private $objModelPromocao;
    private $objModelUsuario;

    private $objSeguranca;
    private $objInput;

    // Método construtor
    public function __construct()
    {
        // Chama o pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelPromocao = new \Model\Promocao();
        $this->objModelUsuario = new Usuario();

        $this->objSeguranca = new Seguranca();
        $this->objInput = new Input();

    } // End >> fun::__construct()



    /**
     * Método responsável por retornar uma promocao especifico e suas
     * FK, deve ser informado via paramento o ID do item.
     * -----------------------------------------------------------------
     * @param $id
     * -----------------------------------------------------------------
     * @author igorcacerez
     * @url api/promocao/get/[ID]
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
        $objeto = $this->objModelPromocao->get(["id_promocao" => $id]);

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
     * @url api/promocao/get
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
        $objeto = $this->objModelPromocao->get($where, $ordem, ($inicio . "," . $limite));

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


    } // End >> fun::insert()



    public function update()
    {
        //

    } // End >> fun::update()


    public function delete()
    {
        //

    } // End >> fun::delete()


} // End >> Class::Promocao