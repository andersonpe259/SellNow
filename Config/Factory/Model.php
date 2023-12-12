<?php
require_once (__DIR__."/../Conection.php");
require_once (__DIR__."/../../Database/Querys.php");

class Model{

    public $con;

    public $query;

    public function __construct(){
        $conection = new Conection();
        $this->con = $conection->conect;

        $this->query = new Querys();
        
    }
}