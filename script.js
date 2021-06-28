$(function () {

    $(".btnFiltro").on("click", function () {
        filtro();
    });

    $(".btnGravar").on("click", function () {
        var especie = $("#especie").val()
        var status = $("#status").val()
        if (especie == "Humanoid" && status == "") {
            alert("O status é obrigatório!");
            header("Location: filtro.php");
        } else {
           
        }
    });

    $("#tabela input").keyup(function () {
        var nth = "#tabela td:nth-child(" + (2).toString() + ")";
        var valor = $(this).val().toUpperCase();
        $("#tabela tbody tr").show();
        $(nth).each(function () {
            if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                $(this).parent().hide();
            }
        });
    });
    $("#tabela input").blur(function () {
        $(this).val("");
    });

});

function filtro() {
    $(location).attr('href', 'filtro.php');
}

function novo() {
    $(location).attr('href', 'index.php');
}
























