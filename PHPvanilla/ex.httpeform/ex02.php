<?php
// ex02_calculadora_imc.php
// Calculadora de IMC interativa (método POST)

/**
 * Calcula o IMC (peso / altura²), arredondado para 2 casas.
 */
function calcularIMC(float $peso, float $altura): float
{
    return round($peso / ($altura ** 2), 2);
}

/**
 * Classifica o IMC segundo as faixas da OMS.
 */
function classificarIMC(float $imc): string
{
    if ($imc < 18.5) {
        return 'Abaixo do peso';
    } elseif ($imc < 25) {
        return 'Peso normal';
    } elseif ($imc < 30) {
        return 'Sobrepeso';
    } elseif ($imc < 35) {
        return 'Obesidade grau I';
    } elseif ($imc < 40) {
        return 'Obesidade grau II';
    }
    return 'Obesidade grau III';
}

// Define a cor do resultado: verde (normal), amarelo (sobrepeso), vermelho (obesidade)
function classeCss(string $classificacao): string
{
    if ($classificacao === 'Peso normal') {
        return 'normal';
    } elseif ($classificacao === 'Sobrepeso') {
        return 'sobrepeso';
    } elseif (str_starts_with($classificacao, 'Obesidade')) {
        return 'obesidade';
    }
    return 'abaixo';
}

// Escapa a saída (proteção contra XSS)
function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

// ---------------------------------------------------------------
// Leitura dos dados (?? evita Warning na primeira carga da página)
// ---------------------------------------------------------------
$nome       = trim($_POST['nome'] ?? '');
$pesoBruto  = trim($_POST['peso'] ?? '');
$alturaBruta = trim($_POST['altura'] ?? '');

$erros     = [];
$imc       = null;
$categoria = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Aceita vírgula como separador decimal (ex.: 1,75)
    $peso   = filter_var(str_replace(',', '.', $pesoBruto),   FILTER_VALIDATE_FLOAT);
    $altura = filter_var(str_replace(',', '.', $alturaBruta), FILTER_VALIDATE_FLOAT);

    // Validação do nome
    if ($nome === '') {
        $erros[] = 'Informe o seu nome.';
    } elseif (mb_strlen($nome) > 100) {
        $erros[] = 'O nome deve ter no máximo 100 caracteres.';
    }

    // Validação do peso: float positivo entre 20 e 300
    if ($peso === false || $peso < 20 || $peso > 300) {
        $erros[] = 'O peso deve ser um número entre 20 e 300 kg.';
    }

    // Validação da altura: float positivo entre 0.5 e 2.5
    if ($altura === false || $altura < 0.5 || $altura > 2.5) {
        $erros[] = 'A altura deve ser um número entre 0,5 e 2,5 m.';
    }

    // Só calcula se não houver nenhum erro
    if (empty($erros)) {
        $imc       = calcularIMC($peso, $altura);
        $categoria = classificarIMC($imc);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 480px; margin: 30px auto; padding: 0 15px; color: #222; }
        form { display: flex; flex-direction: column; gap: 14px; }
        label { display: flex; flex-direction: column; font-size: 14px; gap: 4px; }
        input { padding: 9px; border: 1px solid #bbb; border-radius: 4px; font-size: 15px; }
        button { padding: 10px; border: 0; border-radius: 4px; background: #2563eb; color: #fff; font-size: 15px; cursor: pointer; }
        .erros { background: #fee2e2; border-left: 4px solid #dc2626; padding: 10px 14px; margin-bottom: 18px; border-radius: 4px; }
        .erros ul { margin: 0; padding-left: 18px; }
        .resultado { margin-top: 24px; padding: 18px; border-radius: 6px; text-align: center; }
        .resultado .valor { font-size: 38px; font-weight: bold; margin: 6px 0; }
        .normal    { background: #dcfce7; color: #166534; border: 1px solid #22c55e; }
        .sobrepeso { background: #fef9c3; color: #854d0e; border: 1px solid #eab308; }
        .obesidade { background: #fee2e2; color: #991b1b; border: 1px solid #ef4444; }
        .abaixo    { background: #dbeafe; color: #1e40af; border: 1px solid #3b82f6; }
    </style>
</head>
<body>

    <h1>Calculadora de IMC</h1>

    <?php if (!empty($erros)): ?>
        <div class="erros">
            <ul>
                <?php foreach ($erros as $erro): ?>
                    <li><?= e($erro) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Formulário POST com campos sticky -->
    <form method="POST" action="ex02_calculadora_imc.php">
        <label>
            Nome
            <input type="text" name="nome" value="<?= e($nome) ?>">
        </label>

        <label>
            Peso (kg)
            <input type="text" name="peso" inputmode="decimal" placeholder="Ex.: 70.5" value="<?= e($pesoBruto) ?>">
        </label>

        <label>
            Altura (m)
            <input type="text" name="altura" inputmode="decimal" placeholder="Ex.: 1.75" value="<?= e($alturaBruta) ?>">
        </label>

        <button type="submit">Calcular IMC</button>
    </form>

    <?php if ($imc !== null): ?>
        <div class="resultado <?= classeCss($categoria) ?>">
            <p><?= e($nome) ?>, o seu IMC é:</p>
            <div class="valor"><?= number_format($imc, 2, ',', '.') ?></div>
            <strong><?= e($categoria) ?></strong>
        </div>
    <?php endif; ?>

</body>
</html>