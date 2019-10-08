<?php

class Post
{
    private $id;
    private $title;
    private $conn;
    private $table = 'posts';
    private $author;
    private $body;
    private $categoy_name;
    private $categoy_id;
    private $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function get_body()
    {
        return $this->body;
    }

    public function get_author()
    {
        return $this->author;
    }

    public function get_category_id()
    {
        return $this->category_id;
    }

    public function get_category_name()
    {
        return $this->category_name;
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
            p.created_at DESC
            ';

        //PRepare statement
        $stmt = $this->conn->prepare($query);
        //execute statement
        $stmt->execute();

        return $stmt;
    }

    public function read_single()
    {
        // QUERy
        $query = 'SELECT 
            c.name as category_name,
            p.category_id,
            p.id,
            p.title,
            p.author,
            p.body,
            p.created_at 
        FROM '.$this->table.' p 
        LEFT JOIN 
            categories c ON p.category_id = c.id
        WHERE
            p.id = ?
        LIMIT 0,1';

        //PRepare statement
        $stmt = $this->conn->prepare($query);
        // Bind ID
        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->title = $row['title'];
        $this->author = $row['author'];
        $this->body = $row['body'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }
}

?> 
