<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 27/04/2020
 * Time: 09:15
 */

// NameSpace
namespace Controller\App;

// Importação
use Helper\Apoio;
use Sistema\Controller;

// Classe
class Parceiro extends Controller
{

    // Objetos
    private $objModelParceiro;
    private $objHelperApoio;

    // Método construtor
    public function __construct()
    {
        // Chama o pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelParceiro = new \Model\Parceiro();
        $this->objHelperApoio = new Apoio();

    } // End >> fun::__construct()



    /**
     * Método responsável por montar a página de parceiros
     * do painel administrativo.
     * --------------------------------------------------------
     * @url painel/parceiros
     * @method GET
     */
    public function listar()
    {
        // Verifica a permissão do usuario
         $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // ========== LISTA DE PARCEIROS ========== //
            $parceiros = $this->objModelParceiro
                ->get()
                ->fetchAll(\PDO::FETCH_OBJ);

            // Array de dados
            $dados = [
                "usuario" => $usuario,
                "parceiros" => $parceiros,
                "js" => [
                    "modulos" => ["Parceiro"]
                ]
            ];

            // Carrega a view
            $this->view("painel/parceiro/listar",$dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::listar()



    /**
     * Método responsável por montar a página de parceiros
     * do painel administrativo.
     * ---------------------------------------------------------
     * @url painel/parceiro/inserir
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
                    "modulos" => ["Parceiro"]
                ]
            ];

            // Carrega a view
            $this->view("painel/parceiro/cadastrar", $dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::parceiroCadastrar()

} // End >> Class::App\Parceiro