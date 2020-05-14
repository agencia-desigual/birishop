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
use Sistema\Helper\Seguranca;

// Inicia a classe
class Parceiro extends Controller
{
    // Objetos
    private $objModelParceiro;
    private $objSeguranca;

    // Método construtor
    public function __construct()
    {
        // Chama o pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelParceiro = new \Model\Parceiro();
        $this->objSeguranca = new Seguranca();

    } // End >> fun::__construct()


    /**
     * Método responsável por inserir um novo parceiro
     * fazendo o upload da imagem e adicionando no
     * banco de dados.
     * -------------------------------------------------------
     * @author igorcacerez
     * @method POST
     * @url api/parceiro/insert
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
                $caminho = "./storage/parceiro/";

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

                            // Insere
                            $objeto = $this->objModelParceiro->insert($salva);

                            // Verifica se inseriu
                            if($objeto != false)
                            {
                                // Busca o banner
                                $objeto = $this->objModelParceiro
                                    ->get(["id_parceiro" => $objeto])
                                    ->fetch(\PDO::FETCH_OBJ);

                                // Array de sucesso
                                $dados = [
                                    "tipo" => true,
                                    "code" => 200,
                                    "mensagem" => "Parceiro adicionado com sucesso.",
                                    "objeto" => $objeto
                                ];
                            }
                            else
                            {
                                // Deleta o banner
                                unlink($caminho . $arquivo);

                                // Msg
                                $dados = ["mensagem" => "Ocorreu um erro ao salvar o parceiro."];

                            } // Error >> Ocorreu um erro ao salvar o parceiro.
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
                $dados = ["mensagem" => "Imagem do parceiro não foi informada."];

            } // Error >> Imagem do parceiro não foi informada.
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
     * Método responsável por deletar um parceiro do banco
     * de dados e do servidor.
     * -------------------------------------------------------
     * @param int $id [ID]
     * -------------------------------------------------------
     * @author igorcacerez
     * -------------------------------------------------------
     * @method DELETE
     * @url api/parceiro/delete/[ID]
     */
    public function delete($id)
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $parceiro = null;

        // Recupera os usuários
        $usuario = $this->objSeguranca->security();

        // Verifica se o usuário é admin
        if($usuario->nivel == "admin")
        {
            // Busca o banner
            $parceiro = $this->objModelParceiro
                ->get(["id_parceiro" => $id])
                ->fetch(\PDO::FETCH_OBJ);

            // Verifica se encontrou
            if(!empty($parceiro))
            {
                // Deleta do banco de dados
                if($this->objModelParceiro->delete(["id_parceiro" => $id]) != false)
                {
                    // Deleta o banner
                    unlink("./storage/parceiro/" . $parceiro->arquivo);

                    // array de sucesso
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Parceiro deletado com sucesso.",
                        "objeto" => $parceiro
                    ];

                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao deletar o parceiro."];

                } // Error >> Ocorreu um erro ao deletar o parceiro.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Parceiro informado não foi encontrado."];

            } // Error >> Parceiro informado não foi encontrado.
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