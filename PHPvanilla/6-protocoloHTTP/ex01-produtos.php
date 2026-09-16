<?php
// ex01_busca_produtos.php - Buscador de Produtos com Filtro (GET)

$produtos = [
    ["nome" => "Notebook Gamer",        "categoria" => "Eletronicos", "preco" => 4599.90],
    ["nome" => "Mouse Sem Fio",         "categoria" => "Eletronicos", "preco" => 89.90],
    ["nome" => "Cadeira de Escritorio", "categoria" => "Moveis",      "preco" => 799.00],
    ["nome" => "Fone Bluetooth",        "categoria" => "Eletronicos", "preco" => 249.90],
    ["nome" => "Mesa de Jantar",        "categoria" => "Moveis",      "preco" => 1299.00],
    ["nome" => "Teclado Mecanico",      "categoria" => "Eletronicos", "preco" => 349.90],
];

// pega os filtros do GET (?? evita warning se nao foram enviados)
$nome  = trim($_GET["nome"] ?? "");
$preco = $_GET["preco_maximo"] ?? "";

// filtra o array conforme nome e preco maximo
$resultado = array_filter($produtos, function ($p) use ($nome, $preco) {
    $okNome  = $nome === "" || stripos($p["nome"], $nome) !== false;
    $okPreco = $preco === "" || !is_numeric($preco) || $p["preco"] <= $preco;
    return $okNome && $okPreco;
});
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Produtos</title>
</head>
<body>

<h1>Buscador de Produtos</h1>

<form method="GET" action="ex01_busca_produtos.php">
    <label>Nome do produto:</label><br>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>"><br><br>

    <label>Preco maximo (R$):</label><br>
    <input type="number" step="0.01" name="preco_maximo" value="<?php echo htmlspecialchars($preco); ?>"><br><br>

    <button type="submit">Filtrar</button>
</form>

<hr>
<h2>Resultado</h2>

<?php if (count($resultado) === 0): ?>
    <p>Nenhum produto encontrado.</p>
<?php else: ?>
    <table border="1" cellpadding="8">
        <tr><th>Nome</th><th>Categoria</th><th>Preco</th></tr>
        <?php foreach ($resultado as $p): ?>
            <tr>
                <td><?php echo htmlspecialchars($p["nome"]); ?></td>
                <td><?php echo htmlspecialchars($p["categoria"]); ?></td>
                <td>R$ <?php echo number_format($p["preco"], 2, ",", "."); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>