<?php
// Aplicação de página única de variáveis superglobais ($_GET, $_POST, $_SERVER)
declare(strict_types=1);


// Dados Simulados (Preços corrigidos para formato float válido)
$produtos = [
    ['nome' => 'Teclado USB', 'categoria' => 'Eletrônicos', 'preco' => 80.00],
    ['nome' => 'Mouse sem fio', 'categoria' => 'Eletrônicos', 'preco' => 65.00],
    ['nome' => 'Caderno', 'categoria' => 'Papelaria', 'preco' => 25.00],
    ['nome' => 'Caneta azul', 'categoria' => 'Papelaria', 'preco' => 3.50],
    ['nome' => 'Monitor 24 polegadas', 'categoria' => 'Eletrônicos', 'preco' => 899.90],
    ['nome' => 'iphone 15 pro max', 'categoria' => 'Eletrônicos', 'preco' => 4500.00],
    ['nome' => 'Notebook', 'categoria' => 'Eletrônicos', 'preco' => 3500.00],
    ['nome' => 'Borracha', 'categoria' => 'Papelaria', 'preco' => 2.00],
    ['nome' => 'Lápis', 'categoria' => 'Papelaria', 'preco' => 1.50],
    ['nome' => 'Cadeira Gamer', 'categoria' => 'Móveis', 'preco' => 1200.00],
    ['nome' => 'Mesa de Escritório', 'categoria' => 'Móveis', 'preco' => 800.00],
    ['nome' => 'Fone de Ouvido Bluetooth', 'categoria' => 'Eletrônicos', 'preco' => 150.00],
    ['nome' => 'Câmera Digital', 'categoria' => 'Eletrônicos', 'preco' => 2000.00],
    ['nome' => 'Impressora Multifuncional', 'categoria' => 'Eletrônicos', 'preco' => 600.00],
    ['nome' => 'Roteador Wi-Fi', 'categoria' => 'Eletrônicos', 'preco' => 250.00],
    ['nome' => 'HD Externo 1TB', 'categoria' => 'Eletrônicos', 'preco' => 400.00],
    ['nome' => 'SSD 500GB', 'categoria' => 'Eletrônicos', 'preco' => 350.00],
    ['nome' => 'Cabo HDMI', 'categoria' => 'Eletrônicos', 'preco' => 30.00],
    ['nome' => 'Carregador Portátil', 'categoria' => 'Eletrônicos', 'preco' => 120.00]
];


// Declaração de Variáveis
$mensagemSucesso = "";
$erro = [];


$nome = "";
$email = "";
$buscaProduto = "";
$precoMaximoTexto = "";


// Processamento usando o GET (busca na lista de produtos)
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $buscaProduto = trim((string) ($_GET["produto"] ?? ""));
    $precoMaximoTexto = trim((string) ($_GET["preco_maximo"] ?? ""));
}


$produtosFiltrados = $produtos;


if ($buscaProduto !== "" || $precoMaximoTexto !== "") {
    $produtosFiltrados = array_filter(
        $produtos,
        function (array $produto) use ($buscaProduto, $precoMaximoTexto): bool {
            $nomeCorrespondente = true;
            $precoCorrespondente = true;
            
            if ($buscaProduto !== "") {
                $nomeCorrespondente = str_contains(
                    strtolower($produto["nome"]),
                    strtolower($buscaProduto)
                );
            }


            if ($precoMaximoTexto !== "") {
                $precoMaximo = filter_var(
                    $precoMaximoTexto,
                    FILTER_VALIDATE_FLOAT
                );
                $precoCorrespondente = $precoMaximo !== false && $produto["preco"] <= $precoMaximo;
            }
            return $nomeCorrespondente && $precoCorrespondente;
        }
    );
}


// Processamento do POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar os Dados do Formulário (Sticky Form)
    $nome = trim((string) ($_POST["nome"] ?? ""));
    $email = trim((string) ($_POST["email"] ?? ""));


    // Validação do Servidor
    if (strlen($nome) < 3) {
        $erro["nome"] = "Informe um nome com pelo menos 3 caracteres";
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro["email"] = "Informe um e-mail válido";
    }


    // Se não existirem erros, o cadastro será realizado com sucesso
    if ($erro === []) {
        $mensagemSucesso = "Cadastro realizado com sucesso!";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de GET e POST no PHP</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <main>
        <h1>Exemplo prático: GET e POST</h1>


        <section>
            <p>Os filtros serão enviados pela URL (GET)</p>


            <form action="index.php" method="GET">
                <label for="produto">Nome do produto</label>
                <input type="text" name="produto" id="produto" value="<?= htmlspecialchars($buscaProduto, ENT_QUOTES, 'UTF-8') ?>" placeholder="Escreva o nome de um produto">


                <label for="preco_maximo">Preço Máximo</label>
                <input type="number" name="preco_maximo" id="preco_maximo" step="0.01" value="<?= htmlspecialchars($precoMaximoTexto, ENT_QUOTES, 'UTF-8') ?>" placeholder="100">


                <button type="submit">Pesquisar</button>
            </form>


            <h2>Lista de Produtos Filtrados</h2>
            <p>Observe que os dados da pesquisa aparecem na URL</p>


            <?php if ($produtosFiltrados === []): ?>
                <p class="vazio">Nenhum produto encontrado.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtosFiltrados as $produto): ?>
                            <tr>
                                <td><?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($produto['categoria'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>


        <section>
            <h2>Cadastro de Alunos com POST</h2>
            <p>Os dados serão enviados no corpo da requisição e não aparecerão na URL</p>


            <?php if ($mensagemSucesso !== ""): ?>
                <div class="sucesso">
                    <?= htmlspecialchars($mensagemSucesso, ENT_QUOTES, 'UTF-8') ?><br>
                    <strong>Nome:</strong> <?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?><br>
                    <strong>E-mail:</strong> <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endif; ?>


            <form action="index.php" method="POST" novalidate>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>" placeholder="Digite seu Nome">
                <?php if (isset($erro["nome"])): ?>
                    <div class="erro">
                        <?= htmlspecialchars($erro["nome"], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>


                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>" placeholder="Digite seu E-mail">
                <?php if (isset($erro["email"])): ?>
                    <div class="erro">
                        <?= htmlspecialchars($erro["email"], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>


                <button type="submit">Cadastrar</button>
            </form>
        </section>
    </main>
</body>


</html>