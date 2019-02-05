<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 04/02/2019
 * Time: 20:51
 */

include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";
$controller = new \Controllers\ProdutoController();
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: small; font-family: Calibri">
    <h3> Cupom Fiscal - Itens</h3>
    <thead>
    <tr>
        <td> Código do Produto</td>
        <td> Descrição</td>
        <td> Preço (R$)</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $listagem = $controller->getListagem();
    if (!$listagem) : ?>
        <tr>
            <td colspan="3">Nenhum item cadastrado</td>
        </tr>
    <?php
        else :
            foreach ($listagem as $produto) : ?>
                <tr>
                    <td><?= $produto->getCodigo(); ?></td>
                    <td><?= $produto->getDescricao(); ?></td>
                    <td>R$ <?= $produto->getPreco(); ?></td>
                </tr>
            <?php
            endforeach;
    endif; ?>
    </tbody>
</table>
