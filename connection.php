<?php

class Connection {

    public function connect() {
        try {
            $pdo = new PDO('mysql:host=200.29.117.69;dbname=cupos_icbf;charset=utf8', 'icbf_app', 'Lpuhd48j77aR7I%', array(PDO::ATTR_PERSISTENT => true));
            //$pdo = new PDO('mysql:host=localhost;dbname=cupos_icbf;charset=utf8', 'root', '', array(PDO::ATTR_PERSISTENT => true));
            return $pdo;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}
