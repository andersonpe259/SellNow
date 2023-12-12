<?php
require_once(__DIR__."/../Models/ProductsModel.php");
require_once(__DIR__."/../Procedures/BasePath.php");

class ProductsController{
    private $productsModel;
    private $basePath;
    public function __construct(){
        $this->productsModel = new ProductsModel();
        $bp = new BasePath();
        $this->basePath = $bp->basePath;
    }
    public function pagePrincipal(){
        $products = $this->productsModel->selectProducts();
        $basePath = $this->basePath;

        include(__DIR__."/../../Public/Pages/Principal.php");
    }
    public function pageCadastrar(){
        include(__DIR__."/../../Public/Pages/CadastrarProduto.php");
    }

    public function pageHistorico(){
        $sells = $this->productsModel->selectHistoric();

        include(__DIR__."/../../Public/Pages/Historico.php");
    }

    public function pageExcluir(){
        $products = $this->productsModel->selectProducts();

        include(__DIR__."/../../Public/Pages/ExcluirProduto.php");
    }

    public function registerProducts(){

        if(isset($_POST['name']) && isset($_POST['value']) && isset($_POST['information'])){
            $name = $_POST['name'];
            $value = $_POST['value'];
            $information = $_POST['information'];
            $img = __DIR__."/../../Resources/Img/generico.jpg";

            if(isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK){
                 $uploadDir = __DIR__."/../../Storage/Cover/";  // Diretório onde as imagens serão salvas
                 $uploadFile = $uploadDir . basename($_FILES["imagem"]["name"]);

                if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $uploadFile)) {
                    echo "Upload bem-sucedido. O arquivo foi salvo em: " . $uploadFile;
                    $img = $uploadFile;
                } else {
                    echo "Erro no upload.";
                }          
            }
    
            
            $this->productsModel->insertProduct($name, $value, $information, $img);

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

    public function deleteProduct(){
        if(isset($_POST['proId'])){
            $proId = $_POST['proId'];

            $this->productsModel->deleteProduct($proId);
            header('Location: Index.php?route=excluirproduto');
            return;
        }
    }

}
?>
