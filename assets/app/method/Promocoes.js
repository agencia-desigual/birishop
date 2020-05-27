import Global from "../global.js"


/**
 * Método responsável por deletar uma determinada
 * promocão. Enviando a solicitação para a API
 */
$(".deletarPromocao").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera as informações
    var id = $(this).data("id");

    // Url e Token
    var url = Global.config.urlApi + "promocao/delete/" + id;
    var token = Global.session.get("token");

    // Pergunta se realmente quer deletar
    Swal.fire({
        title: 'Deletar Promoção',
        text: 'Deseja realmente deletar essa promoção?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!'
    }).then((result) => {
        if (result.value)
        {
            // Realiza a solicitação
            Global.enviaApi("DELETE", url, null, token.token)
                .then((data) => {

                    // Avisa que deu certo
                    Global.setSuccess(data.mensagem);

                    // Remove a visualização
                    $("#promocao_" + id).css("display","none");

                    setTimeout(function () {
                        location.href = Global.config.url + "painel/promocoes";
                    },2000)

                });
        }
    });


    // Não atualiza mesmo
    return false;
});


/**
 * Método responsável por cadastrar os dados de
 * uma promoção e realizar uma requisição para que os
 * dados sejam cadastrados no banco.
 */
$("#formInserirPromocao").on("submit", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados importantes
    var form = new FormData(this);

    // Bloqueia o Form
    $(this).addClass("bloqueiaForm");

    // Url e token
    var url = Global.config.urlApi + "promocao/insert";
    var token = Global.session.get("token");

    // Realiza a requisição
    Global.enviaApi("POST", url, form, token.token)
        .then((data) => {
            // Avisa que deu certo
            Global.setSuccess("Veja como está seu anuncio, antes de publicar");

            // Limpa o formulário
            Global.limparFormulario("#formInserirPromocao");

            // Limpa o form
            $(".dropify-clear").trigger("click");

            // Desbloqueia o Form
            $(this).removeClass("bloqueiaForm");

            setTimeout(function () {

                location.href = Global.config.url + 'pre-visualizar/'+data.objeto.id_promocao;

            },2000);

        })
        .catch((error) => {
            // Desbloqueia o Form
            $(this).removeClass("bloqueiaForm");
        });

    // Não atualiza mesmo
    return false;
});


/**
 * Método responsável por recuperar os dados do
 * formulário e realizar uma requisição para que os
 * dados sejam atualizado no banco.
 */
$("#formAlteraPromocao").on("submit", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados importantes
    var form = new FormData(this);
    var id = $("#inputId").val();

    // Bloqueia o Form
    $(this).addClass("bloqueiaForm");

    // Url e token
    var url = Global.config.urlApi + "promocao/update/" + id;
    var token = Global.session.get("token");

    // Realiza a requisição
    Global.enviaApi("POST", url, form, token.token)
        .then((data) => {
            // Avisa que deu certo
            Global.setSuccess(data.mensagem);

            // Atualiza
            setTimeout(() => {
                location.reload();
            }, 2000);


        })
        .catch((error) => {
            // Desbloqueia o Form
            $(this).removeClass("bloqueiaForm");
        });

    // Não atualiza mesmo
    return false;
});


/**
 * Método responsável por alterar a verificação de um
 * determinado usuário.
 * ----------------------------------------------------------
 */
$(".pausarAnuncio").on("click", function () {

    // Busca as informações necessarias
    var id = $(this).data("id");

    // Instancia o formulário
    var form = new FormData();

    // Insere os dados
    form.set("status", "cancelado");

    // Url e Token
    var url = Global.config.urlApi + "promocao/pausar-anuncio/" + id;
    var token = Global.session.get("token");

    Swal.fire({
        title: 'Aterar status',
        text: "Deseja realmente pausar o anúncio?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, pausar!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {

            // Realiza a requisição
            Global.enviaApi("POST", url, form, token.token)
                .then((data) => {

                    // Avisa que deu certo
                    Global.setSuccess("Anúncio pausado");

                    // Atualiza a página
                    setTimeout(() => {

                        // Manda para o painel
                        location.reload();

                    }, 1500);

                });

        }
    })

    // Não atualiza mesmo
    return false;
});

$(".btn-whats").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    // Remove e limpa os input
    $(".input-link").val("");
    $(".input-whats").val("");

    $(".input-link").css("display","none");
    $(".input-whats").css("display","inline-flex");

    // Remove os btn
    $(".btn-whats").css("display","none");
    $(".btn-link").css("display","inline-flex");

    // Não atualiza mesmo
    return false;
});

$(".btn-link").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    // Remove e limpa os input
    $(".input-link").val("");
    $(".input-whats").val("");

    $(".input-link").css("display","inline-flex");
    $(".input-whats").css("display","none");

    // Remove os btn
    $(".btn-whats").css("display","inline-flex");
    $(".btn-link").css("display","none");

    // Não atualiza mesmo
    return false;
});