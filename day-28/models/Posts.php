<?php

class Posts
{
    private $conn;
    private $table = 'posts';

    private $id;
    private $author;
    private $title;
    private $body;
    private $categoy_name;
    private $categoy_id;
    private $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        // QUERy
        $query = 'SELECT 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.author,
            p.body,
            p.created_at 
        FROM '.$this->table.' p 
        LEFT JOIN 
            categories c ON p.category_id = c.id
        ORDER BY
            p.created_at DESC';

        //PRepare statement
        $stmt = $this->conn->prepare($query);
        //execute statement
        $stmt->execute();

        return $stmt;
    }
}

?> ;
