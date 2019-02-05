<?php

namespace Controllers;

use DAO\ProdutoDAO;

class ProdutoController {

    public function getListagem()
    {
        $dao = new ProdutoDAO();
        return $dao->getProdutos();
    }

    public function validaProduto($id)
    {
        $dao = new ProdutoDAO();
        return $dao->validaProduto($id);
    }

    public function getProduto($id)
    {
        $dao = new ProdutoDAO();
        return $dao->getProdutos($id);

    }

    public function insertProduto($params = [])
    {
        $dao = new ProdutoDAO();
        return $dao->cadastraProduto($params);
    }
}