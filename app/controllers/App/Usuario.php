<?php

// NameSpace
namespace Controller\App;

// Importação
use Helper\Apoio;
use Sistema\Controller;

// Classe
class Usuario extends Controller
{
    // Objetos
    private $objModelUsuario;
    private $objHelperApoio;

    // Método Construtor
    public function __construct()
    {
        // Inicia o método pai
        parent::__construct();

        // Instancia os objetos
        $this->objModelUsuario = new \Model\Usuario();
        $this->objHelperApoio = new Apoio();

    } // End >> fun::__construct()


    /**
     * Método responsável por montar a página inicial
     * do painel administrativo.
     * --------------------------------------------------------
     * @url painel/usuarios
     * @method GET
     */
    public function listar()
    {
        // Verifica a permissão do usuario
         $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // ========== LISTA DE USUARIOS ========== //

            // Pegando usuarios admin
            $usuarios = $this->objModelUsuario
                ->get(["nivel" => "admin"])
                ->fetchAll(\PDO::FETCH_OBJ);

            // Array de dados
            $dados = [
                "usuario" => $usuario,
                "usuarios" => $usuarios,
                "js" => [
                    "modulos" => ["Usuario"]
                ]
            ];

            // Carrega a view
            $this->view("painel/usuario/listar",$dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::listar()



    /**
     * Método responsável por montar a página inicial
     * do painel administrativo.
     * --------------------------------------------------------
     * @url painel/usuario/alterar/{id}
     * @method GET
     */
    public function alterar($id)
    {
        // Verifica a permissão do usuario
        // $usuario = $this->objHelperApoio->seguranca();
        $usuario->nivel = "admin";

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // ========== BUSCANDO O USUARIO ========== //
            $user = $this->objModelUsuario
                ->get(["id_usuario" => $id])
                ->fetch(\PDO::FETCH_OBJ);

            // Verificando se encontrou o usuario
            if (!empty($user))
            {
                // Array de dados
                $dados = [
                    "usuario" => $usuario,
                    "user" => $user,
                    "js" => [
                        "modulos" => ["Usuario"]
                    ]
                ];

                // Carrega a view
                $this->view("painel/usuario/editar",$dados);
            }
            else
            {
                // 404
                $this->view(ERRO_404);
            } // Error >> Usuário não existe
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::alterar()



    /**
     * Método responsável por montar a página inicial
     * do painel administrativo.
     * --------------------------------------------------------
     * @url painel/usuario/inserir
     * @method GET
     */
    public function inserir()
    {
        // Verifica a permissão do usuario
        // $usuario = $this->objHelperApoio->seguranca();
        $usuario->nivel = "admin";

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // Dados de exibição
            $dados = [
                "usuario" => $usuario,
                "js" => [
                    "modulos" => ["Usuario"]
                ]
            ];

            // Carrega a view
            $this->view("painel/usuario/cadastrar", $dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::usuarioCadastrar()



    /**
     * Método responsável por montar a página de associados
     * do painel administrativo.
     * --------------------------------------------------------
     * @url painel/associados
     * @method GET
     */
    public function associados()
    {
         // Verifica a permissão do usuario
         $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            $associados = $this->objModelUsuario
                ->get(['nivel' => 'associado'])
                ->fetchAll(\PDO::FETCH_OBJ);

            // Dados de exibição
            $dados = [
                "usuario" => $usuario,
                "associados" => $associados,
                "js" => [
                    "modulos" => ["Usuario"]
                ]
            ];

            // Carrega a view
            $this->view("painel/associados/listar", $dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::associados()



    /**
     * Método responsável por montar a página inicial
     * do painel administrativo.
     * --------------------------------------------------------
     * @url painel/associados/cadastrar
     * @method GET
     */
    public function associadosCadastrar()
    {
        // Verifica a permissão do usuario
        // $usuario = $this->objHelperApoio->seguranca();
        $usuario->nivel = "admin";

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {
            // Dados de exibição
            $dados = [
                "usuario" => $usuario,
                "js" => [
                    "modulos" => ["Usuario"]
                ]
            ];

            // Carrega a view
            $this->view("painel/associados/cadastrar", $dados);
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::associadosCadastrar()



    /**
     * Método responsável por montar a página inicial
     * do painel administrativo.
     * --------------------------------------------------------
     * @url painel/associados/cadastrar
     * @method GET
     */
    public function associadosEditar($id)
    {
        // Verifica a permissão do usuario
         $usuario = $this->objHelperApoio->seguranca();

        // Verifica se é admin
        if($usuario->nivel == "admin")
        {

            // ===== BUSCA O ASSOCIADO ===== //
            $buscaAssociado = $this->objModelUsuario
                ->get(['id_usuario' => $id])
                ->rowCount();

            if ($buscaAssociado == 1)
            {

                $associado = $this->objModelUsuario
                    ->get(['id_usuario' => $id])
                    ->fetch(\PDO::FETCH_OBJ);

                // Dados de exibição
                $dados = [
                    "usuario" => $usuario,
                    "associado" => $associado,
                    "js" => [
                        "modulos" => ["Usuario"]
                    ]
                ];

                // Carrega a view
                $this->view("painel/associados/editar", $dados);
            }
        }
        else
        {
            // 404
            $this->view(ERRO_404);
        } // Error >> Usuário sem permissão

    } // End >> fun::associadosEditar()



} // End >> Class::App\Usuario