<?php
declare(strict_types=1);

// Exercício 2: O Operador de 1 Linha (E-commerce)

// Crie uma variável $valorCompra com um valor decimal (float).
// Utilizando exclusivamente o Operador Ternário (? :), crie uma variável $statusFrete.
// A regra é: Se a compra for maior ou igual a R$ 250.00, o status é "Frete Grátis". Caso contrário, o status é "Frete R$ 25,00".
// Exiba o resultado na tela.


$valorCompra = 320.80;

$statusFrete = $valorCompra>=250 ? "Frete Grátis" : "Frete R$ 25,00";

echo $statusFrete;


?>