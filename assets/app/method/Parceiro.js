import Global from "../global.js"


/**
 * Método responsável por deletar uma determinada
 * categoria.Enviando a solicitação para a API
 */
$(".deletarParceiro").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera as informações
    var id = $(this).data("id");

    // Url e Token
    var url = Global.config.urlApi + "parceiro/delete/" + id;
    var token = Global.session.get("token");

    // Pergunta se realmente quer deletar
    Swal.fire({
        title: 'Deletar Parceiro',
        text: 'Deseja realmente deletar essa parceiro?',
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
                    $("#tb_" + id).css("display", "none");
                });
        }
    });


    // Não atualiza mesmo
    return false;
});



/**
 * Método responsável por recuperar os dados do
 * formulário e realizar uma requisição para que os
 * dados sejam cadastrados no banco.
 */
$("#formInserirParceiro").on("submit", function () {

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados importantes
    var form = new FormData(this);

    // Bloqueia o Form
    $(this).addClass("bloqueiaForm");

    // Url e token
    var url = Global.config.urlApi + "parceiro/insert";
    var token = Global.session.get("token");

    // Realiza a requisição
    Global.enviaApi("POST", url, form, token.token)
        .then((data) => {
            // Avisa que deu certo
            Global.setSuccess(data.mensagem);

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