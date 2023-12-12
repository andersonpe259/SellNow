<?php
require_once(__DIR__."/../Models/UserModel.php");

class UserController{
    private $userModel;
    private $user;
    private $password;

    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function pageLogin(){
        include(__DIR__."/../../Public/Pages/Login.php");
    }

    public function validateLogin(){
        
        if(isset($_POST['user']) && isset($_POST['password'])){
            $this->user = $_POST['user'];
            $this->password = $_POST['password'];

            $list = $this->userModel->selectUsers();
            $authenticated = false;

            foreach ($list['users'] as $index => $user) {
                $password = $list['passwords'][$index];
                if($this->user == $user && $this->password == $password){
                    $authenticated = true;
                    break;
                }
            }

            if($authenticated){
                header('Location: Index.php?route=principal');
            } else {
                header('Location: Index.php?route=login');
            }
            return;
        }
    }
}
?>
