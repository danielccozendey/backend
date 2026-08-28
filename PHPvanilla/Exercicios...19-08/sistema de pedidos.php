<?php
// cantina_senai.php - Sistema simples da Cantina SENAI

$produtos = [
    1 => ["nome" => "Coxinha", "preco" => 6.00, "estoque" => 10],
    2 => ["nome" => "Suco", "preco" => 5.00, "estoque" => 8],
    3 => ["nome" => "Sanduíche", "preco" => 12.00, "estoque" => 5],
    4 => ["nome" => "Bolo", "preco" => 7.50, "estoque" => 6],
];

$pedido = [];
$opcao = 0;

function ler(string $texto): string {
    echo $texto;
    return trim(fgets(STDIN));
}

do {
    echo "\n--- CANTINA SENAI ---\n";
    echo "1 - Listar produtos\n";
    echo "2 - Adicionar produto ao pedido\n";
    echo "3 - Exibir resumo do pedido\n";
    echo "4 - Finalizar compra\n";
    echo "0 - Sair sem finalizar\n";

    $entrada = ler("Escolha uma opção: ");
    $opcao = ctype_digit($entrada) ? (int) $entrada : -1;

    match ($opcao) {
        1, 2, 3, 4, 0 => null, // opção válida, tratada abaixo
        default => print("Opção inválida!\n"),
    };

    // Opção 1: listar produtos
    if ($opcao === 1) {
        foreach ($produtos as $codigo => $produto) {
            echo "$codigo - {$produto['nome']} - R$ {$produto['preco']} - Estoque: {$produto['estoque']}\n";
        }
    }

    // Opção 2: adicionar produto ao pedido
    elseif ($opcao === 2) {
        $codigo = (int) ler("Código do produto: ");

        if (!isset($produtos[$codigo])) {
            echo "Produto não encontrado!\n";
            continue;
        }

        $quantidade = 0;
        while ($quantidade <= 0 || $quantidade > $produtos[$codigo]["estoque"]) {
            $quantidade = (int) ler("Quantidade: ");
            if ($quantidade <= 0 || $quantidade > $produtos[$codigo]["estoque"]) {
                echo "Quantidade inválida! Estoque disponível: {$produtos[$codigo]['estoque']}\n";
            }
        }

        $produtos[$codigo]["estoque"] -= $quantidade;

        if (isset($pedido[$codigo])) {
            $pedido[$codigo]["quantidade"] += $quantidade;
        } else {
            $pedido[$codigo] = [
                "nome" => $produtos[$codigo]["nome"],
                "preco" => $produtos[$codigo]["preco"],
                "quantidade" => $quantidade,
            ];
        }

        echo "Produto adicionado!\n";
    }

    // Opção 3: exibir resumo do pedido
    elseif ($opcao === 3) {
        if (empty($pedido)) {
            echo "Nenhum produto foi adicionado ao pedido.\n";
        } else {
            $itens = array_values($pedido);
            $total = 0;

            foreach ($pedido as $item) {
                $subtotal = $item["preco"] * $item["quantidade"];
                echo "{$item['nome']} - Qtd: {$item['quantidade']} - Unitário: R$ {$item['preco']} - Subtotal: R$ $subtotal\n";
            }

            for ($i = 0; $i < count($itens); $i++) {
                $total += $itens[$i]["preco"] * $itens[$i]["quantidade"];
            }

            echo "TOTAL: R$ $total\n";
        }
    }

    // Opção 4: finalizar compra
    elseif ($opcao === 4) {
        if (empty($pedido)) {
            echo "Pedido vazio, nada para finalizar.\n";
            break;
        }

        $itens = array_values($pedido);
        $total = 0;
        for ($i = 0; $i < count($itens); $i++) {
            $total += $itens[$i]["preco"] * $itens[$i]["quantidade"];
        }

        echo "1 - Pix (5% desconto)\n2 - Cartão (sem desconto)\n3 - Dinheiro (3% desconto)\n";
        $pagamento = ler("Forma de pagamento: ");

        $desconto = match ($pagamento) {
            "1" => 0.05,
            "2" => 0.00,
            "3" => 0.03,
            default => null,
        };

        if ($desconto === null) {
            echo "Forma de pagamento inválida! Compra não finalizada.\n";
        } else {
            $totalFinal = $total - ($total * $desconto);
            echo "Total final com desconto: R$ $totalFinal\n";
        }

        break;
    }

    // Opção 0: sair sem finalizar
    elseif ($opcao === 0) {
        echo "Saindo sem finalizar a compra.\n";
        break;
    }

    // Opção inválida
    else {
        continue;
    }

} while (true);

echo "Programa encerrado.\n";