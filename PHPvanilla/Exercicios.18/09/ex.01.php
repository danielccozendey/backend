<?php
declare(strict_types=1);

session_start();

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$nome = '';
$mensagem = '';
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if (strlen($nome) < 3) {
        $erros[] = 'Nome deve ter pelo menos 3 caracteres.';
    }

    if (strlen($mensagem) < 5) {
        $erros[] = 'Mensagem deve ter pelo menos 5 caracteres.';
    }

    if ($erros === []) {
        $_SESSION['recados'][] = [
            'nome' => $nome,
            'mensagem' => $mensagem,
        ];

        $nome = '';
        $mensagem = '';
    }
}

$recados = $_SESSION['recados'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mural de Recados</title>
</head>
<body>
    <h1>Mural de Recados</h1>

    <?php foreach ($erros as $erro): ?>
        <p style="color: red;"><?= e($erro) ?></p>
    <?php endforeach; ?>

    <form method="post">
        <label>Nome:</label><br>
        <input
            type="text"
            name="nome"
            value="<?= e($nome) ?>"
        ><br><br>

        <label>Mensagem:</label><br>
        <textarea name="mensagem"><?= e($mensagem) ?></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>

    <hr>

    <h2>Recados</h2>
 
    <?php foreach ($recados as $recado): ?>
        <div>
            <strong><?= e($recado['nome']) ?></strong>
            <p><?= nl2br(e($recado['mensagem'])) ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>