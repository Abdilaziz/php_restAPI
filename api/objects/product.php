<?php

class Product{

    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;

    private $rowCount;

    public function __construct($db){
        $this->conn = $db;
        $this->rowCount = 0;
    }

    function read() {

        $query = "SELECT 
                    c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                            categories c
                                ON p.category_id = c.id
                    ORDER BY
                        p.created DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $this->rowCount = $stmt->rowCount();

        return $stmt;

    }

    public function getRowCount() {
        return $this->rowCount;
    }

}

?>