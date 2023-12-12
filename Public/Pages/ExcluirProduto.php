<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include (__DIR__."/../Layouts/Menu.php") ?>
    <h1>Excluir Produto</h1>

    <?php $varP = 0; ?>
    <?php if(!empty($products)): ?>
        <?php foreach($products as $product => $value): ?>
            <?php if($value['pro_active'] == 1): ?>
                <?php $varP += 1; ?>
                <div class="historico">
                    <h2>Nome: <?= $value['pro_name'] ?></h2>
                    <form action="Index.php?route=excluirproduto" method="post">
                        <input type="hidden" name="proId" value="<?= $value['pro_id'] ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>

    <?php if($varP == 0): ?>
        <h2>Sem Produtos</h2>
    <?php endif; ?>
</body>
</html>