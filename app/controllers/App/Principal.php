<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 26/03/2019
 * Time: 18:29
 */

namespace Controller\App;

use Helper\Apoio;
use Model\Categoria;
use Model\Promocao;
use Sistema\Controller as CI_controller;


class Principal extends CI_controller
{

    private $objHelperApoio;
    private $objModelUsuario;
    private $objModelPromocoes;
    private $objModelParceiros;
    private $objModelBanner;
    private $objModelCategoria;


    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        // Helpers
        $this->objHelperApoio = new Apoio();
    }


    /**
     * Método responsável por montar a tela
     * de inicio do site.
     * --------------------------------------------------------
     * @url /
     * @method GET
     */
    public function index()
    {
        // Instancoando os objetos
        $this->objModelParceiros = new \Model\Parceiro();
        $this->objModelPromocoes = new Promocao();
        $this->objModelBanner = new \Model\Banner();
        $this->objModelCategoria = new Categoria();

        $parceiros = $this->objModelParceiros
            ->get()
            ->fetchAll(\PDO::FETCH_OBJ);

        foreach ($parceiros as $parceiro)
        {
            // Montando a URL do banner
            $parceiro->url = BASE_STORAGE.'parceiro/'.$parceiro->arquivo;
        }


        $promocoes = $this->objModelPromocoes
            ->get(["status" => 'IN("ativo","cancelado")'], " status ASC, data_validade DESC, id_promocao DESC", "0,6")
            ->fetchAll(\PDO::FETCH_OBJ);

        foreach ($promocoes as $promo)
        {

            // Limitando a descrição
            $promo->descricao = substr($promo->descricao,0,100).'...';

            // Padrão moeda
            $promo->valor_antigo = number_format($promo->valor_antigo, 2, ",", ".");
            $promo->valor = number_format($promo->valor, 2, ",", ".");

            // Imagem do produto
            $promo->imagem = BASE_STORAGE.'promocao/'.$promo->imagem;

            // Busca categoria
            $categoria = $this->objModelCategoria
                ->get(['id_categoria' => $promo->id_categoria])
                ->fetch(\PDO::FETCH_OBJ);

            // Atribuindo a categoria
            $promo->categoria = $categoria->nome;
        }


        $banners = $this->objModelBanner
            ->get(["status" => true],"ordem ASC")
            ->fetchAll(\PDO::FETCH_OBJ);

        foreach ($banners as $banner)
        {
            // Montando a URL do banner
            $banner->url = BASE_STORAGE.'banner/'.$banner->arquivo;
        }


        // Array de dados
        $dados = [
            "parceiros" => $parceiros,
            "promocoes" => $promocoes,
            "banners" => $banners,
            "js" => [
                "modulos" => ["Newsletter"]
            ]
        ];

        // Carrega a view
       $this->view("site/index", $dados);
    }


    /**
     * Método responsável por montar a tela
     * de promocoes do site.
     * --------------------------------------------------------
     * @url promocoes
     * @method GET
     */
    public function promocoes($id = null)
    {

        // Instancoando os objetos
        $this->objModelPromocoes = new Promocao();
        $this->objModelUsuario = new \Model\Usuario();
        $this->objModelCategoria = new Categoria();
        $nomeCategoria = null;
        $where = ["status" => 'IN("ativo","cancelado")'];

        // URL
        $url = BASE_URL . "promocoes";

        if(!empty($id))
        {
            $where["id_categoria"] = $id;
            $url = $url . "/" . $id;

            $nomeCategoria = $this->objModelCategoria
                ->get(["id_categoria" => $id])
                ->fetch(\PDO::FETCH_OBJ);

            $nomeCategoria = $nomeCategoria->nome;
        }


        // Informações sobre paginação ---------------------------
        $pag = (isset($_GET["pag"])) ? $_GET["pag"] : 1;
        $limite = 24;

        // Atribui a variável inicio, o inicio de onde os registros vão ser mostrados
        // por página, exemplo 0 à 10, 11 à 20 e assim por diante
        $inicio = ($pag * $limite) - $limite;

        // Busca as promoções
        $promocoes = $this->objModelPromocoes
            ->get($where, "status ASC, data_validade DESC, id_promocao DESC", "{$inicio},{$limite}")
            ->fetchAll(\PDO::FETCH_OBJ);

        // Total de resultados
        $total = $this->objModelPromocoes
            ->get($where)
            ->rowCount();

        // Total de páginas
        $totalPaginas = $total / $limite;
        $totalPaginas = ceil($totalPaginas);



        foreach ($promocoes as $promo)
        {

            // Buscando a empresa
            $empresa = $this->objModelUsuario
                ->get(["id_usuario" => $promo->id_usuario])
                ->fetch(\PDO::FETCH_OBJ);

            // Atribuindo a empresa
            $promo->empresa = $empresa;

            // Limitando a descrição
            $promo->descricao = substr($promo->descricao,0,100).'...';
            $promo->nome = substr($promo->nome,0,30).'...';

            // Padrão moeda
            $promo->valor_antigo = number_format($promo->valor_antigo, 2, ",", ".");
            $promo->valor = number_format($promo->valor, 2, ",", ".");

            // Busca categoria
            $categoria = $this->objModelCategoria
                ->get(['id_categoria' => $promo->id_categoria])
                ->fetch(\PDO::FETCH_OBJ);

            // Atribuindo a categoria
            $promo->categoria = $categoria->nome;

            // Imagem do produto
            $promo->imagem = BASE_STORAGE.'promocao/'.$promo->imagem;
        }

        // Quantidade de promoções
        $qtdePromocoes = count($promocoes);

        // Array de dados
        $dados = [
            "nomeCategoria" => $nomeCategoria,
            "promocoes" => $promocoes,
            "qtdePromocoes" => $qtdePromocoes,
            "paginacao" => [
                "url" => $url,
                "pag" => $pag,
                "total" => $totalPaginas
            ],
        ];


        // Carrega a view
        $this->view("site/promocoes",$dados);
    }


    /**
     * Método responsável por montar a tela
     * de detalhes da promocoes do site.
     * --------------------------------------------------------
     * @url promocao-detalhes/{id}/{nome-do-produto}
     * @method GET
     */
    public function promocaoDetalhes($id)
    {
        // Instancoando os objetos
        $this->objModelPromocoes = new Promocao();
        $this->objModelUsuario = new \Model\Usuario();

        $buscaPromocao = $this->objModelPromocoes
            ->get(["id_promocao" => $id, "status" => "IN('ativo','cancelado')"]);


        if ($buscaPromocao->rowCount() == 1)
        {

            // Busca os dados da promoção
            $promocao = $buscaPromocao->fetch(\PDO::FETCH_OBJ);

            // Buscando a empresa
            $empresa = $this->objModelUsuario
                ->get(["id_usuario" => $promocao->id_usuario])
                ->fetch(\PDO::FETCH_OBJ);

            // Atribuindo a empresa
            $promocao->empresa = $empresa;

            // Padrão moeda
            $promocao->valor_antigo = number_format($promocao->valor_antigo, 2, ",", ".");
            $promocao->valor = number_format($promocao->valor, 2, ",", ".");

            // Imagem do produto
            $promocao->imagem = BASE_STORAGE.'promocao/'.$promocao->imagem;

            // Array de dados
            $dados = [
                "promocao" => $promocao,
            ];

            // Carrega a view
            $this->view("site/promocao-detalhes",$dados);
        }
        else
        {
            // Carrega a view
            $this->view("site/erro404");
        }
    }


    /**
     * Método responsável por montar a tela
     * de cadastro de um associado do site.
     * --------------------------------------------------------
     * @url cadastro
     * @method GET
     */
    public function cadastro()
    {
        $dados["js"] = [
            "modulos" => ["Usuario"]
        ];

        // Carrega a view
        $this->view("site/cadastro",$dados);
    }


    /**
     * Método responsável por montar a tela
     * de login.
     * --------------------------------------------------------
     * @url login
     * @method GET
     */
    public function login()
    {
        // Recupera os dados da sessao
        $user = (!empty($_SESSION["usuario"])) ? $_SESSION["usuario"] : null;

        // Verifica se existe session
        if(!empty($user))
        {
            // Redireciona para a página inicial
            header("Location: " . BASE_URL.'painel');
        }
        else
        {
            // Adiciona o conteudo
            $dados["js"] = [
                "modulos" => ["Usuario"]
            ];

            // Chama a view
            $this->view('site/login',$dados);

        } // USUARIO NÃO LOGADO

    } // End >> fun::login()


    /**
     * Método responsável por destruir a session do usuário e
     * enviar o mesmo para a tela de login.
     * -------------------------------------------------------
     * @url sair
     */
    public function sair()
    {
        // Destroi a session
        session_destroy();

        // Chama a página de sair
        $this->view("site/sair");

    } // End >> fun::sair();


    /**
     * Método responsável por montar a tela
     * de dashboard do painel admin e da empresa
     * --------------------------------------------------------
     * @url painel
     * @method GET
     */
    public function dashboard()
    {
        // Verificando o usuario
        $usuario = $this->objHelperApoio->seguranca();

        // Instanciado os objetos
        $this->objModelUsuario = new \Model\Usuario();
        $this->objModelPromocoes= new Promocao();

        // ===== CONTADORES DO ADMIN ===== //
        $qtdePromocoes = $this->objModelPromocoes
            ->get(['status' => 'ativo'])
            ->rowCount();

        $qtdeAssociados = $this->objModelUsuario
            ->get(['status' => true, 'nivel' => 'associado'])
            ->rowCount();


        // ===== CONTADORES DO CLIENTE ===== //
        $qtdePromocoesAtiva = $this->objModelPromocoes
            ->get(['status' => 'ativo', 'id_usuario' => $usuario->id_usuario])
            ->rowCount();

        $qtdePromocoesInativa = $this->objModelPromocoes
            ->get(['status' => 'cancelado', 'id_usuario' => $usuario->id_usuario])
            ->rowCount();

        // ===== LISTA DE ASSOCIADOS AINDA NÃO APROVADOS DO PAINEL ADMIN ===== //
        $associados = $this->objModelUsuario
            ->get(['status' => false, 'nivel' => 'associado'])
            ->fetchAll(\PDO::FETCH_OBJ);

        // ===== LISTA DE PROMOÇÕES DO PAINEL CLIENTE ===== //
        $promocoes = $this->objModelPromocoes
            ->get(['id_usuario' => $usuario->id_usuario])
            ->fetchAll(\PDO::FETCH_OBJ);

        foreach ($promocoes as $promocao)
        {
            // Padrão moeda
            $promocao->valor_antigo = number_format($promocao->valor_antigo, 2, ",", ".");
            $promocao->valor = number_format($promocao->valor, 2, ",", ".");
        }


        // Buscando os associados

        // Caso der certo o login
        $dados = [
            "usuario" => $usuario,
            "qtdePromocoes" => $qtdePromocoes,
            "qtdeAssociados" => $qtdeAssociados,
            "associados" => $associados,

            "promocoes" => $promocoes,
            "qtdePromocoesAtiva" => $qtdePromocoesAtiva,
            "qtdePromocoesInativa" => $qtdePromocoesInativa,
        ];

        if ($usuario->nivel == "admin")
        {
            // Adiciona as funções do usuario
            $dados["js"] = [
                "modulos" => ["Usuario"]
            ];

            $this->view("painel/dashboard",$dados);
        }
        else
        {
            // Adiciona as funções do associado
            $dados["js"] = [
                "modulos" => ["Promocoes"]
            ];

            $this->view("associado/dashboard",$dados);

        }

    }

    public function preVisualizar($id)
    {
        // Verificando o usuario
        $usuario = $this->objHelperApoio->seguranca();

        // Buscando a promoção
        $this->objModelPromocoes = new Promocao();
        $promocao = $this->objModelPromocoes->get(["id_promocao" => $id])->fetch(\PDO::FETCH_OBJ);

        // Verificando as permissões
        if (($usuario->nivel == "admin") || ($usuario->nivel == "associado" && $usuario->id_usuario == $promocao->id_usuario))
        {
            // Instanciando
            $this->objModelPromocoes = new Promocao();
            $this->objModelCategoria = new Categoria();
            $this->objModelUsuario = new \Model\Usuario();

            // Busca a categoria
            $cateogoria = $this->objModelCategoria->get(["id_categoria" => $promocao->id_categoria])->fetch(\PDO::FETCH_OBJ);

            // Busca o associado
            $associado = $this->objModelUsuario->get(["id_usuario" => $promocao->id_usuario])->fetch(\PDO::FETCH_OBJ);

            // Atribuindo os valores
            $promocao->categoria = $cateogoria;
            $promocao->associado = $associado;

            // Padrão moeda
            $promocao->valor_antigo = number_format($promocao->valor_antigo, 2, ",", ".");
            $promocao->valor = number_format($promocao->valor, 2, ",", ".");


            // Imagem da promocao
            $promocao->imagem = BASE_STORAGE.'promocao/'.$promocao->imagem;

            // Limitando a descrição
            $promocao->descricao = substr($promocao->descricao,0,100).'...';

            $dados = [
                "usuario" => $usuario,
                "promocao" => $promocao
            ];

            $this->view("site/pre-visualizar",$dados);
        }
        else
        {
            // Erro 404
            $this->view("site/erro404");

        }


    }

    public function politicaPrivacidade()
    {
        $this->view("site/politica-privacidade");
    }

    public function comoFunciona()
    {
        $this->view("site/como-funciona");
    }



} // END::Class Principal