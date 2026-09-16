<?php
// ex02_calculadora_imc.php - Calculadora de IMC (POST)

$nome   = trim($_POST["nome"] ?? "");
$peso   = $_POST["peso"] ?? "";
$altura = $_POST["altura"] ?? "";
$erro = "";
$imc = null;
$classificacao = "";
$cor = "";

function calcularIMC(float $peso, float $altura): float {
    return round($peso / ($altura * $altura), 2);
}

function classificarIMC(float $imc): string {
    if ($imc < 18.5) return "Abaixo do peso";
    if ($imc < 25)   return "Peso normal";
    if ($imc < 30)   return "Sobrepeso";
    return "Obesidade";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($nome === "") {
        $erro = "Informe o nome.";
    } elseif (!is_numeric($peso) || $peso < 20 || $peso > 300) {
        $erro = "Peso invalido (20 a 300 kg).";
    } elseif (!is_numeric($altura) || $altura < 0.5 || $altura > 2.5) {
        $erro = "Altura invalida (0.5 a 2.5 m).";
    } else {
        $imc = calcularIMC((float) $peso, (float) $altura);
        $classificacao = classificarIMC($imc);
        $cor = $classificacao === "Peso normal" ? "verde" : ($classificacao === "Sobrepeso" ? "amarelo" : "vermelho");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
    <style>
        .verde    { background: #d4edda; color: #155724; padding: 15px; border-radius: 6px; }
        .amarelo  { background: #fff3cd; color: #856404; padding: 15px; border-radius: 6px; }
        .vermelho { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 6px; }
        .erro     { color: red; font-weight: bold; }
    </style>
</head>
<body>

<h1>Calculadora de IMC</h1>

<form method="POST" action="ex02_calculadora_imc.php">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>"><br><br>

    <label>Peso (kg):</label><br>
    <input type="text" name="peso" value="<?php echo htmlspecialchars($peso); ?>"><br><br>

    <label>Altura (m):</label><br>
    <input type="text" name="altura" value="<?php echo htmlspecialchars($altura); ?>"><br><br>

    <button type="submit">Calcular</button>
</form>

<hr>

<?php if ($erro !== ""): ?>
    <p class="erro"><?php echo htmlspecialchars($erro); ?></p>
<?php elseif ($imc !== null): ?>
    <div class="<?php echo $cor; ?>">
        <p>Nome: <?php echo htmlspecialchars($nome); ?></p>
        <p>IMC: <?php echo $imc; ?></p>
        <p>Classificacao: <?php echo $classificacao; ?></p>
    </div>
<?php endif; ?>

</body>
</html>