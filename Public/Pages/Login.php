<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/Style.css">
    <title>SellNow</title>
</head>
<body>
    <div class="container">
        <div class="formulario">
            <form action="Index.php?route=login" method="post" class="login-form">
                <h1 class="title">Login no <span>SellNow</span></h1>
                <div class="form-group">
                    <label for="user">EMAIL</label>
                    <input type="text" name="user" id="user" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">SENHA</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn-login">Logar</button>
            </form>
        </div>
    </div>
</body>
</html>
