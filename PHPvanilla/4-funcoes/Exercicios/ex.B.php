
<?php
declare(strict_types=1);

/**
 * Calcula o IMC a partir do peso (kg) e altura (m).
 */
function calcularIMC(float $peso, float $altura): float {
    return $peso / ($altura * $altura);
}

// ===== TESTES =====
$testes = [
    ["peso" => 70.0, "altura" => 1.75],
    ["peso" => 55.0, "altura" => 1.60],
    ["peso" => 95.0, "altura" => 1.80],
];

foreach ($testes as $teste) {
    $imc = calcularIMC($teste["peso"], $teste["altura"]);
    printf(
        "Peso: %.1f kg | Altura: %.2f m | IMC: %.2f\n",
        $teste["peso"],
        $teste["altura"],
        $imc
    );
}




<?php 
declare(strict_type=1);

/**
 * Classifica o IMC de acordo com as faixas padrão.
 */
function classificarIMC(float $imc): string {
    if ($imc < 18.5) {
        return "Abaixo do peso";
    } elseif ($imc <= 24.9) {
        return "Peso normal";
    } elseif ($imc <= 29.9) {
        return "Sobrepeso";
    } else {
        return "Obesidade";
    }
}

// ===== TESTES =====
$imcsParaTestar = [17.2, 22.0, 27.5, 31.0];

foreach ($imcsParaTestar as $imc) {
    printf("IMC %.1f -> %s\n", $imc, classificarIMC($imc)
    );
}





<?php
declare(strict_types=1);

/**
 * Retorna true quando a senha tem mais de 8 caracteres.
 */
function senhaForte(string $senha): bool {
    return strlen($senha) > 8;
}

// ===== TESTES =====
$senhasParaTestar = ["1234567", "12345678", "SenhaForte123", ""];

foreach ($senhasParaTestar as $senha) {
    $resultado = senhaForte($senha);
    $mensagem = $resultado ? "Senha forte." : "Senha fraca (precisa de mais de 8 caracteres).";
    printf("Senha: \"%s\" -> %s\n", $senha, $mensagem);
}




<?php
declare(strict_types=1);

/**
 * Remove espaços extras, coloca em minúsculo e capitaliza a primeira letra.
 */
function formatarNome(string $nome): string {
    $nomeLimpo = trim($nome);
    $nomeMinusculo = strtolower($nomeLimpo);
    return ucfirst($nomeMinusculo);
}

// ===== TESTES =====
$nomesParaTestar = ["  DIOGO  ", "ana clara", "MARIA DA SILVA", "joão"];

foreach ($nomesParaTestar as $nome) {
    printf("\"%s\" -> \"%s\"\n", $nome, formatarNome($nome));
}




<?php
declare(strict_types=1);

/**
 * Calcula o total de um carrinho de compras.
 * Cada item deve ter "nome", "preco" e "quantidade".
 */
function calcularCarrinho(array $produtos): float {
    $total = 0.0;

    foreach ($produtos as $produto) {
        $total += $produto["preco"] * $produto["quantidade"];
    }

    return $total;
}

// ===== TESTES =====
$produtos = [
    ["nome" => "Caderno", "preco" => 25.00, "quantidade" => 2],
    ["nome" => "Caneta", "preco" => 3.50, "quantidade" => 4],
];

$total = calcularCarrinho($produtos);
printf("Total do carrinho: R$ %.2f\n", $total);

// Teste com carrinho vazio
$carrinhoVazio = [];
printf("Total do carrinho vazio: R$ %.2f\n", calcularCarrinho($carrinhoVazio));






<?php
declare(strict_types=1);

/**
 * Aplica um desconto percentual diretamente na variável original (por referência).
 */
function aplicarDesconto(float &$preco, float $porcentagem): void {
    $desconto = $preco * ($porcentagem / 100);
    $preco -= $desconto;
}

// ===== TESTES =====
$precoProduto = 200.00;
printf("Preço antes do desconto: R$ %.2f\n", $precoProduto);

aplicarDesconto($precoProduto, 15);

printf("Preço depois do desconto de 15%%: R$ %.2f\n", $precoProduto);






<?php
declare(strict_types=1);

/**
 * Calcula a média de um array de notas.
 */
function calcularMedia(array $notas): float {
    if (count($notas) === 0) {
        return 0.0;
    }

    $soma = 0.0;
    foreach ($notas as $nota) {
        $soma += $nota;
    }

    return $soma / count($notas);
}

/**
 * Verifica a situação do aluno com base na média.
 */
function verificarAprovacao(float $media): string {
    if ($media >= 7) {
        return "Aprovado";
    } else {
        return "Reprovado";
    }
}

// ===== TESTES =====
$notas = [8.5, 6.0, 7.5, 9.0];

$media = calcularMedia($notas);
$situacao = verificarAprovacao($media);
$maiorNota = max($notas);
$menorNota = min($notas);

printf("Notas: %s\n", implode(", ", $notas));
printf("Média: %.2f\n", $media);
printf("Situação: %s\n", $situacao);
printf("Maior nota: %.1f\n", $maiorNota);
printf("Menor nota: %.1f\n", $menorNota);

// Teste com aluno reprovado
$notasReprovado = [4.0, 5.5, 6.0];
$mediaReprovado = calcularMedia($notasReprovado);
printf("\nMédia (aluno 2): %.2f -> %s\n", $mediaReprovado, verificarAprovacao($mediaReprovado));







<?php
declare(strict_types=1);

/**
 * Remove pontos e traço de um CPF.
 */
function limparCPF(string $cpf): string {
    return str_replace(['.', '-'], '', $cpf);
}

/**
 * Verifica se o CPF (já limpo) possui exatamente 11 dígitos numéricos.
 */
function cpfValido(string $cpf): bool {
    $cpfLimpo = limparCPF($cpf);
    return strlen($cpfLimpo) === 11 && is_numeric($cpfLimpo);
}

// ===== TESTES =====
$cpfsParaTestar = [
    "123.456.789-00", // válido
    "111.222.333-4",  // inválido (menos de 11 dígitos)
    "123.ABC.789-00", // inválido (contém letras)
];

foreach ($cpfsParaTestar as $cpf) {
    $limpo = limparCPF($cpf);
    $valido = cpfValido($cpf);
    printf(
        "CPF original: \"%s\" | Limpo: \"%s\" | Válido: %s\n",
        $cpf,
        $limpo,
        $valido ? "Sim" : "Não"
    );
}







<?php
declare(strict_types=1);

/**
 * Procura um cliente pelo nome dentro do array de clientes.
 * Retorna o array do cliente ou null se não encontrar.
 */
function buscarCliente(array $clientes, string $nome): ?array {
    foreach ($clientes as $cliente) {
        if ($cliente["nome"] === $nome) {
            return $cliente;
        }
    }

    return null;
}

// ===== TESTES =====
$clientes = [
    ["nome" => "Ana Clara", "email" => "ana@email.com"],
    ["nome" => "Bruno Souza", "email" => "bruno@email.com"],
];

// Cenário 1: cliente encontrado
$clienteEncontrado = buscarCliente($clientes, "Ana Clara");
if ($clienteEncontrado !== null) {
    printf("Cliente encontrado: %s (%s)\n", $clienteEncontrado["nome"], $clienteEncontrado["email"]);
} else {
    echo "Cliente não encontrado.\n";
}

// Cenário 2: cliente não encontrado
$clienteNaoEncontrado = buscarCliente($clientes, "Carlos Lima");
if ($clienteNaoEncontrado !== null) {
    printf("Cliente encontrado: %s (%s)\n", $clienteNaoEncontrado["nome"], $clienteNaoEncontrado["email"]);
} else {
    echo "Cliente não encontrado.\n";
}






 <?php
declare(strict_types=1);

/**
 * Retira uma quantidade do estoque do produto (por referência).
 * Retorna true se a retirada foi realizada, false se for inválida.
 */
function retirarEstoque(array &$produto, int $quantidade): bool {
    if ($quantidade <= 0 || $quantidade > $produto["estoque"]) {
        return false;
    }

    $produto["estoque"] -= $quantidade;
    return true;
}

// ===== TESTES =====
$produto = ["nome" => "Caderno", "estoque" => 10];

// Retirada permitida
printf("Estoque antes: %d\n", $produto["estoque"]);
$sucesso1 = retirarEstoque($produto, 4);
printf("Retirada de 4 unidades -> %s | Estoque agora: %d\n", $sucesso1 ? "Sucesso" : "Falhou", $produto["estoque"]);

// Retirada recusada (quantidade maior que o estoque disponível)
$sucesso2 = retirarEstoque($produto, 100);
printf("Retirada de 100 unidades -> %s | Estoque agora: %d\n", $sucesso2 ? "Sucesso" : "Falhou", $produto["estoque"]);
