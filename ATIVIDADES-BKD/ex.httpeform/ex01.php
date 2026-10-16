<?php
// Catálogo mockado
$produtos = [
    ['nome' => 'Notebook Gamer',       'categoria' => 'Informática', 'preco' => 4599.90],
    ['nome' => 'Mouse sem fio',        'categoria' => 'Periféricos', 'preco' => 89.90],
    ['nome' => 'Teclado Mecânico',     'categoria' => 'Periféricos', 'preco' => 259.00],
    ['nome' => 'Monitor 24 polegadas', 'categoria' => 'Informática', 'preco' => 749.50],
    ['nome' => 'Headset Bluetooth',    'categoria' => 'Áudio',       'preco' => 199.99],
    ['nome' => 'Webcam Full HD',       'categoria' => 'Periféricos', 'preco' => 149.90],
];

// Leitura dos filtros
$nomeBusca  = trim($_GET['nome'] ?? '');
$precoBruto = trim($_GET['preco_maximo'] ?? '');

$temPreco = ($precoBruto !== '' && is_numeric($precoBruto));
$precoMax = $temPreco ? (float) $precoBruto : null;
$temNome  = ($nomeBusca !== '');

// Filtragem com array_filter
$resultado = $produtos;

if ($temNome || $temPreco) {
    $resultado = array_filter($produtos, function ($produto) use ($nomeBusca, $precoMax, $temNome, $temPreco) {
        $passouNome  = !$temNome  || mb_stripos($produto['nome'], $nomeBusca) !== false;
        $passouPreco = !$temPreco || $produto['preco'] <= $precoMax;
        return $passouNome && $passouPreco;
    });
}

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Produtos</title>
</head>
<body>
    <h1>Buscador de Produtos</h1>

    <form method="GET" action="ex01_busca_produtos.php">
        <label>Nome do produto
            <input type="text" name="nome" value="<?= e($nomeBusca) ?>">
        </label>
        <label>Preço máximo (R$)
            <input type="number" name="preco_maximo" min="0" step="0.01" value="<?= e($precoBruto) ?>">
        </label>
        <button type="submit">Buscar</button>
        <a href="ex01_busca_produtos.php">Limpar</a>
    </form>

    <p><strong><?= count($resultado) ?></strong> produto(s) encontrado(s).</p>

    <?php if (empty($resultado)): ?>
        <p>Nenhum produto corresponde aos filtros informados.</p>
    <?php else: ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr><th>Nome</th><th>Categoria</th><th>Preço</th></tr>
            <?php foreach ($resultado as $produto): ?>
                <tr>
                    <td><?= e($produto['nome']) ?></td>
                    <td><?= e($produto['categoria']) ?></td>
                    <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>



