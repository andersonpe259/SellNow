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
    <div class="container">
        <h1>Histórico</h1>
        <?php if(!empty($sells)): ?>
            <?php $total = 0; ?>
            <?php foreach($sells as $sell => $value): ?>
                <?php $total += $value['his_total']; ?>
            <?php endforeach; ?>
            <h2>Total vendido: R$ <?= $total ?> </h2>
        <?php endif; ?>
        
        <div class="history-container">
            <?php if(!empty($sells)): ?>
                <?php foreach($sells as $sell => $value): ?>
                    <div class="historico-card">
                        <h2>Nome: <?= $value['pro_name'] ?></h2>
                        <p>Total: R$ <?= $value['his_total'] ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h2>Sem vendas</h2>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
