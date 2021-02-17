//Carrega categorias baseado no select de tipo de lançamento
$(document).ready(function() {
    $('#TIPO').change(function() {
        //$('#CATEGORIA').load('categ.php?acao=getcat&TIPO='+$('#TIPO').val());
        $('#CAT').load('categ.php?acao=getcat&TIPO=' + $('#TIPO').val());
        //console.log(TIPO);
    });
});

//puxa ID do lançamento para enviar no get do UPDATE dos lançamentos
$(document).on("click", "#btnEditar", function() {
    var id = $(this).attr('data-id');
    console.log(id);
    //var str = info.split('|');
    //var meuid = str[0];
    //var minhadata = str[1];
    $("#meuid").val(id);
    //$(".modal-body #minhadata").val(minhadata);
});

// Remover o div
$('#addLanc').on("click", ".remover_campo", function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
});