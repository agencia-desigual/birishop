<?php

// NameSpace
namespace Controller\Api;

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
    private $objModelPromocao;


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
        $this->objModelPromocao = new \Model\Promocao();

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



    /**
     * Método responsável por inserir um novo
     * usuário no sistema.
     * -----------------------------------------------------------------
     * @url api/usuario/insert
     * @method POST
     */
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
            // Verifica se as senhas conferem
            if($post["senha"] == $post["senha_repete"])
            {

                $post['senha'] = md5($post['senha']);

                $objAtual = $this->objModelUsuario
                    ->get(["email" => $post["email"]])
                    ->rowCount();

                // Verifica se existe algum cadastro
                if($objAtual == 0)
                {
                    // Remove o senha repete
                    unset($post["senha_repete"]);

                    // Verifica o nivel
                    $post["nivel"] = (!empty($post["nivel"])) ? $post["nivel"] : "associado";

                    // Verifica se é admin
                    if($post["nivel"] == "admin")
                    {
                        // Recupera o usuário logado
                        $usuario = $this->objSeguranca->security();

                        // Verifica se o usuário não possui permissão
                        if($usuario->nivel != "admin")
                        {
                            // Avisa que deu erro
                            $this->api(["mensagem" => "Usuário sem permissão"]);

                            // Exit
                            exit;
                        }
                    }
                    else
                    {
                        // Verifica se não informou os dados obrigatórios
                        if(empty($post["cnpj"]) || empty($post["nome_estabelecimento"]))
                        {
                            // Avisa do erro
                            $this->api(["mensagem" => "CNPJ e o nome da empresa são obrigatórios."]);

                            // Exit
                            exit;
                        }
                        else
                        {
                            // Verifica se é cnpj
<<<<<<< HEAD
                            if(strlen($post["cnpj"]) != 11 && strlen($post["cnpj"]) != 14)
                            {
                                
                                // Avisa do erro
                                $this->api(["mensagem" => "Documento informado não é valido."]);
=======
                            if(strlen($post["cnpj"]) != 18)
                            {
                                // Avisa do erro
                                $this->api(["mensagem" => "O CNPJ informado não é válido."]);
>>>>>>> f00a39e52e21429e3a0a61146ec3049c17049dc3

                                // Exit
                                exit;
                            }
                        }
                    }

                    // Insere
                    $obj = $this->objModelUsuario->insert($post);

                    // Verifica se inserio
                    if(!empty($obj))
                    {
                        // Busca o usuário
                        $obj = $this->objModelUsuario
                            ->get(["id_usuario" => $obj])
                            ->fetch(\PDO::FETCH_OBJ);

                        // Remove a senha
                        unset($obj->senha);

                        // Retorno
                        $dados = [
                            "tipo" => true,
                            "code" => 200,
                            "mensagem" => "Cadastro realizado, aguarde a validação do seus dados.",
                            "objeto" => $obj
                        ];
                    }
                    else
                    {
                        // Msg
                        $dados = ["mensagem" => "Ocorreu um erro ao realizar o cadastro."];
                    } // Error >> Ocorreu um erro ao inserir o usuário.
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Já existe um cadastro com o email informado."];
                } // Error >> Já existe um cadastro com o email informado.
            }
            else
            {
                // msg
                $dados = ["mensagem" => "As senhas não conferem."];
            } // Error >> Senhas não conferem
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Campos obrigatorios não informados"];
        } // Error >> Campos obrigatorios não informados

        // Retorno
        $this->api($dados);

    } // End >> fun::insert()


    /**
     * Método responsável por alterar as informações de um
     * determinado usuário cadastrado no banco de dados.
     * ------------------------------------------------------------------
     * @param $id [Id do usuário]
     * ------------------------------------------------------------------
     * @url api/usuario/update/[ID]
     * @method PUT
     */
    public function update($id)
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $obj = null;
        $objAlterado = null;
        $put = null;

        // Verifica se está logado
        $usuario = $this->objSeguranca->security();

        // Recupera os dados put
        $put = $this->objInput->put();

        // Recupera o usuario a ser alterado
        $obj = $this->objModelUsuario
            ->get(["id_usuario" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou
        if(!empty($obj))
        {
            // Verifica se possui permissão
            if($usuario->nivel == "admin" || $usuario->id_usuario == $id)
            {
                // Verifica se não é admin
                if($usuario->nivel == "associado")
                {
                    // Remove os dados que não pode alterar
                    unset($put["status"]);
                    unset($put["tipo"]);
                }

                // Verifica se vai alterar a senha
                if(!empty($put["senha"]) && !empty($put["senha_repete"]))
                {
                    // Verifica se são identicas
                    if($put["senha"] == $put["senha_repete"])
                    {
                        // Criptografa
                        $put["senha"] = md5($put["senha"]);

                        // Verifica se é igual a atual
                        if($put["senha"] == $obj->senha)
                        {
                            // Avisa do erro
                            $this->api(["mensagem" => "Senha informada é igual a anterior"]);

                            // Exit
                            exit;
                        }

                        // Remove o repete senha
                        unset($put["senha_repete"]);
                    }
                    else
                    {
                        // Msg
                        $this->api(["mensagem" => "Senhas não identicas."]);

                        exit;
                    } // Error >> Senhas não identicas
                }
                else
                {
                    // Remove
                    unset($put["senha"]);
                    unset($put["senha_repete"]);
                }


                // Altera
                if($this->objModelUsuario->update($put, ["id_usuario" => $id]) != false)
                {
                    // Busca o usuário alterado
                    $objAlterado = $this->objModelUsuario
                        ->get(["id_usuario" => $id])
                        ->fetch(\PDO::FETCH_OBJ);

                    // Retorno
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Informações alteradas com sucesso",
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

                } // Error >> Ocorreu um erro ao alterar as informações.
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
            $dados = ["mensagem" => "Usuário não encontrado."];
        } // Error >> Usuário não encontrado.

        // Retorno
        $this->api($dados);

    } // End >> fun::update()


    /**
     * Método responsável por deletar ou desativar um
     * determinado usuário.
     * ------------------------------------------------------------------
     * @param $id [Id do usuário]
     * ------------------------------------------------------------------
     * @url api/usuario/delete/[ID]
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

        // Busca o usuário
        $obj = $this->objModelUsuario
            ->get(['id_usuario' => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou o usuário
        if(!empty($obj))
        {
            // Verifica se o usuário possui permissão
            if($usuario->nivel == "admin")
            {
                // Verifica se vai deletar ou desativar
                if($obj->nivel == "admin")
                {
                    // Deleta o usuário
                    if($this->objModelUsuario->delete(["id_usuario" => $id]) != false)
                    {
                        // Msg
                        $dados = [
                            "tipo" => true,
                            "code" => 200,
                            "mensagem" => "Usuário deletado com sucesso",
                            "objeto" => $obj
                        ];
                    }
                    else
                    {
                        // Msg
                        $dados = ["mensagem" => "Ocorreu um erro ao deletar o usuário."];
                    } // Error >> Ocorreu um erro ao deletar o usuário.
                }
                else
                {
                    // Verifica se o usuário está ativo
                    if($obj->status == true)
                    {
                        // Desativa o usuário
                        $altera = ["status" => false];
                    }
                    else
                    {
                        // Ativa o usuário
                        $altera = ["status" => true];
                    }

                    // Altera o status do usuário
                    if($this->objModelUsuario->update($altera, ["id_usuario" => $id]) != false)
                    {
                        // Busca o usuário alterado
                        $objAlterado = $obj;
                        $objAlterado->status = $altera["status"];

                        // Retorno de sucesso
                        $dados = [
                            "tipo" => true,
                            "code" => 200,
                            "mensagem" => "Status alterado com sucesso.",
                            "objeto" => $objAlterado
                        ];
                    }
                    else
                    {
                        // Msg
                        $dados = ["mensagem" => "Ocorreu um erro ao alterar o status do usuário."];
                    } // Error >> Ocorreu um erro ao alterar o status do usuário.
                }
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Usuário sem permissão."];
            } // Error >> Usuário sem permissão
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Usuário não encontrado."];
        } // Error >> Usuário não encontrado

        // Retorno
        $this->api($dados);

    } // End >> fun::delete()


    /**
     * Método responsável por deletar ou desativar um
     * determinado associado.
     * ------------------------------------------------------------------
     * @param $id [Id do usuário]
     * ------------------------------------------------------------------
     * @url api/associado/delete/[ID]
     * @method DELETE
     */
    public function deleteAssociado($id)
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $obj = null;

        // Verifica se está logado
        $usuario = $this->objSeguranca->security();

        // Busca o usuário
        $obj = $this->objModelUsuario
            ->get(['id_usuario' => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou o usuário
        if(!empty($obj))
        {
            // Verifica se o usuário possui permissão
            if($usuario->nivel == "admin")
            {

                // Busca as promoções do usuário
                $promocoes = $this->objModelPromocao
                    ->get(["id_usuario" => $obj->id_usuario])
                    ->rowCount();

                if ($promocoes > 0)
                {
                    // Msg
                    $dados = ["mensagem" => "O Associado tem promoções cadastradas, apague todas as promoções antes."];
                }
                else
                {
                    // Deleta o usuário
                    if($this->objModelUsuario->delete(["id_usuario" => $id]) != false)
                    {
                        // Msg
                        $dados = [
                            "tipo" => true,
                            "code" => 200,
                            "mensagem" => "Associado deletado com sucesso",
                            "objeto" => $obj
                        ];
                    }
                    else
                    {
                        // Msg
                        $dados = ["mensagem" => "Ocorreu um erro ao deletar o usuário."];
                    } // Error >> Ocorreu um erro ao deletar o usuário.
                }

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Usuário sem permissão."];
            } // Error >> Usuário sem permissão
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Usuário não encontrado."];
        } // Error >> Usuário não encontrado

        // Retorno
        $this->api($dados);

    } // End >> fun::deleteAssociado()

} // END::Class Principal