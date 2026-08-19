<?php 
//1. declare => evitar operações entre variaveis de tipos diferentes 
declare(strict_types=1);

// criar um calculo de holerite em php 

//2. declarar as constantes 
const TAXA_INSS = 0.08; //8% => 8/100
const DESCONTO_VT = 150.0;

// 3.Declarar as variaveis
// Dados do empregado 
$nomeFuncionario = "Maria Silva";
$salarioBase = 3200.50;
$horasExtras = 10;

//declaração de variaveis usando lowerCamelCase
// regra -> primeira palavra minusculo e depois as demais palavras usa-se maiusculo na primeira letra 
//exemplo: $hojeEstaUmDiaBonito

//4. Calculos dos salarios 
$valorHoraExtra = ($salarioBase / 220) * 1.6;
// -> crie a variavel $totalDeHorasExtras 
$totalDeHorasExtras =  $valorHoraExtra*$horasExtras;
// -> Crie a variavel $salarioBruto
$salarioBruto = $salarioBase + $totalDeHorasExtras;
// -> Crie a variavel $descontoInss
$descontoInss = $salarioBase * TAXA_INSS;
// -> Crie a variavel $salarioLiquido
$salarioLiquido = $salarioBruto - $descontoInss - DESCONTO_VT;


?> 
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holerite - <?php echo $nomeFuncionario ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Demonstrativo de Pagamento</h2>
    <!-- Saída de Dados Misturando Html e PHP -->
    <table>
        <tr>
            <th>Colaborador(a)</th>
            <td><?php echo $nomeFuncionario ?></td>
        </tr>
        <tr>
            <th>Salário Base</th>
            <!-- usar uma função chamada number format (formata saida de numeros) -->
            <td>R$ <?php echo number_format($salarioBase,2,",","."); ?></td>
        </tr>
        <!-- fazer as demais linhas da tabela utilizando as variáveis criada -->
        <tr>
            <th>Valor da Hora Extra</th>
            <td>R$ <?php echo number_format($valorHoraExtra,2,",",".") ?></td>
        </tr>
        <tr>
            <th>Total de Horas extras</th>
            <td>R$ <?php echo number_format($totalDeHorasExtras,2,",",".") ?></td>
        </tr>
        <tr>
            <th>Salário Bruto</th>
            <td>R$ <?php echo number_format($salarioBruto,2,",",".") ?></td>
        </tr>
        <tr>
            <th>Desconto do INSS</th>
            <td>R$ <?php echo number_format($descontoInss,2,",",".") ?></td>
        </tr>
        <tr>
            <th>Desconto do VT</th>
            <td>R$ <?php echo number_format(DESCONTO_VT,2,",",".") ?></td>
        </tr>
        <tr>
            <th>Salário Líquido</th>
            <td>R$ <?php echo number_format($salarioLiquido,2,",",".") ?></td>
        </tr>
    </table>
</body>
</html>