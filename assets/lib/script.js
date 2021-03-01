//Carrega categorias baseado no select de tipo de lançamento
/*$(document).ready(function() {
    $('#TIPO').change(function() {
        //$('#CATEGORIA').load('categ.php?acao=getcat&TIPO='+$('#TIPO').val());
        $('#CAT').load('categ.php?acao=getcat&TIPO=' + $('#TIPO').val());7
        //console.log(TIPO);
    });
});
*/


//Carrega categorias baseado no select de tipo de lançamento usando AJAX e JSON
$(document).ready(function() {
    $('#TIPO').change(function(e) {
        //$('#CATEGORIA').load('categ.php?acao=getcat&TIPO='+$('#TIPO').val());
        //$('#CAT').load('categ.php?acao=getcat&TIPO=' + $('#TIPO').val());
        //console.log($('#TIPO').val());

        $.getJSON('categ.php?acao=getcat&TIPO=' + $('#TIPO').val(), function(dados) {
            //console.log(dados);

            if (dados.length > 0) {
                var option = '<option>........Selecione...........</option>';
                $.each(dados, function(i, obj) {
                    option += '<option value="' + obj.ID + '">' + obj.DESCRICAO + '</option>';
                });
            }
            $('#CAT').html(option).show();
        });
    });

    function Reset() {
        $('#TIPO').empty().append('<option>........Selecione...........</option>>');
    }

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

        $.getJSON('../controller/LancController.class.php?acao=listLanc&ID=' + id, function(dados) {
            console.log(dados);

            console.log(dados.VALOR);

            $("#VALOR").attr('value', dados.VALOR);
            $("#DESCRICAO").val(dados.DESCRICAO);
            $("#VENCIMENTO").attr('value', dados.DT_VENC);
            if (dados.TIPO == 'E') {
                dados.TIPO = 'ENTRADA';
            } else {
                dados.TIPO = 'SAIDA';
            }
            $("#TIPO").val(dados.TIPO).change();
            $("#CAT").val(dados.CAT).change();

            $.getJSON('categ.php?acao=getcat&TIPO=' + $('#TIPO').val(), function(dados) {
                //console.log(dados);

                if (dados.length > 0) {
                    var option = '<option>........Selecione...........</option>';
                    $.each(dados, function(i, obj) {
                        option += '<option value="' + obj.ID + '">' + obj.DESCRICAO + '</option>';
                    });
                }
                $('#CAT').html(option).show();
            });
            /*
            if (dados.length > 0) {
                var option = '<option>........Selecione...........</option>';
                $.each(dados, function(i, obj) {
                    var descricao = $("#DESCRICAO").attr('value', obj.DESCRICAO);

                    //option += '<option value="' + obj.ID + '">' + obj.DESCRICAO + '</option>';
                });
            }
            $('#CAT').html(descricao).show();
            */
        });
        //console.log(id);
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