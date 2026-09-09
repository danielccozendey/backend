<?php
declare(strict_types=1);
// Desafio FinanSENAI
// 
// Regra do Negocio:
// Classificação de Risco
// Projeção da Divida
// Regra da Anistia 

$categoriaCliente = "B";
$divida = 1000.00;

//RF01 - Determinar o Juros de Acordo com a Classificação de Risco
$juros = match($categoriaCliente){
    "A" => 0.01,
    "B" => 0.02,
    "C" => 0.03,
    default => 0.05
};

//RF02 - Projeção da Dívida: Calcular o Juros ao Longo de 12 Meses
for($mes=1; $mes<=12; $mes++){

    //RF-03 : Anistia da Dívida : não é cobrado Juros no Mês 6
    if($mes==6){
        echo "\nAnistia da Dívida no Mês 6";
        echo "\nValor da Dívida ao Final de $mes é R$ ". number_format($divida,2);
        continue; // vai interromper a execução do laço
    } 
    //Cálculo do Juros
    $jurosMes = $divida * $juros;
    // adicione ao saldo devedor
    $divida = $divida + $jurosMes;
    echo "\nValor da Dívida ao Final de $mes é R$ ". number_format($divida,2);
    
}