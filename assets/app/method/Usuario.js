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
        text: "Deseja realmente alterar o status?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, alterar!'
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