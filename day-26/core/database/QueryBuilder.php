<?php 

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function selectAll($table){
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table , $paramaeters){
        $sql = sprintf(
            'insert into %s (%s) value (%s)',
            $table ,
             implode(', ', array_keys($paramaeters)) ,
             ':' . implode(', :' , array_keys($paramaeters))
        );

        try{

            $statement = $this->pdo->prepare($sql);
    
            $statement->execute($paramaeters);

        }catch(Exception $e){
            die('Whoops , something went wrong');
        }


        
        
    }

}