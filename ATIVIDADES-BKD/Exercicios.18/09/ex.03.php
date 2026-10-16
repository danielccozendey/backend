<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$busca = $_GET['q'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Busca Blindada</title>
</head>
<body>
    <h1>Busca de Produtos</h1>

    <form method="get">
        <label for="q">Pesquisar:</label><br>

        <input
            type="text"
            id="q"
            name="q"
            value="<?= e($busca) ?>"
        >

        <button type="submit">Buscar</button>
    </form>

    <?php if ($busca !== ''): ?>
        <hr>

        <p>Você buscou por: <?= e($busca) ?></p>
    <?php endif; ?>
</body>
</html>