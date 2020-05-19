import Global from "../global.js"


/**
 * Método responsável por cadastrar um determinádo usuário
 * enviado seus dados para a API correspndente.
 * ---------------------------------------------------------
 * @author igorcacerez
 */
$("#formNewslleter").on("submit", function(){

    // Não atualiza a página
    event.preventDefault();

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Bloqueia o formulário
    $(this).addClass("bloqueiaForm");

    // Recupera o url
    var url = Global.config.urlApi + "newsletter/insert";

    // Realiza a requisição
    Global.enviaApi("POST", url, form, null, 'alertify')
        .then((data) => {

            // Avisa que deu certo
            alertify.success(data.mensagem);

            // Limpa o formulário
            Global.limparFormulario("#formNewslleter");

        })
        .catch((error) => {
            // Desbloqueia o formulário
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
$(".input-newslleter").on("click", function () {

    // Não atualiza a página
    event.preventDefault();

    var texto = $(".input-newslleter").val();

    if (texto == "seu melhor email")
    {
        $(".input-newslleter").val("");
    }

    // Não atualiza mesmo
    return false;
});