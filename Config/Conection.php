<?php
// Defina o nome do banco de dados SQLite
require_once (__DIR__."/../Database/Querys.php");

class Conection {

    private $database_name = __DIR__.'/../Database/Database.sqlite';
    public $conect;

    public function __construct() {
           $this->conect = new SQLite3($this->database_name);
            $querys = new Querys();
            $mainTables = $this->conect->query($querys->verify[0]);

            $var = 0;

            while($row = $mainTables->fetchArray(SQLITE3_ASSOC)){
                $var = $row["COUNT(*)"];
            }

             if($var == 0){
                $this->createTables();
             }
    }

    private function createTables() {
        $querys = new Querys();
        $createTableQueries = explode(';', $querys->createTable[0]);

        foreach ($createTableQueries as $query) {
            if (!empty(trim($query))) {
                $this->conect->query($query);
            }
        }
    }

}

?>