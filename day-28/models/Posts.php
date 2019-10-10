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

    public function set_title($title)
    {
        $this->title = $title;
    }

    public function get_body()
    {
        return $this->body;
    }

    public function set_body($body)
    {
        $this->body = $body;
    }

    public function get_author()
    {
        return $this->author;
    }

    public function set_author($author)
    {
        $this->author = $author;
    }

    public function get_category_id()
    {
        return $this->category_id;
    }

    public function set_category_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function get_category_name()
    {
        return $this->category_name;
    }

    public function create()
    {
        $query = 'INSERT INTO '.$this->table.'
            (`title`,`author`,`body`,`category_id`) value(:title,:author,:body,:category_id)
        ';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // Bind ID
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':category_id', $this->category_id);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n ", $stmt->error);

        return false;
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

    public function update()
    {
        $query = 'UPDATE '.$this->table.'
          SET
            `title` = :title,
            `author` = :author,
            `body` = :body,
            `category_id` = :category_id
          WHERE 
            `id` = :id
        ';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // Bind ID
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n ", $stmt->error);

        return false;
    }

    public function Delete()
    {
        $query = 'DELETE FROM '.$this->table.'
            WHERE id = :id
        ';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        //Bind Data
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n ", $stmt->error);

        return false;
    }
}

?> 
