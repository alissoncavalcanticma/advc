//Carrega categorias baseado no select de tipo de lançamento
$(document).ready(function() {
    $('#TIPO').change(function() {
        //$('#CATEGORIA').load('categ.php?acao=getcat&TIPO='+$('#TIPO').val());
        $('#CAT').load('categ.php?acao=getcat&TIPO=' + $('#TIPO').val());
        //console.log(TIPO);
    });
});

//puxa ID do lançamento para enviar no get do UPDATE dos lançamentos
$(document).on("click", "#addLanc", function() {
    //var id = $(this).attr('data-id');

    //var str = info.split('|');
    //var meuid = str[0];
    //var minhadata = str[1];
    //$("#myid").val(id);
    //$(".modal-body #minhadata").val(minhadata);
    //var input_id = "<input type='text' class='form-control' name='meuid' id='meuid'>";
    //$("#myid").attr('name', 'ID');
    //$("#myid").attr('value', id);
    $("#acao").attr('value', 'insert');
    $("#idLanc").removeAttr('name');
    $("#idLanc").removeAttr('value');
});

//puxa ID do lançamento para enviar no get do UPDATE dos lançamentos
$(document).on("click", "#btnEditar", function() {
    var id = $(this).attr('data-id');

    //var str = info.split('|');
    //var meuid = str[0];
    //var minhadata = str[1];
    $("#acao").attr('value', 'edit');
    $("#idLanc").val(id);
    //$(".modal-body #minhadata").val(minhadata);
    //var input_id = "<input type='text' class='form-control' name='meuid' id='meuid'>";
    $("#idLanc").attr('name', 'ID');
    $("#idLanc").attr('value', id);
    //console.log(id);
});