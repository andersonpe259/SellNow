<?php

require_once (__DIR__."/App/Controllers/UserController.php");
require_once (__DIR__."/App/Controllers/ProductsController.php");

// error_reporting(0);
// ini_set('display_errors', 0);

$userController = new UserController();
$productsController = new ProductsController();

$route = $_GET['route'] ?? 'login';

switch ($route) {
    case 'login':  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userController->validateLogin();
      } else {
        $userController->pageLogin();
      }
      break;

    case 'principal':  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productsController->registerHistoric();
        } else {
            $productsController->pagePrincipal();
        }
        break;
    case 'cadastrarproduto':  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productsController->registerProducts();
        } else {
            $productsController->pageCadastrar();
        }
        break;
    case 'excluirproduto':  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productsController->deleteProduct();
        } else {
            $productsController->pageExcluir();
        }
        break;
    case 'historico':  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $productsController->();
        } else {
            $productsController->pageHistorico();
        }
        break;
    
        
}
?>