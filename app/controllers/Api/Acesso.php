<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 20/04/2020
 * Time: 09:53
 */

// NameSpace
namespace Controller\Api;

// Importação
use Sistema\Controller;

// Inicia a classe
class Acesso extends Controller
{
    // Objetos
    private $objModelAcesso;

    // Método construtor
    public function __construct()
    {
        // Chama o pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelAcesso = new \Model\Acesso();

    } // End >> fun::__construct()


    /**
     * Método responsável por inserir um novo banner
     * fazendo o upload da imagem e adicionando no
     * banco de dados.
     * -------------------------------------------------------
     * @author igorcacerez
     * @method POST
     * @url api/acesso/insert
     */
    public function insert()
    {
        // Variaveis
        $dados = null;
        $post = $_POST;

        // Busca a promoção
        $buscaPromocao = $this->objModelAcesso->get(["id_promocao" => $post['id_promocao']]);

        // Verifica se já existe acesso nessa promoção ---> UPDATE
        if($buscaPromocao->rowCount() > 0)
        {

            // Busca a promo
            $buscaPromocao = $this->objModelAcesso
                ->get(["id_promocao" => $post['id_promocao']])
                ->fetch(\PDO::FETCH_OBJ);

            // Somado o acesso
            $acesso = $buscaPromocao->acesso + 1;

            if ($objeto = $this->objModelAcesso->update(["acesso" => $acesso],["id_promocao"=>$post['id_promocao']]))
            {
                // array de sucesso
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Acesso adicionado com sucesso.",
                    "objeto" => $objeto
                ];
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao salvar o acesso."];
            }

        }

        // Verifica se já existe acesso nessa promoção ---> INSERT
        else
        {
            // Array de Insert
            $salva = [
                "id_promocao" => $post['id_promocao'],
                "acesso" => 1
            ];

            // Insere o primero acesso
            if ($objeto = $this->objModelAcesso->insert($salva))
            {
                // array de sucesso
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Acesso adicionado com sucesso.",
                    "objeto" => $objeto
                ];
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao salvar o acesso."];
            }
        }

    } // End >> fun::insert()



} // End >> Class::Api\Banner