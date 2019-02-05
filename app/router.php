<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 04/02/2019
 * Time: 15:34
 */

include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar') {

    $controller = new \Controllers\ProdutoController();
    return $controller->insertProduto($_POST);
}

if (isset($_POST['acao']) && $_POST['acao'] == 'consulta') {

    $controller = new \Controllers\ProdutoController();
    $codigo = isset($_POST['codigo']) && !empty($_POST['codigo']) ? $_POST['codigo'] : '';

    return $controller->validaProduto($codigo);
}

if (isset($_POST['acao']) && $_POST['acao'] == 'buscaItem') {

    $controller = new \Controllers\ProdutoController();
    $codigo = isset($_POST['codigo']) && !empty($_POST['codigo']) ? $_POST['codigo'] : '';

    echo json_encode($controller->getProduto($codigo));
}