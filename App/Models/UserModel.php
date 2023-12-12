<?php
require_once (__DIR__."/../../Config/Factory/Model.php");
class UserModel extends Model{
    public function selectUsers(){
        $allUsers = $this->con->query($this->query->userQuerys[0]);

        $listUsers = array(
            "users" => [],
            "passwords" => []
        );

        while($row = $allUsers->fetchArray(SQLITE3_ASSOC)){
            array_push($listUsers["users"], $row["use_user"]);
            array_push($listUsers["passwords"], $row["use_password"]);
        }

        return $listUsers;
    }
}