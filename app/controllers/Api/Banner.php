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
use Sistema\Helper\File;
use Sistema\Helper\Input;
use Sistema\Helper\Seguranca;

// Inicia a classe
class Banner extends Controller
{
    // Objetos
    private $objModelBanner;
    private $objSeguranca;
    private $objInput;

    // Método construtor
    public function __construct()
    {
        // Chama o pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelBanner = new \Model\Banner();

        $this->objSeguranca = new Seguranca();
        $this->objInput = new Input();

    } // End >> fun::__construct()


    /**
     * Método responsável por inserir um novo banner
     * fazendo o upload da imagem e adicionando no
     * banco de dados.
     * -------------------------------------------------------
     * @author igorcacerez
     * @method POST
     * @url api/banner/insert
     */
    public function insert()
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $post = null;
        $salva = null;
        $caminho = null;
        $arquivo = null;

        // Recupera os dados do usuário
        $usuario = $this->objSeguranca->security();

        // Recupera os dados POST
        $post = $_POST;

        // Verifica se o usuário possui permissão
        if($usuario->nivel == "admin")
        {
            // Verifica se informou o arquivo
            if($_FILES["arquivo"]["size"] > 0)
            {
                // Caminho
                $caminho = "./storage/banner/";

                // Verifica não se existe
                if(!is_dir($caminho))
                {
                    // Cria o diretório
                    mkdir($caminho, 0777, true);
                }

                // Instancia o objeto
                $objFile = new File();

                // Seta as configurações
                $objFile->setStorange($caminho);
                $objFile->setMaxSize(2 * MB);
                $objFile->setExtensaoValida(["jpg","jpeg","png"]);
                $objFile->setFile($_FILES["arquivo"]);

                // Verifica se o tamanho é válido
                if($objFile->validaSize())
                {
                    // Verifica se a extensão é válida
                    if($objFile->validaExtensao())
                    {
                        // Faz o upload
                        $arquivo = $objFile->upload();

                        // Verifica se deu certo
                        if(!empty($arquivo))
                        {
                            // Monta o array de inserção
                            $salva = [
                                "arquivo" => $arquivo,
                                "link" => $post["link"],
                                "data_cadastro" => date("Y-m-d H:i:s")
                            ];

                            // Verifica se informou a ordem
                            if(isset($post["ordem"]))
                            {
                                $salva["ordem"] = $post["ordem"];
                            }

                            // Insere
                            $objeto = $this->objModelBanner->insert($salva);

                            // Verifica se inseriu
                            if($objeto != false)
                            {
                                // Busca o banner
                                $objeto = $this->objModelBanner
                                    ->get(["id_banner" => $objeto])
                                    ->fetch(\PDO::FETCH_OBJ);

                                // array de sucesso
                                $dados = [
                                    "tipo" => true,
                                    "code" => 200,
                                    "mensagem" => "Banner adicionado com sucesso.",
                                    "objeto" => $objeto
                                ];
                            }
                            else
                            {
                                // Deleta o banner
                                unlink($caminho . $arquivo);

                                // Msg
                                $dados = ["mensagem" => "Ocorreu um erro ao salvar o banner."];

                            } // Error >> Ocorreu um erro ao salvar o banner.
                        }
                        else
                        {
                            // Msg
                            $dados = ["mensagem" => "Ocorreu um erro no upload da imagem."];

                        } // Error >> Ocorreu um erro no upload da imagem.
                    }
                    else
                    {
                        // Msg
                        $dados = ["mensagem" => "A extensão da imagem deve ser JPG, JPEG ou PNG."];
                    } // Error >> Extensão inválida.
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "A imagem é maior que o permitido, 2MB."];
                } // Error >> Imagem muito pesada.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Imagem do banner não foi informada."];

            } // Error >> Imagem do banner não foi informada.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Usuário sem permissão."];

        } // Error >> Usuário sem permissão.


        // Retorno
        $this->api($dados);

    } // End >> fun::insert()



    /**
     * Método responsável por alterar um banner no banco de
     * dados.
     * -------------------------------------------------------
     * @param int $id [ID]
     * -------------------------------------------------------
     * @author igorcacerez
     * -------------------------------------------------------
     * @method PUT
     * @url api/banner/update/[ID]
     */
    public function update($id)
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $banner = null;
        $bannerAlterado = null;
        $put = null;

        // Recupera os usuários
        $usuario = $this->objSeguranca->security();

        // Recupera os dados PUT
        $put = $this->objInput->put();

        // Verifica se o usuário é admin
        if($usuario->nivel == "admin")
        {
            // Busca o banner
            $banner = $this->objModelBanner
                ->get(["id_banner" => $id])
                ->fetch(\PDO::FETCH_OBJ);

            // Verifica se encontrou
            if(!empty($banner))
            {
                // Altera os dados
                if($this->objModelBanner->update($put, ["id_banner" => $id]) != false)
                {
                    // Busca o banner alterado
                    $bannerAlterado = $this->objModelBanner
                        ->get(["id_banner" => $id])
                        ->fetch(\PDO::FETCH_OBJ);

                    // Array de sucesso
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Alterado com sucesso.",
                        "objeto" => [
                            "atual" => $bannerAlterado,
                            "antes" => $banner
                        ]
                    ];
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao deletar o banner."];

                } // Error >> Ocorreu um erro ao deletar o banner.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Banner informado não foi encontrado."];

            } // Error >> Banner informado não foi encontrado.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Usuário sem permissão"];

        } // Error >> Usuário sem permissão

        // Retorno
        $this->api($dados);

    } // End >> fun::update()



    /**
     * Método responsável por deletar um banner
     * do banco de dados e do servidor.
     * -------------------------------------------------------
     * @param int $id [ID]
     * -------------------------------------------------------
     * @author igorcacerez
     * -------------------------------------------------------
     * @method DELETE
     * @url api/banner/delete/[ID]
     */
    public function delete($id)
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $banner = null;

        // Recupera os usuários
        $usuario = $this->objSeguranca->security();

        // Verifica se o usuário é admin
        if($usuario->nivel == "admin")
        {
            // Busca o banner
            $banner = $this->objModelBanner
                ->get(["id_banner" => $id])
                ->fetch(\PDO::FETCH_OBJ);

            // Verifica se encontrou
            if(!empty($banner))
            {
                // Deleta do banco de dados
                if($this->objModelBanner->delete(["id_banner" => $id]) != false)
                {
                    // Deleta o banner
                    unlink("./storage/banner/" . $banner->arquivo);

                    // array de sucesso
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Banner deletado com sucesso.",
                        "objeto" => $banner
                    ];

                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao deletar o banner."];

                } // Error >> Ocorreu um erro ao deletar o banner.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Banner informado não foi encontrado."];

            } // Error >> Banner informado não foi encontrado.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Usuário sem permissão"];

        } // Error >> Usuário sem permissão

        // Retorno
        $this->api($dados);

    } // End >> fun::delete()

} // End >> Class::Api\Banner