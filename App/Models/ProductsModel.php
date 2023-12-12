<?php
require_once (__DIR__."/../../Config/Factory/Model.php");

class ProductsModel extends Model {
    public function insertProduct($name, $value, $info) {

        $statement = $this->con->prepare($this->query->insertProduct[0]);

        $value = floatval($value);

        $statement->bindValue(1, $name, SQLITE3_TEXT);
        $statement->bindValue(2, $value, SQLITE3_FLOAT);
        $statement->bindValue(3, $info, SQLITE3_TEXT);

        // Executar a consulta
        $resultado = $statement->execute();

    }

    public function insertHistoric($proId, $total) {

        $statement = $this->con->prepare($this->query->insertHistoric[0]);

        $value = floatval($total);

        $statement->bindValue(1, $proId, SQLITE3_INTEGER);
        $statement->bindValue(2, $total, SQLITE3_FLOAT);
       

        // Executar a consulta
        $resultado = $statement->execute();

    }

    public function selectProducts(){
        $allProducts = $this->con->query($this->query->selectProducts[0]);

        $rows = array();
        $i = 0;

        while($row = $allProducts->fetchArray(SQLITE3_ASSOC)){
            $rows[$i] = $row;
            $i++;
        }

        return $rows;
    }

    public function selectHistoric(){
        $allSells = $this->con->query($this->query->selectHistoric[0]);

        $rows = array();
        $i = 0;

        while($row = $allSells->fetchArray(SQLITE3_ASSOC)){
            $rows[$i] = $row;
            $i++;
        }

        return $rows;
    }
}
?>
