<?php
$produtos = [
    ['id' => 1, 'nome' => 'iPhone 15', 'categoria' => 'Smartphone', 'preco' => 6500.00],
    ['id' => 2, 'nome' => 'Galaxy S24', 'categoria' => 'Smartphone', 'preco' => 5400.00],
    ['id' => 3, 'nome' => 'MacBook Air', 'categoria' => 'Notebook', 'preco' => 8900.00],
    ['id' => 4, 'nome' => 'Monitor Dell 27', 'categoria' => 'Perifericos', 'preco' => 1200.00],
    ['id' => 5, 'nome' => 'Mouse Logitech', 'categoria' => 'Perifericos', 'preco' => 450.00],
];

$smartphones = array_filter($produtos, fn($p) => $p['categoria'] === 'Smartphone');

$smartphonesComDesconto = array_map(function($p) {
    $p['preco'] *= 0.85;
    return $p;
}, 
$smartphones);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Vitrine TechSenai</title>
    <style>
        .card { background:#fff; border-radius:8px; padding:15px; margin:10px; width:250px; display:inline-block; }
        .preco { color:#27ae60; font-weight:bold; }
    </style>
</head>
<body>
    <h2>Smartphones (15% OFF)</h2>
    <?php foreach ($smartphonesComDesconto as $p): ?>
        <div class="card">
            <span><?= $p['categoria'] ?></span>
            <h3><?= $p['nome'] ?></h3>
            <p class="preco">R$ <?= number_format($p['preco'], 2, ',', '.') ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>


