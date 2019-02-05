<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 03/02/2019
 * Time: 17:04
 */

namespace DAO;

use Helpers\Conexao;
use Models\Produto;

class ProdutoDAO extends BaseDAO
{
    public function cadastraProduto($params = [])
    {
        $cod = $params['codigo'];
        $descricao = $params['descricao'];
        $preco = $params['preco'];
        $preco = str_replace(".", "", $preco);
        $preco = str_replace(",", ".", $preco);

        try
        {
            $con = $this->getConexao();
            $con->connect();
            $sql = "INSERT INTO PRODUTOS VALUES ($cod, '$descricao', $preco)";

            if ($con->query($sql))
                echo "sucesso";
            else
                echo "erro";
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            echo "erro";
        }
    }

    public function validaProduto($id)
    {
        $retorno = [];

        try {
            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT * FROM PRODUTOS WHERE CODIGO = $id";

            $res = $con->query($sql);

            foreach ($con->fetchAll($res) as $k => $v) {
                $produto = new Produto();
                $produto->setCodigo($v['codigo']);
                $produto->setDescricao($v['descricao']);
                $produto->setPreco($v['preco']);

                $retorno[] = $produto;
            }

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro !");
        } finally {
            if (!empty($retorno))
                echo 'sucesso';
            else
                echo 'erro';
        }
    }

    public function getProdutos($id = "") {

        $retorno = [];

        try {
            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT * FROM PRODUTOS";

            if ($id != "") {
                $sql .= " WHERE CODIGO = $id";
            }

            $res = $con->query($sql);

            foreach ($con->fetchAll($res) as $k => $v) {
                if ($id != "") {
                    $retorno['codigo'] = $v['codigo'];
                    $retorno['descricao'] = $v['descricao'];
                    $retorno['preco'] = $v['preco'];
                } else {
                    $produto = new Produto();
                    $produto->setCodigo($v['codigo']);
                    $produto->setDescricao($v['descricao']);
                    $produto->setPreco($v['preco']);

                    $retorno[] = $produto;
                }
            }

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro !");
        }

        return $retorno;
    }
}