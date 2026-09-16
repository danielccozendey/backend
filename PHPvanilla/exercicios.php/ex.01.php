<?php
 
$dividaAtual = 1000.00;
$categoriaCliente = 'B';
 
$taxaJuros = match ($categoriaCliente) {
    'A' => 0.01,
    'B' => 0.02,
    'C' => 0.03,
    default => 0.05,
};
 
echo "Categoria: $categoriaCliente | Taxa: " . ($taxaJuros * 100) . "%<br><br>";
 
for ($mes = 1; $mes <= 12; $mes++) {
 
    if ($mes === 6) {
        echo "Mês $mes: ISENTO DE JUROS (campanha do banco) - Saldo continua R$ " . number_format($dividaAtual, 2) . "<br>";
        continue;
    }
 
    $juros = $dividaAtual * $taxaJuros;
    $dividaAtual += $juros;
 
    echo "Mês $mes: Juros R$ " . number_format($juros, 2) . " | Saldo R$ " . number_format($dividaAtual, 2) . "<br>";
}
 