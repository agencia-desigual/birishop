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
use Sistema\Helper\File;
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


    /**
     * Método responsável por cadastrar uma nova promoção no
     * banco de dados.
     * ------------------------------------------------------
     * @url api/promocao/insert
     * @method POST
     */
    public function insert()
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $post = null;
        $caminho = null;
        $arquivo = null;

        // Busca o usuário logado
        $usuario = $this->objSeguranca->security();

        // Recupera os dados post
        $post = $_POST;

        // Verifica se é associado
        if($usuario->nivel == "associado")
        {
            // Salva os dados padroes
            $post["id_usuario"] = $usuario->id_usuario;
            $post["status"] = "analise";
        }

        // Verificando se informou o whats ou link
        if(!empty($post['link-site']) || !empty($post['link-whats']))
        {

            // Validando o link
            if($post['link-site'] == "" || $post['link-site'] == null)
            {
                $caracteres = ["(",")",",","-"," "];
                $post['link-whats'] = str_replace($caracteres,"",$post['link-whats']);
                $post['link'] = "https://api.whatsapp.com/send?phone=55{$post['link-whats']}&text=Encontrei%20sua%20promoção%20no%20Birishop.&source=&data=";
            }
            else
            {
                $post['link'] = $post['link-site'];
            }

            unset($post['link-site']);
            unset($post['link-whats']);

            // Verifica se informou os dados obrigatórios
            if(!empty($post["nome"]) &&
                !empty($post["id_usuario"]) &&
                !empty($post["id_categoria"]) &&
                !empty($post["valor_antigo"]) &&
                !empty($post["valor"]) &&
                !empty($post["link"]) &&
                !empty($post["descricao"]) &&
                !empty($post["data_validade"]))
            {

                // Convertando a data para o padrão
                $auxData = explode("/",$post["data_validade"]);
                $post["data_validade"] = $auxData[2].'-'.$auxData[1].'-'.$auxData[0];

                $post["valor"] = str_replace(".",'',$post["valor"]);
                $post["valor"] = str_replace(",",'.',$post["valor"]);

                $post["valor_antigo"] = str_replace(".",'',$post["valor_antigo"]);
                $post["valor_antigo"] = str_replace(",",'.',$post["valor_antigo"]);


                // Verifica se informou a imagem
                if($_FILES["arquivo"]["size"] > 0)
                {
                    // Caminho
                    $caminho = "./storage/promocao/";

                    // Instancia o objeto de upload
                    $objUpload = new File();

                    // Configurações
                    $objUpload->setStorange($caminho);
                    $objUpload->setMaxSize(5 * MB);
                    $objUpload->setExtensaoValida(["jpg","png","jpeg"]);
                    $objUpload->setFile($_FILES['arquivo']);

                    // Verifica se o tamanho é permitido
                    if($objUpload->validaSize())
                    {
                        // Verifica se a extensão é válida
                        if($objUpload->validaExtensao())
                        {
                            // Realiza o upload
                            $arquivo = $objUpload->upload();

                            // Verifica se deu certo
                            if($arquivo != false)
                            {
                                // Add o arquivo a ser salvo
                                $post["imagem"] = $arquivo;

                                // Adiciona a promocao
                                $obj = $this->objModelPromocao->insert($post);

                                // Verifica se salvou
                                if(!empty($obj))
                                {
                                    // Busca a promocao
                                    $obj = $this->objModelPromocao
                                        ->get(["id_promocao" => $obj])
                                        ->fetch(\PDO::FETCH_OBJ);

                                    // Array de retorno
                                    $dados = [
                                        "tipo" => true,
                                        "code" => 200,
                                        "objeto" => $obj,
                                        "mensagem" => "Promoção adicionada com sucesso."
                                    ];
                                }
                                else
                                {
                                    // Deleta a imagem
                                    unlink($caminho . $arquivo);

                                    // Avisa que deu erro
                                    $dados = ["mensagem" => "Ocorreu um erro ao salvar promocao."];
                                } // Error >> Ocorreu um erro ao salvar promocao
                            }
                            else
                            {
                                // Msg
                                $dados = ["mensagem" => "Ocorreu um erro ao realizar o upload da imagem."];
                            } // Error >> Ocorreu um erro ao realizar o upload da imagem.
                        }
                        else
                        {
                            // Msg
                            $dados = ["mensagem" => "A extensão da imagem não é suportada."];
                        } // Error >> A extensão da imagem não é suportada.
                    }
                    else
                    {
                        // Msg
                        $dados = ["mensagem" => "O tamanho da imagem é maior que 2MB."];
                    } // Error >> O tamanho da imagem é maior que 2MB
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Imagem não informada."];
                } // Error >> Imagem não informada.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Campos obrigatórios não informados."];
            } // Error >> Campos obrigatórios não informados.
        }
        else
        {
            $dados = ["mensagem" => "Informe o link da promoção."];
        }

        // Retorno
        $this->api($dados);

    } // End >> fun::insert()



    /**
     * Método responsável por alterar os dados de uma
     * determinada promoção.
     * ------------------------------------------------------
     * @param $id [Id Promoção]
     * ------------------------------------------------------
     * @url api/promocao/update/[ID]
     * @method PUT
     */
    public function update($id)
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $obj = null;
        $objAlterado = null;

        // Verifica se está logado
        $usuario = $this->objSeguranca->security();

        // Recupera os dados put
        $put = $this->objInput->put();

        // Recupera os dados do objeto
        $obj = $this->objModelPromocao
            ->get(["id_promocao" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica existe
        if(!empty($obj))
        {
            // Verifica se possui permissão
            if(($usuario->nivel == "admin") || ($usuario->nivel == "associado" || $obj->id_usuario == $usuario->id_usuario))
            {
                // Verifica se não é admin
                if($usuario->nivel != "admin")
                {
                    // Verifica se o status é diferente de cancelado ou analise
                    if(!empty($put["status"]) && $put["status"] != "cancelado" && $put["status"] != "analise")
                    {
                        // Deleta o status
                        unset($put["status"]);
                    }
                }

                // Verifica se vai alterar algo
                if(!empty($put))
                {
                    // Caso for update link do admin
                    if(!isset($put['link']))
                    {
                        // Validando o link
                        if(($put['link-site'] == "" || $put['link-site'] == null) &&
                            ($put['link-whats'] != "" || $put['link-whats'] != null))
                        {
                            $caracteres = ["(",")",",","-"," "];
                            $put['link-whats'] = str_replace($caracteres,"",$put['link-whats']);
                            $put['link'] = "https://api.whatsapp.com/send?phone=55{$put['link-whats']}&text=Encontrei%20sua%20promoção%20no%20Birishop.&source=&data=";
                        }
                        elseif(($put['link-site'] != "" || $put['link-site'] != null) &&
                            ($put['link-whats'] == "" || $put['link-whats'] == null))
                        {
                            $put['link'] = $put['link-site'];
                        }

                        unset($put['link-whats']);
                        unset($put['link-site']);
                    }

                    // Convertando a data para o padrão
                    $auxData = explode("/",$put["data_validade"]);
                    $put["data_validade"] = $auxData[2].'-'.$auxData[1].'-'.$auxData[0];

                    // Altera e verifica se alterou
                    if($this->objModelPromocao->update($put, ["id_promocao" => $id]) != false)
                    {
                        // Busca o objeto alterado
                        $objAlterado = $this->objModelPromocao
                            ->get(["id_promocao" => $id])
                            ->fetch(\PDO::FETCH_OBJ);

                        // Retorna
                        $dados = [
                            "tipo" => true,
                            "code" => 200,
                            "mensagem" => "Informações alteradas com sucesso.",
                            "objeto" => [
                                "antes" => $obj,
                                "atual" => $objAlterado
                            ]
                        ];
                    }
                    else
                    {
                        // Msg
                        $dados = ["mensagem" => "Ocorreu um erro ao alterar as informações."];
                    } // Error >> Ocorreu um erro ao alterar as informações
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Nada está sendo alterado"];
                } // Error >> Nada está sendo alterado
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Usuário sem permissão."];
            } // Error >> Usuário sem permissão.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "A promoção informada não foi encontrada."];
        } // Error >> Promoção não encontrada

        // Retorno
        $this->api($dados);

    } // End >> fun::update()



    /**
     * Método responsável por deletar uma determinada promoção
     * verificando se o usuário possui permissão para isso.
     * ------------------------------------------------------
     * @param $id [Id da promoção]
     * ------------------------------------------------------
     * @url api/promocao/delete/[ID]
     * @method DELETE
     */
    public function delete($id)
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $obj = null;

        // Verifica se está logado
        $usuario = $this->objSeguranca->security();

        // Recupera o objeto
        $obj = $this->objModelPromocao
            ->get(["id_promocao" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se ele existe
        if(!empty($obj))
        {
            // Verifica se o usuário possui permissão
            if($usuario->nivel == "admin" || $usuario->id_usuario == $obj->id_usuario)
            {
                // Deleta
                if($this->objModelPromocao->delete(["id_promocao" => $id]) != false)
                {
                    // Informa que deu certo
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Promoção deletada com sucesso.",
                        "objeto" => $obj
                    ];
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao deletar a promoção."];
                } // Error >> Ocorreu um erro ao deletar a promoção.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Usuário sem permissão."];
            } // Error >> Usuário sem permissão.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Promoção não encontrada."];
        } // Error >> Promoção não encontrado.

        // Retorno
        $this->api($dados);

    } // End >> fun::delete()


} // End >> Class::Promocao