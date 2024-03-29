import Global from "../global.js"


/**
 * Método responsável por receber os dados os dados
 * e solicitar um requisição para que seja feio o login
 * do usuário.
 * ---------------------------------------------------------
 */
$("#formLogin").on("submit", function () {

    // Não atualiza
    event.preventDefault();

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Bloqueia o formulário
    $(this).addClass("bloqueiaForm");

    // Dados de login
    var email = form.get("email");
    var senha = form.get("senha");

    // Realiza a requisição
    realizaLogin(email,senha)
        .then(function(data){

            // Salva a session
            Global.session.set("usuario", data.objeto.usuario);
            Global.session.set("token", data.objeto.token);

            // Avisa que deu certo
            alertify.success(data.mensagem);

            // Atualiza a página
            setTimeout(() => {

                // Manda para o painel
                location.href = Global.config.url + 'painel';

            }, 1000);
        });

    // Desbloqueia o formulário
    $(this).removeClass("bloqueiaForm");

    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por alterar a verificação de um
 * determinado usuário.
 * ----------------------------------------------------------
 */
$(".alteraStatusUsuario").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    // Busca as informações necessarias
    var id = $(this).data("id");
    var altera = $(this).data("tipo");

    // Instancia o formulário
    var form = new FormData();

    // Insere os dados
    form.set("status", altera);

    // Url e Token
    var url = Global.config.urlApi + "usuario/update/" + id;
    var token = Global.session.get("token");


    Swal.fire({
        title: 'Aterar status',
        text: "Deseja realmente aprovar o associado?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, aprovar!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {

            // Realiza a requisição
            Global.enviaApi("PUT", url, form, token.token)
                .then((data) => {

                    // Avisa que deu certo
                    Global.setSuccess("Associado aprovado");

                    // Atualiza a página
                    setTimeout(() => {

                        // Manda para o painel
                        location.href = Global.config.url + 'painel';

                    }, 1500);

                });

        }
    })

    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por cadastrar um determinádo usuário
 * enviado seus dados para a API correspndente.
 * ---------------------------------------------------------
 * @author igorcacerez
 */
$("#formUsuarioCadastro").on("submit", function(){

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Bloqueia o formulário
    $(this).addClass("bloqueiaForm");

    // Recupera o url
    var url = Global.config.urlApi + "usuario/insert";

    // Verifica se as senhas são iguais
    if(form.get("senha") === form.get("senha_repete"))
    {
        // Realiza a requisição
        Global.enviaApi("POST", url, form)
            .then((data) => {

                // Avisa que deu certo
                alertify.success(data.mensagem);

                // Limpa o formulário
                Global.limparFormulario("#formUsuarioCadastro");

                // Redireciona para o login
                // setTimeout(() => {
                //     location.href = Global.config.url + "login";
                // }, 2000);

            })
            .catch((error) => {
                // Desbloqueia o formulário
                $(this).removeClass("bloqueiaForm");
            });
    }
    else
    {
        // Msg
        Global.setError("Senhas informadas não são idênticas.");

        // Desbloqueia o formulário
        $(this).removeClass("bloqueiaForm");

    } // Error >> Senhas informadas não são idênticas.

    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por cadastrar um determinádo usuário
 * administrador, enviado seus dados para a API correspondente.
 * ---------------------------------------------------------
 * @author igorcacerez
 */
$("#formInserirUsuario").on("submit", function(){

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Bloqueia o formulário
    $(this).addClass("bloqueiaForm");

    // Recupera o url
    var url = Global.config.urlApi + "usuario/insert";
    var token = Global.session.get("token");

    // Verifica se as senhas são iguais
    if(form.get("senha") === form.get("senha_repete"))
    {
        // Realiza a requisição
        Global.enviaApi("POST", url, form, token.token)
            .then((data) => {

                // Avisa que deu certo
                Global.setSuccess(data.mensagem);

                // Limpa o formulário
                Global.limparFormulario("#formInserirUsuario");

                // Desbloqueia o formulário
                $(this).removeClass("bloqueiaForm");

            })
            .catch((error) => {
                // Desbloqueia o formulário
                $(this).removeClass("bloqueiaForm");
            });
    }
    else
    {
        // Msg
        Global.setError("Senhas informadas não são idênticas.");

        // Desbloqueia o formulário
        $(this).removeClass("bloqueiaForm");

    } // Error >> Senhas informadas não são idênticas.

    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por cadastrar um determinádo usuário
 * administrador, enviado seus dados para a API correspondente.
 * ---------------------------------------------------------
 * @author igorcacerez
 */
$("#formRecuperarSenha").on("submit", function(){

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Bloqueia o formulário
    $(this).addClass("bloqueiaForm");

    // Recupera o url
    var url = Global.config.urlApi + "usuario/recuperar-senha";

    // Realiza a requisição
    Global.enviaApi("POST", url, form, null)
        .then((data) => {

            // Avisa que deu certo
            Global.setSuccess(data.mensagem);

            // Limpa o formulário
            Global.limparFormulario("#formRecuperarSenha");

            // Desbloqueia o formulário
            $(this).removeClass("bloqueiaForm");

            // Atualiza a pagina
            setTimeout(function () {
                location.reload();
            },2000)

        })
        .catch((error) => {
            // Desbloqueia o formulário
            $(this).removeClass("bloqueiaForm");
        });

    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por receber os dados
 * e solicitar um requisição para que seja feito a
 * alteração de senha do usuário.
 * ---------------------------------------------------------
 */
$("#formNovaSenha").on("submit", function () {

    // Não atualiza
    event.preventDefault();

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Bloqueia o formulário
    $(this).addClass("bloqueiaForm");

    var url = Global.config.urlApi + "usuario/alterar-senha";

    // Verifica se as senhas são iguais
    if(form.get("senha") === form.get("senha_repete"))
    {
        // Realiza a requisição
        Global.enviaApi("POST", url, form, null, "alertify")
            .then((data) => {

                // Avisa que deu certo
                alertify.success("Senha alterada com sucesso, agora faça o login");

                // Limpa o formulário
                Global.limparFormulario("#formNovaSenha");

                // Redireciona para o login
                setTimeout(() => {
                    location.href = Global.config.url + "login";
                }, 2000);

            })
            .catch((error) => {
                // Desbloqueia o formulário
                $(this).removeClass("bloqueiaForm");
            });
    }
    else
    {
        // Msg
        alertify.error("Senhas informadas não são idênticas.");

        // Desbloqueia o formulário
        $(this).removeClass("bloqueiaForm");

    } // Error >> Senhas informadas não são idênticas.


    // Desbloqueia o formulário
    $(this).removeClass("bloqueiaForm");

    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por alterar as informações de um
 * determinado cliente. E enviar os dados via PUT
 * para a APi
 * ----------------------------------------------------------
 */
$("#formAlteraUsuario").on("submit", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados do formulário
    var form = new FormData(this);
    var id = $(this).data("id");
    var refresh = $(this).data("refresh");
    var tipoAlerta = $(this).data("alerta");

    // Bloqueia o formulário
    $(this).addClass("bloqueiaForm");

    // Monta a url
    var url = Global.config.urlApi + "usuario/update/" + id;

    // Recupera o token
    var token = Global.session.get("token");

    // Realiza a requisição
    Global.enviaApi("PUT", url, form, token.token, tipoAlerta)
        .then((data) => {

            // Verifica o alerta
            if(tipoAlerta === "swal")
            {
                Global.setSuccess(data.mensagem);
            }
            else
            {
                // Avisa que deu certo
                alertify.success(data.mensagem);
            }


            // Verifica se deve atualizar a página
            if(refresh === 1)
            {
                // Url
                url = Global.config.urlApi + "usuario/session-refresh";

                // Atualiza a session
                Global.enviaApi("POST", url, null, token.token)
                    .then((data) => {
                        // Salva a session
                        Global.session.set("usuario", data.objeto.usuario);
                    });
            }


            setTimeout(function () {
                location.reload();
            },2000)

            // Desbloqueia
            $(this).removeClass("bloqueiaForm");

        })
        .catch((error) => {
            // Desbloqueia
            $(this).removeClass("bloqueiaForm");
        });

    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por deletar uma determinada
 * categoria.Enviando a solicitação para a API
 * ----------------------------------------------------------
 */
$(".deletarUsuario").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera as informações
    var id = $(this).data("id");

    // Url e Token
    var url = Global.config.urlApi + "usuario/delete/" + id;
    var token = Global.session.get("token");

    // Pergunta se realmente quer deletar
    Swal.fire({
        title: 'Deletar o Usuário',
        text: 'Deseja realmente deletar esse usuário?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, delete!'
    }).then((result) => {
        if (result.value)
        {
            // Realiza a solicitação
            Global.enviaApi("DELETE", url, null, token.token)
                .then((data) => {

                    // Avisa que deu certo
                    Global.setSuccess(data.mensagem);

                    setTimeout(function () {
                        location.reload();
                    },1000)

                });
        }
    });


    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por deletar uma determinada
 * associado. Enviando a solicitação para a API
 * ----------------------------------------------------------
 */
$(".deletarAssociado").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera as informações
    var id = $(this).data("id");

    // Url e Token
    var url = Global.config.urlApi + "associado/delete/" + id;
    var token = Global.session.get("token");

    // Pergunta se realmente quer deletar
    Swal.fire({
        title: 'Deletar o Associado',
        text: 'Deseja realmente deletar esse associado?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, delete!'
    }).then((result) => {
        if (result.value)
        {
            // Realiza a solicitação
            Global.enviaApi("DELETE", url, null, token.token)
                .then((data) => {

                    // Avisa que deu certo
                    Global.setSuccess(data.mensagem);

                    // Remove da tabela
                    $('#datatable-buttons')
                        .DataTable()
                        .row("#tb_" + id)
                        .remove()
                        .draw(false);


                });
        }
    });


    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por realizar o login
 * --------------------------------------------------
 * @param user string
 * @param senha string
 * */
function realizaLogin(user, senha)
{
    return new Promise(function (resolve, reject) {

        // Configura o Header a ser enviado
        $.ajaxSetup({
            async: false,
            headers:{
                'Authorization': "Basic " + window.btoa(user + ":" + senha)
            }
        });

        // Faz o envio do post
        $.post(Global.config.urlApi + "usuario/login", null, (data) => {

            if(data.tipo === true)
            {
                resolve(data);
            }
            else
            {
                // Avisa que deu merda
                alertify.success(data.mensagem);

                reject(true);
            }

        }, "json");
    });

} // End >> Fun::realizaLogin()