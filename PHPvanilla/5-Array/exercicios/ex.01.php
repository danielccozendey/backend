<?php
// exercicio1_boletim.php
declare(strict_types=1);


$notas = [7.5, 8.0, 6.5, 9.0, 5.5];

// 1. Somar todas as notas 
$soma = 0;
foreach ($notas as $nota) {
    $soma += $nota; 
}

// 2. Dividir pela quantidade de notas 
$quantidadeDeNotas = count($notas);
$media = $soma / $quantidadeDeNotas;

// 3. Exibir a média final
echo "A média final do aluno é " . $media . "<br>";

// ==========================================

// ==========================================
if ($media >= 7) {
    echo "<span style='color: green; font-weight: bold;'>Aprovado</span>";
} else {
    echo "<span style='color: red; font-weight: bold;'>Reprovado</span>";
}