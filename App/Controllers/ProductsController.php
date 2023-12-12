<?php
require_once(__DIR__."/../Models/ProductsModel.php");

class ProductsController{
    private $productsModel;
    public function __construct(){
        $this->productsModel = new ProductsModel();
    }
    public function pagePrincipal(){
        $products = $this->productsModel->selectProducts();

        include(__DIR__."/../../Public/Pages/Principal.php");
    }
    public function pageCadastrar(){
        include(__DIR__."/../../Public/Pages/CadastrarProduto.php");
    }
    public function registerProduct(){
        
        include(__DIR__."/../../Public/Pages/CadastrarProduto.php");
    }

    public function pageHistorico(){
        $sells = $this->productsModel->selectHistoric();

        include(__DIR__."/../../Public/Pages/Historico.php");
    }

    public function pageExcluir(){
        include(__DIR__."/../../Public/Pages/ExcluirProduto.php");
    }

    public function registerProducts(){

        if(isset($_POST['name']) && isset($_POST['value']) && isset($_POST['information'])){
            $name = $_POST['name'];
            $value = $_POST['value'];
            $information = $_POST['information'];

            $this->productsModel->insertProduct($name, $value, $information);

            header('Location: Index.php?route=principal');
            return;
        }
    }

    public function registerHistoric(){

        if(isset($_POST['proId']) && isset($_POST['total'])){
            $proId = $_POST['proId'];
            $total = $_POST['total'];

            $this->productsModel->insertHistoric($proId, $total);


        header('Location: Index.php?route=principal');
        return;
    }


}
}
?>
