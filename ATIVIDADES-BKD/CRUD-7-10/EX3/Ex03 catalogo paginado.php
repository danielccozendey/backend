<?php
declare(strict_types=1);

// conexao com o banco
$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=peca', 'postgres', 'sua_senha');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// pega a pagina da url, se nao vier usa 1
$pagina = (int) ($_GET['p'] ?? 1);
if ($pagina < 1) {
    $pagina = 1;
}

// calcula o offset (5 itens por pagina)
$offset = ($pagina - 1) * 5;

// busca as pecas da pagina
$stmt = $pdo->prepare('SELECT id, nome, categoria, preco FROM peca ORDER BY id LIMIT :limite OFFSET :offset');
$stmt->bindValue(':limite', 5, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$pecas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// conta quantas pecas tem no total pra saber se tem proxima pagina
$total = (int) $pdo->query('SELECT COUNT(*) FROM peca')->fetchColumn();
$totalPaginas = (int) ceil($total / 5);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Catalogo de Pecas</title>
</head>
<body>
    <h1>Catalogo de Pecas Industriais</h1>
    <p>Pagina <?= $pagina ?> de <?= $totalPaginas ?></p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preco</th>
        </tr>
        <?php foreach ($pecas as $peca) { ?>
            <tr>
                <td><?= $peca['id'] ?></td>
                <td><?= htmlspecialchars($peca['nome']) ?></td>
                <td><?= htmlspecialchars($peca['categoria']) ?></td>
                <td>R$ <?= number_format((float) $peca['preco'], 2, ',', '.') ?></td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <?php if ($pagina > 1) { ?>
        <a href="?p=<?= $pagina - 1 ?>">Anterior</a>
    <?php } ?>
    <?php if ($pagina < $totalPaginas) { ?>
        <a href="?p=<?= $pagina + 1 ?>">Proxima</a>
    <?php } ?>
</body>
</html>