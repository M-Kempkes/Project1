<?php

define ('DB_HOST', '127.0.0.1');
define ('DB_NAME', 'project1');
define ('DB_USER', 'dbconnection');
define ('DB_PASS', 'DbConnected!');
define ('DB_CHARSET', 'utf8mb4');

class Database{
    protected $DB;
    protected $stmt;
    protected $options= [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    function __construct(){
        try {
            $this->DB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET, DB_USER, DB_PASS, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    function execute($sql, $values = []){
        try{
            $this->DB->prepare($sql)->execute($values);
            return $this->DB->lastInsertId();
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }
}