<?php
$mensagem = "";
$valorFinanciado = 0;
$totalJuros = 0;
$valorParcela = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valorVeiculo = str_replace(",", ".", $_POST["valor_veiculo"]);
    $valorEntrada = str_replace(",", ".", $_POST["valor_entrada"]);
    $numeroParcelas = $_POST["numero_parcelas"];

    $valorVeiculo = (float) $valorVeiculo;
    $valorEntrada = (float) $valorEntrada;
    $numeroParcelas = (int) $numeroParcelas;

    // Verifica se os valores são válidos
    if ($valorVeiculo <= 0) {
        $mensagem = "Digite um valor válido para o veículo.";
    } elseif ($valorEntrada < $valorVeiculo * 0.20) {
        $mensagem = "A entrada precisa ser pelo menos 20% do valor do veículo.";
    } elseif ($valorEntrada >= $valorVeiculo) {
        $mensagem = "A entrada precisa ser menor que o valor do veículo.";
    } elseif (
        $numeroParcelas != 12 &&
        $numeroParcelas != 24 &&
        $numeroParcelas != 36 &&
        $numeroParcelas != 48 &&
        $numeroParcelas != 60
    ) {
        $mensagem = "Escolha uma quantidade de parcelas válida.";
    } else {
        // Faz os cálculos
        $valorFinanciado = $valorVeiculo - $valorEntrada;
        $totalJuros = $valorFinanciado * 0.015 * $numeroParcelas;
        $valorTotal = $valorFinanciado + $totalJuros;
        $valorParcela = $valorTotal / $numeroParcelas;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Financiamento de Veículo</title>
</head>
<body>

    <h1>Simulador de Financiamento</h1>

    <form method="post" action="ex04_financiamento.php">
        <label>Valor do veículo:</label><br>
        <input type="number" name="valor_veiculo" step="0.01" min="0" required>
        <br><br>

        <label>Valor da entrada:</label><br>
        <input type="number" name="valor_entrada" step="0.01" min="0" required>
        <br><br>

        <label>Número de parcelas:</label><br>
        <select name="numero_parcelas" required>
            <option value="">Escolha</option>
            <option value="12">12 parcelas</option>
            <option value="24">24 parcelas</option>
            <option value="36">36 parcelas</option>
            <option value="48">48 parcelas</option>
            <option value="60">60 parcelas</option>
        </select>
        <br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php if ($mensagem != "") { ?>
        <p><?php echo $mensagem; ?></p>
    <?php } ?>

    <?php if ($valorFinanciado > 0) { ?>
        <h2>Resultado</h2>

        <p>Valor financiado:
            R$ <?php echo number_format($valorFinanciado, 2, ",", "."); ?>
        </p>

        <p>Total de juros:
            R$ <?php echo number_format($totalJuros, 2, ",", "."); ?>
        </p>

        <p>Valor de cada parcela:
            R$ <?php echo number_format($valorParcela, 2, ",", "."); ?>
        </p>
    <?php } ?>

</body>
</html>