<?php
// utilitarios.php
declare(strict_types=1);

/**
 * 1. Formata um número para moeda Brasileira
 */
function formatarMoeda(float $valor): string {
    return "R$ " . number_format($valor, 2, ',', '.');
}

/**
 * 2. Remove pontos e traços (Deixa só os números)
 */
function limparDocumento(string $docSujeira): string {
    return str_replace(['.', '-'], '', $docSujeira);
}

/**
 * 3. Aplica desconto na variável original usando Referência (&)
 */
function aplicarDesconto(float &$preco, float $porcentagem): void {
    $desconto = $preco * ($porcentagem / 100);
    $preco -= $desconto;
}

/**
 * 4. Gera as iniciais de um nome completo
 * Ex: "Diogo Barbosa" => "DB"
 * Ex: "Ana Clara Silva" => "ACS"
 */
function gerarIniciais(string $nomeCompleto): string {
    // Quebra a string em um array usando o espaço como separador
    // Ex: "Diogo Barbosa" => ["Diogo", "Barbosa"]
    $partesDoNome = explode(' ', trim($nomeCompleto));

    $iniciais = '';

    // Percorre cada palavra (nome/sobrenome) do array
    foreach ($partesDoNome as $palavra) {
        if ($palavra !== '') {
            // substr($palavra, 0, 1) -> pega o 1º caractere da palavra
            // strtoupper() -> garante que a letra fique maiúscula
            $iniciais .= strtoupper(substr($palavra, 0, 1));
        }
    }

    return $iniciais;
}