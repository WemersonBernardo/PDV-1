<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 03/02/2019
 * Time: 17:05
 */

namespace DAO;

use Helpers\Conexao;

abstract class BaseDAO
{
    protected function getConexao() {

        $con = \Helpers\Registry::getValue("Conexao", null);

        if ($con == null)
        {
            $con = new \Helpers\Conexao([
                "host"=>'localhost',
                "user"=>'root',
                "pass"=>'10',
                "database"=>'pdv']);
            \Helpers\Registry::setValue("Conexao", $con);

        }
        return $con;
    }
}