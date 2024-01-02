<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/Style.css">
    <title>SellNow</title>
</head>
<body>
    <?php include (__DIR__."/../Layouts/Menu.php") ?>
   <center> <h1>Cadastrar Produto</h1>
    <div class="formulario">
          <form action="Index.php?route=cadastrarproduto" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label >Nome do Produto:</label>
                <center><input type="text" name="name" id="name"></center>
              </div>
              <div class="mb-3">
                <label >VALOR POR KG:</label>
              <center><input type="number" id="value" name="value" step="0.01" required></center>
              </div>
              <div class="mb-3">
                <label >INFORMAÇÕES:</label>
              <center><input type="text" name="information" id="information"></center>
              </div>

              <label for="imagem">Escolha uma imagem:</label>
                <input type="file" name="imagem" id="imagem" accept="image/*">
                <br>
              <center><button type="submit">Adicionar</button></center>
            </form>
          </div>
</body>
</html>