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
        <h1>Página Principal</h1>

        <?php $varP = 0; ?>
        <?php if(!empty($products)):?>
        <?php foreach($products as $product => $value): ?>
            <?php if($value['pro_active'] == 1): ?>
                <?php $varP += 1; ?>
                <div class="product-card" style="background-image: url('<?= $basePath ?><?= $value['pro_cover'] ?>');">
                    <div class="product-info">
                        
                            <h2><?= $value['pro_name'] ?></h2>
                            <p><?= $value['pro_info'] ?></p>
                     
                    </div>
                    <div class="product-actions">
                        <form action="Index.php?route=principal" method="post">
                            <label for="valor<?= $value['pro_id'] ?>">Quantidade em peso(Kg):</label>
                            <input type="number" id="pesoP<?= $value['pro_id'] ?>" name="valor" step="0.01" required>
                            <input type="hidden" id="valorP<?= $value['pro_id'] ?>" name="valorP" value="<?= $value['pro_value'] ?>">
                            <label for="resultado<?= $value['pro_id'] ?>">Valor total a pagar(R$):</label>
                            <input type="text" id="resultado<?= $value['pro_id'] ?>" readonly value="" name="total">
                            <input type="hidden" name="proId" value="<?= $value['pro_id'] ?>">
                            <button type="button" onclick="calcularPeso(<?= $value['pro_id'] ?>)">Calcular</button>
                            <button type="submit">Confirmar</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>

        <?php if($varP == 0): ?>
            <h2>Sem produtos Cadastrados</h2>
        <?php endif; ?>
    </div>

    <script>
        const acaiButton = document.getElementById('acaiButton');
        const acaiModal = document.getElementById('acaiModal');

        acaiButton.addEventListener('click', abrirModal);

        function abrirModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'flex';
        }

        function fecharModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'none';
        }

        function calcularPeso(idComplemento) {
            const valor = parseFloat(document.getElementById('pesoP'+idComplemento).value);
            const multiplicador =  document.getElementById('valorP'+idComplemento).value;
            
            if (!isNaN(valor)) {
                const resultado = valor * multiplicador;
                document.getElementById('resultado'+idComplemento).value = resultado;
            }else{
                document.getElementById('resultado'+idComplemento).value = 'Adicione o Peso Primeiro';
            }
        }

    </script>
</body>
</html>
