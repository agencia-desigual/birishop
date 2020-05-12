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