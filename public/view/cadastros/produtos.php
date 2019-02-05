<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 03/02/2019
 * Time: 21:48
 */

include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

?>

<div class="container">

    <div class="container-fluid">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: small; font-family: Calibri">
            <h1> Cadastro de Produtos</h1>
            <!--thead>
            <tr>
                <th> Código do Produto</th>
                <th> Descrição</th>
                <th> Preço (R$)</th>
            </tr>
            </thead-->
            <tbody>
            <tr>
                <th>
                    <label for="codigo"><h3> Código</h3></label>
                    <input type="text" id="codigo" placeholder="Digite o código do produto" class="dinheiro form-control" style="display:inline-block" onkeyup="formataCodigo();"/>
                </th>
                <th>
                    <label for="descricao"><h3> Descrição</h3></label>
                    <input type="text" id="descricao" placeholder="Digite uma descrição" class="dinheiro form-control" style="display:inline-block"/>
                </th>
                <th>
                    <label for="dinheiro"><h3> Valor, em R$</h3></label>
                    <input type="text" id="valor" name="valor" class="valor form-control" style="display:inline-block" onkeyup="formatarMoeda();"/>
                </th>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-2">
                <button onclick="cadastrarProduto();" class="btn btn-success" value="">Salvar</button>
                <button onclick="perguntaCampos();" class="btn btn-danger"  value="">Limpar</button>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="listagem_produtos"></div>

</div>

<script>

    $( document ).ready(function() {
        $('#listagem_produtos').load('view/cadastros/listagem_produtos.php');
    });

    function formataCodigo() {

        var elemento = document.getElementById('codigo');

        var valor = elemento.value;
        valor = parseInt(valor.replace(/[\D]+/g,''));
        if (isNaN(valor))
            elemento.value = '';
        else
            elemento.value = valor;

    }

    function formatarMoeda(){
        var elemento = document.getElementById('valor');

        var valor = elemento.value;

        valor = valor + '';
        valor = parseInt(valor.replace(/[\D]+/g,''));
        valor = valor + '';
        valor = valor.replace(/([0-9]{2})$/g, ",$1");

        if (valor.length > 6) {
            valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        }

        elemento.value = valor;

    }

/*
    function validaPreco() {
        var x = document.getElementById("valor").value;

        if
        document.getElementById("valor").innerHTML = x;
    }
*/
    function perguntaCampos() {

        bootbox.confirm({
            message: "Deseja limpar todos os campos de cadastro ?",
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

    function cadastrarProduto() {

        var codigo = $("#codigo").val();
        var descricao = $("#descricao").val();
        var preco = $("#valor").val();

        if (codigo == "") {
            bootbox.alert("Campo <b>Código</b> não informado.");
        }
        else if (descricao == "") {
            bootbox.alert("Campo <b>Descrição</b> não informado.");
        }
        else if (preco == "") {
            bootbox.alert("Campo <b>Preço</b> não informado.");
        }
        else {
            bootbox.confirm({
                message: "Confirma o cadastro do produto <b>" + descricao + "</b> ?",
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
                        var url = "../app/router.php";

                        $.ajax({
                            "url": url,
                            "type": 'POST',
                            "data": {
                                acao: 'cadastrar',
                                codigo: codigo,
                                descricao: descricao,
                                preco: preco
                            }
                        }).done(function (resp) {
                            if (resp == "erro")
                                bootbox.alert("Item <b>" + descricao + "</b> não pôde ser cadastrado.");
                            if (resp == "sucesso")
                                bootbox.alert("Item <b>" + descricao + "</b> cadastrado com sucesso.");

                            $('#listagem_produtos').load('view/cadastros/listagem_produtos.php');
                            limpaCampos();
                        }).fail(function (resp) {
                            //bootbox.alert("Item <b>" + descricao + "</b> não pôde ser cadastrado.");
                        });
                    }

                }
            });
        }
    }
</script>