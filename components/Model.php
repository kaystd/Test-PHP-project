<?php

namespace components;


class Model
{
    public $pdo = null;
    public $table = "";
    public $fields = [];
    public $rules = [];

    public function __construct() {
        $this->pdo = DB::getInstance()->getPDO();
    }

    public function select($closure = []) {
        $query = "SELECT * FROM " . $this->table;

        if(!empty($closure["where"])) {
            $query .= " WHERE " . $closure["where"];
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }
}