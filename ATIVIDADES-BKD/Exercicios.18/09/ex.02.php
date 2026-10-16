<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$nome = '';
$link = '';
$erro = '';
$linkValido = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $link = trim($_POST['link'] ?? '');

    if ($nome === '') {
        $erro = 'Informe seu nome.';
    } elseif (!filter_var($link, FILTER_VALIDATE_URL)) {
        $erro = 'Informe uma URL válida.';
    } elseif (
        !str_starts_with($link, 'http://')
        && !str_starts_with($link, 'https://')
    ) {
        $erro = 'O link deve começar com http:// ou https://.';
    } else {
        $linkValido = $link;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Validador de Links</title>
</head>
<body>
    <h1>Cadastro de Portfólio</h1>

    <?php if ($erro !== ''): ?>
        <p style="color: red;"><?= e($erro) ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Nome:</label><br>

        <input
            type="text"
            name="nome"
            value="<?= e($nome) ?>"
        ><br><br>

        <label>Link do GitHub ou LinkedIn:</label><br>

        <input
            type="text"
            name="link"
            placeholder="https://github.com/seu-usuario"
            value="<?= e($link) ?>"
        ><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($linkValido !== ''): ?>
        <hr>

        <h2>Portfólio cadastrado</h2>

        <p>Desenvolvedor: <?= e($nome) ?></p>

        <a
            href="<?= e($linkValido) ?>"
            target="_blank"
            rel="noopener noreferrer"
        >
            Visitar Portfólio
        </a>
    <?php endif; ?>
</body>
</html>