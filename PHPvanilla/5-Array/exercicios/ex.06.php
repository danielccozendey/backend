
<?php

$extrato = [
    ["data"=>"01/09/2026","descricao"=>"Salário","tipo"=>"Entrada","valor"=>4000],
    ["data"=>"02/09/2026","descricao"=>"Supermercado","tipo"=>"Saida","valor"=>450.50],
    ["data"=>"05/09/2026","descricao"=>"Pix João","tipo"=>"Entrada","valor"=>200],
    ["data"=>"10/09/2026","descricao"=>"Conta de Luz","tipo"=>"Saida","valor"=>120],
    ["data"=>"12/09/2026","descricao"=>"Cinema","tipo"=>"Saida","valor"=>65]
];

$entrada = 0;
$saida = 0;

foreach ($extrato as $item) {
    if ($item["tipo"] == "Entrada") $entrada += $item["valor"];
    else $saida += $item["valor"];
}

$saldo = $entrada - $saida;

echo "<h1>Dashboard Financeiro</h1>";

echo "<p>Entradas: R$ " . number_format($entrada,2,",",".") . "</p>";
echo "<p>Saídas: R$ " . number_format($saida,2,",",".") . "</p>";

if ($saldo < 0)
    echo "<p style='color:red'>Saldo: R$ " . number_format($saldo,2,",",".") . "</p>";
else
    echo "<p style='color:green'>Saldo: R$ " . number_format($saldo,2,",",".") . "</p>";

echo "<h2>Extrato</h2>";

foreach ($extrato as $item) {
    echo $item["data"] . " - " . $item["descricao"] . " - R$ " .
         number_format($item["valor"],2,",",".") . "<br>";
}

?>
```
