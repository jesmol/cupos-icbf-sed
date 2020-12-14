<?php

require_once 'connection.php';

class QueryIcbf extends Connection
{
    public function getStudent($uid)
    {
        $stmt = Connection::connect()->prepare(""
            . "SELECT * "
            . "FROM main "
            . "WHERE numeroDocumentoBeneficiario = :uid");
        $stmt->bindParam(":uid", $uid, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
}
