<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 03/02/2019
 * Time: 20:15
 */
include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

?>

<div class="container">

    <div class="container-fluid">
        <h1> PDV - Ponto de Venda</h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: small; font-family: Calibri">
            <thead>
            <tr>
                <th> Código do Produto</th>
                <th> Descrição</th>
                <th> Preço (R$)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>   <input type="text" id="codigo" placeholder="Digite o código do produto" maxlength="10" onblur="validaCodigoProduto();"></th>
                <th>   <input type="text" id="descricao" disabled></th>
                <th>R$ <input type="text" id="valor" disabled></th>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-2">
                <button onclick="cadastrarProduto();" class="btn btn-success" id="btnVender" disabled>Vender</button>
                <button onclick="perguntaCampos();" class="btn btn-danger" id="btnAnula">Anula</button>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="listagem_venda"></div>

</div>

<script>
    $( document ).ready(function() {
        $('#listagem_venda').load('view/vendas/listagem_venda.php');
    });

    function validaCodigoProduto() {

        var codigo = $('#codigo').val();

        if (codigo != "") {
            var url = "../app/router.php";

            $.ajax({
                "url": url,
                "type": 'POST',
                "data": {
                    acao: 'consulta',
                    codigo: codigo
                }
            }).done(function (resp) {
                if (resp == 'erro') {
                    bootbox.alert("Produto não cadastrado.");
                    $('#codigo').css('border', '1px solid red');
                    $("#codigo").val("");
                    $("#descricao").val("");
                    $("#valor").val("");
                    $("#btnVender").attr("disabled", true);
                } else if (resp == 'sucesso') {
                    $('#codigo').css('border', '1px solid green');
                    $("#btnVender").attr("disabled", false);
                    buscaProduto(codigo);
                }


                //limpaCampos();
            }).fail(function (resp) {
            });
        }
    }

    function buscaProduto(codigo) {
        var url = "../app/router.php";

        $.ajax({
            "url": url,
            "type": 'POST',
            "dataType": 'json',
            "data": {
                acao: 'buscaItem',
                codigo: codigo
            }
        }).done(function (resp) {
            $('#descricao').val(resp.descricao);
            $('#valor').val(resp.preco);

        }).fail(function (resp) {

        });
    }

    function perguntaCampos() {

        bootbox.confirm({
            message: "Deseja cancelar a operação ?",
            buttons: {
                confirm: {
                    label: 'Sim',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Não',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {

                if (result) {
                    limpaCampos();
                }

            }
        });
    }
    function limpaCampos() {
        $("#codigo").val("");
        $("#descricao").val("");
        $("#valor").val("");
    }

</script>