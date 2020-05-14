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

// Parceiro
$Rotas->group("api-parceiro","api/parceiro","Api\Parceiro");
$Rotas->onGroup("api-parceiro","GET","get","getAll");
$Rotas->onGroup("api-parceiro","GET","get/{p}","get");
$Rotas->onGroup("api-parceiro","POST","insert","insert");
$Rotas->onGroup("api-parceiro","PUT","update/{p}","update");
$Rotas->onGroup("api-parceiro","DELETE","delete/{p}","delete");

// Promocao
$Rotas->group("api-promocao","api/promocao","Api\Promocao");
$Rotas->onGroup("api-promocao","GET","get","getAll");
$Rotas->onGroup("api-promocao","GET","get/{p}","get");
$Rotas->onGroup("api-promocao","POST","insert","insert");
$Rotas->onGroup("api-promocao","PUT","update/{p}","update");
$Rotas->onGroup("api-promocao","DELETE","delete/{p}","delete");


/**
 *  ================================================
 *  =================== SITE ======================
 *  ================================================
 */

// -- Rotas sem grupo
$Rotas->on("GET","","App\Principal::index");

// -- Rotas sem grupo
$Rotas->on("GET","login","App\Principal::login");
$Rotas->on("GET","sair","App\Principal::sair");

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

// Páginas de associados
$Rotas->on("GET","painel/associados","App\Usuario::associados");
$Rotas->on("GET","painel/associado/inserir","App\Usuario::associadosCadastrar");
$Rotas->on("GET","painel/associado/alterar/{p}","App\Usuario::associadosEditar");

// Páginas de promocoes
$Rotas->on("GET","painel/promocoes","App\Promocoes::listar");
$Rotas->on("GET","painel/promocao/alterar/{p}","App\Promocoes::alterar");

// Páginas newsletter
$Rotas->on("GET","painel/newsletter","App\Newsletter::listar");

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