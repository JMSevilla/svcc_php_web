<?php


class Params { 
    static $host = "localhost";
    static $username = "root";
    static $password = "";
    static $db = "dbcrud";
    static $helper;
    static $stmt;
}

class DatabaseConfiguration {
    public function connect() {
        try {
            $connectionString = "mysql:host=" . Params::$host . ";dbname=" . Params::$db;
            Params::$helper = new PDO($connectionString, Params::$username, Params::$password);
            Params::$helper->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return Params::$helper;
        } catch (PDOException $th) {
            die('Could not connect to the database' . $th->getMessage());
        }
    }

    public function php_prepare($sql) {
        return Params::$stmt = $this->connect()->prepare($sql);
    }

    public function php_dynamic_handlers($val, $params, $type = null) {
        if(is_null($type)){
            switch($type) {
                case 1 :
                    $type = PDO::PARAM_INT;
                    break;
                case 2:
                    $type = PDO::PARAM_BOOL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        return Params::$stmt->bindParam($val, $params, $type);
    } 

    public function execution(){
        return Params::$stmt->execute();
    }
}