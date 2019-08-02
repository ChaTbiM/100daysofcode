<?php 


class Connection {

    public static function make($config){
        try {
            // return new PDO("mysql:host=127.0.0.1;dbname=mytodoapp",'root','');

            return new PDO($config['connection'].";dbname=".$config['name'],
            $config['userName'],
            $config['password'],
            $config['options']);

        } catch (PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        
        }
        
    }

}