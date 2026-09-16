<?php
$erro = ""; $vv = $ve = $np = ""; $fin = $jur = $parc = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vv = (float) str_replace(',', '.', $_POST['valor_veiculo']);
    $ve = (float) str_replace(',', '.', $_POST['valor_entrada']);
    $np = (int) $_POST['numero_parcelas'];

    if ($vv <= 0 || $ve < 0) $erro = "Valores inválidos.";
    elseif (!in_array($np, [12,24,36,48,60])) $erro = "Parcela inválida.";
    elseif ($ve < $vv * 0.2) $erro = "Entrada deve ser no mínimo 20% do veículo.";

    if (!$erro) {
        $fin = $vv - $ve;
        $jur = $fin * 0.015 * $np;
        $parc = ($fin + $jur) / $np;
    }
}
function real($v){ return "R$ " . number_format($v, 2, ',', '.'); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Financiamento</title></head>
<body>
<h1>Simulador de Financiamento</h1>

<?php if ($erro): ?><p style="color:red;"><?= $erro ?></p><?php endif; ?>

<form method="POST">
    Valor do Veículo (R$): <input name="valor_veiculo" value="<?= htmlspecialchars($vv) ?>"><br><br>
    Valor de Entrada (R$): <input name="valor_entrada" value="<?= htmlspecialchars($ve) ?>"><br><br>
    Parcelas:
    <select name="numero_parcelas">
        <option value="">Selecione</option>
        <?php foreach ([12,24,36,48,60] as $o): ?>
            <option value="<?= $o ?>" <?= $np == $o ? 'selected' : '' ?>><?= $o ?>x</option>
        <?php endforeach; ?>
    </select><br><br>
    <button type="submit">Simular</button>
</form>

<?php if ($fin !== null): ?>
    <h2>Memória de Cálculo</h2>
    <p>Valor Financiado: <?= real($fin) ?></p>
    <p>Total de Juros: <?= real($jur) ?></p>
    <p>Valor da Parcela: <?= real($parc) ?></p>
<?php endif; ?>
</body>
</html>




