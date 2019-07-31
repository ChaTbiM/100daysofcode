<?php

require 'functions.php';

// $animals = ['dog','cat'] ;


// dd(['horse','lion','car?']);

// 

class Task{

    public $description;    
    
    protected $completed = false;

    public function __construct($description){
        $this->description = $description;
    }

    public function isComplete(){
        return $this->completed;
    }

    public function complete(){
        $this->completed = true;
    }

}

$tasks = [
    new Task('go to the store and buy...'),
    new Task('learn php'),
    new Task('learn Mysql'),
    new Task('learn Laravel '),
];

$tasks[0]->complete();

require 'classes.view.php';


