<?php 


class Connection {

    public static function make(){

        try {
            return new PDO("mysql:host=127.0.0.1;dbname=mytodoapp", "root", "");
        } catch (PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        
        }
        
    }
}