import Global from "../global.js"


/**
 * Método responsável por deletar uma determinada
 * banner.Enviando a solicitação para a API
 */
$(".deletarBanner").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera as informações
    var id = $(this).data("id");

    // Url e Token
    var url = Global.config.urlApi + "banner/delete/" + id;
    var token = Global.session.get("token");

    // Pergunta se realmente quer deletar
    Swal.fire({
        title: 'Deletar Banner',
        text: 'Deseja realmente deletar esse banner?',
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

                    // Remove a visualização
                    $("#tb_" + id).css("display","none");

                });
        }
    });


    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por adicionar as informações no
 * modal e abrir o modal.
 */
$(".alterarBanner").on("click", function () {

    // Não atualiza
    event.preventDefault();

    // Recupera os dados
    var id = $(this).data("id");
    var ordem = $(this).data("ordem");
    var link = $(this).data("link");

    // Altera os campos do modal
    $("#inputOrdem").val(ordem);
    $("#inputLink").val(link);
    $("#inputId").val(id);

    // Abre o modal
    $('#modalAlteraBanner').modal("show");

    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por recuperar os dados do
 * formulário e realizar uma requisição para que os
 * dados sejam cadastrados no banco.
 */
$("#formInserirBanner").on("submit", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados importantes
    var form = new FormData(this);

    // Bloqueia o Form
    $(this).addClass("bloqueiaForm");

    // Url e token
    var url = Global.config.urlApi + "banner/insert";
    var token = Global.session.get("token");

    // Realiza a requisição
    Global.enviaApi("POST", url, form, token.token)
        .then((data) => {
            // Avisa que deu certo
            Global.setSuccess(data.mensagem);

            // Limpa o formulário
            Global.limparFormulario("#formInserirBanner");

            // Limpa o form
            $(".dropify-clear").trigger("click");

            // Desbloqueia o Form
            $(this).removeClass("bloqueiaForm");

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
$("#formAlteraBanner").on("submit", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados importantes
    var form = new FormData(this);
    var id = $("#inputId").val();

    // Bloqueia o Form
    $(this).addClass("bloqueiaForm");

    // Url e token
    var url = Global.config.urlApi + "banner/update/" + id;
    var token = Global.session.get("token");

    // Realiza a requisição
    Global.enviaApi("POST", url, form, token.token)
        .then((data) => {
            // Avisa que deu certo
            Global.setSuccess(data.mensagem);

            // Atualiza
            setTimeout(() => {
                location.href = window.location.href;
            }, 500);


        })
        .catch((error) => {
            // Desbloqueia o Form
            $(this).removeClass("bloqueiaForm");
        });

    // Não atualiza mesmo
    return false;
});