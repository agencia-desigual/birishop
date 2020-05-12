<?php

// Erro 404
$Rotas->onError("404", "App\Principal::error404");

/**
 *  ================================================
 *  ====================  API  =====================
 *  ================================================
 */

// Usuário
$Rotas->group("api-usuario","api/usuario","Api\Usuario");
$Rotas->onGroup("api-usuario","GET","get","getAll");
$Rotas->onGroup("api-usuario","GET","get/{p}","get");
$Rotas->onGroup("api-usuario","POST","login","login");
$Rotas->onGroup("api-usuario","POST","session-refresh","sessionRefresh");
$Rotas->onGroup("api-usuario","POST","insert","insert");
$Rotas->onGroup("api-usuario","PUT","update/{p}","update");
$Rotas->onGroup("api-usuario","DELETE","delete/{p}","delete");
$Rotas->onGroup("api-usuario","POST","alterar-senha","alterarSenha");
$Rotas->onGroup("api-usuario","POST","recuperar-senha","recuperarSenha");

// NewsLatter
$Rotas->group("api-newslatter","api/newslatter","Api\Newslatter");
$Rotas->onGroup("api-newslatter","GET","get","getAll");
$Rotas->onGroup("api-newslatter","GET","get/{p}","get");
$Rotas->onGroup("api-newslatter","POST","insert","insert");
$Rotas->onGroup("api-newslatter","DELETE","delete/{p}/{p}","delete");

// Banner
$Rotas->group("api-banner","api/banner","Api\Banner");
$Rotas->onGroup("api-banner","GET","get","getAll");
$Rotas->onGroup("api-banner","GET","get/{p}","get");
$Rotas->onGroup("api-banner","POST","insert","insert");
$Rotas->onGroup("api-banner","PUT","update/{p}","update");
$Rotas->onGroup("api-banner","DELETE","delete/{p}","delete");

// Associado
$Rotas->group("api-associado","api/associado","Api\Associado");
$Rotas->onGroup("api-associado","GET","get","getAll");
$Rotas->onGroup("api-associado","GET","get/{p}","get");
$Rotas->onGroup("api-associado","POST","insert","insert");
$Rotas->onGroup("api-associado","PUT","update/{p}","update");
$Rotas->onGroup("api-associado","DELETE","delete/{p}","delete");

// -- Seta os grupos
//$Rotas->group("Principal","api","Principal");

// -- Rotas de Grupos
//$Rotas->onGroup("Principal","GET","a","index");

// -- Rotas sem grupo
$Rotas->on("GET","","App\Principal::index");

// -- Rotas sem grupo
$Rotas->on("GET","login","App\Principal::login");

// -- Rotas sem grupo
$Rotas->on("GET","promocoes","App\Principal::promocoes");

// -- Rotas sem grupo
$Rotas->on("GET","promocao-detalhes","App\Principal::promocaoDetalhes");

// -- Rotas sem grupo
$Rotas->on("GET","cadastro","App\Principal::cadastro");


/**
 *  ================================================
 *  =================== PAINEL =====================
 *  ================================================
 */

// Páginas de dashboard
$Rotas->on("GET","painel","App\Principal::dashboard");

// Páginas de cliente
$Rotas->on("GET","painel/clientes","App\Cliente::clientes");
$Rotas->on("GET","painel/cliente/{p}","App\Cliente::clientes");

// Páginas produto
$Rotas->on("GET","painel/produtos","App\Produto::listar");
$Rotas->on("GET","painel/produto/alterar/{p}/{p}","App\Produto::alterar");
$Rotas->on("GET","painel/produto/alterar/{p}","App\Produto::alterar");
$Rotas->on("GET","painel/produto/inserir","App\Produto::inserir");

// Páginas pedidos
$Rotas->on("GET","painel/pedidos","App\Pedidos::listar");
$Rotas->on("GET","painel/pedido/{p}","App\Pedidos::detalhes");

// Páginas categoria
$Rotas->on("GET","painel/categorias","App\Categoria::listar");
$Rotas->on("GET","painel/categoria/alterar/{p}","App\Categoria::alterar");
$Rotas->on("GET","painel/categoria/inserir","App\Categoria::inserir");

// Páginas cores
$Rotas->on("GET","painel/cores","App\Cor::listar");
$Rotas->on("GET","painel/cor/alterar/{p}","App\Cor::alterar");
$Rotas->on("GET","painel/cor/inserir","App\Cor::inserir");

// Páginas tamanhos
$Rotas->on("GET","painel/tamanhos","App\Tamanho::listar");
$Rotas->on("GET","painel/tamanho/alterar/{p}","App\Tamanho::alterar");
$Rotas->on("GET","painel/tamanho/inserir","App\Tamanho::inserir");

// Páginas banners
$Rotas->on("GET","painel/banners","App\Banner::listar");
$Rotas->on("GET","painel/banner/inserir","App\Banner::inserir");

// Páginas parceiros
$Rotas->on("GET","painel/parceiros","App\Parceiro::listar");
$Rotas->on("GET","painel/parceiro/inserir","App\Parceiro::inserir");

// Páginas usuario
$Rotas->on("GET","painel/usuarios","App\Usuario::listar");
$Rotas->on("GET","painel/usuario/alterar/{p}","App\Usuario::alterar");
$Rotas->on("GET","painel/usuario/inserir","App\Usuario::inserir");