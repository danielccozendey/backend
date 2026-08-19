<?php
declare(strict_types=1);

$siglaEstado = "AM";

$valorFrete = match($siglaEstado) {
    "SP", "RJ", "MG", "ES" => 35,
    "PR", "SC", "RS", => 40,
    "BA", "CE", "PE", => 60,
    default => 80
};

echo "Para o estado $siglaEstado, o frete é $valorFrete";
?>