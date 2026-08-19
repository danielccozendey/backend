<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo de Variáveis</title>
</head>
<body>
    <h1>Estudo de Variáveis</h1>
    <hr>
    <?php 
    // para criar variáveis em php bata usar o sinal de $
    // variáveis em php são NÃO tipadas, NÃO precisa declarar o tipo (Texto, numeros, booleanas)
    // ao atribuir valor para a variável a tipagem é automática
    $nome = "João"; // criação da variavel nome com o valor textual "João"
    $idade = 25; // criação da variável idade com o valor numérico 25
    $ativo = true; // criação da variável ativo com o valor booleano true
    $salario = 1520.68; // variavel numerica - decimal (float - double)
    $status = null; // variavel null
    //$endereço; // Variável Undefined, não é possivel declarar uma variavel sem atribuir um valor a ela, não existe Undefined em PHP

    // Dicas para Criação de Variáveis: ./
    // Não incie o nome de uma variavel com numeros
    // Não utilize espaços em banco
    // Não utilize caracteres especiais, somente o underline
    // Crie variáveis con nomes que ajudrão a identificar melhor a mesma
    // Evite utilizar letras maiúsculas.
    
    //Exibir as variáveis na tela
    echo "Nome: $nome <br>";
    echo "Idade: $idade <br>";
    echo "Ativo: $ativo <br>";
    echo "Salario: $salario <br>";
    echo "Status $status <br>";


    echo "<br><h3> Constantes </h3><br>";
    // Constantes são representadas pela palavra "const" ou "define" seguidas do nome da constante
    //Exemplos de constantes
    const PI = 3.14; //Constante do Tipo Number (float)
    const EMPRESA = "Google"; //Constatne do Tipo String
    define("SITE", "www.google.com"); //Declaração de Constante do tipo String usando "define"
    // uam boa  prática é criar o nome das constantes em letras maiúsculas, para diferenciar das variáveis

    // Exibir as constantes na tela
    echo "Constante PI: " . PI . "<br>";    
    echo "Constante EMPRESA: " . EMPRESA . "<br>";
    echo "Constante SITE: " . SITE . "<br>";

    // tentar alterar o valor de uma constante, isso irá gerar um erro de código, pois constantes não podem ser alteradas
    // PI = 3.14159; // isso é um erro
    // redeclarar uma constante tamb´me irá gerar um erro
    // const SITE = "www.google.com.br"; //Isso é um Erro

     //Regra de Ouro: Sempre coloque a instrução "declare(strict_types=1);" no início do seu código PHP,
     // isso blindará o seu sistema contra mistura acidentais de tipos de dados.

    // Utilização de Texto (Concatenação Vs Interpolação)

    // Exemplo de Concatenação => Juntar duas ou mais Strings utilizando p operador "."(ponto)
    echo "Olá, ".$nome ."! Seja bem-vindo ao nosso site! <br>";

    // Exemplo de Interpolação => Utilização de variáveis dentro de um exto, utilizando aspas duplas no texto
    echo "$nome, tem $idade anos e seu salário é R$ $salario reais. <br>";//forma mais correta de misturar texto e variáveis





    ?>

    
</body>
</html>