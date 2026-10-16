<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function tamanho(string $texto): int
{
    return function_exists('mb_strlen')
        ? mb_strlen($texto, 'UTF-8')
        : strlen($texto);
}

function carregarMensagens(string $arquivo): array
{
    if (!file_exists($arquivo)) {
        return [];
    }

    $dados = file_get_contents($arquivo);

    return json_decode($dados ?: '[]', true) ?? [];
}

function salvarMensagens(string $arquivo, array $mensagens): void
{
    $json = json_encode(
        $mensagens,
        JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );

    file_put_contents($arquivo, $json, LOCK_EX);
}

$arquivo = __DIR__ . '/chat.json';
$mensagem = '';
$erro = '';
$mensagens = carregarMensagens($arquivo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensagem = trim($_POST['mensagem'] ?? '');

    if ($mensagem === '') {
        $erro = 'Digite uma mensagem.';
    } elseif (tamanho($mensagem) > 250) {
        $erro = 'A mensagem não pode ter mais de 250 caracteres.';
    } else {
        $mensagens[] = [
            'mensagem' => $mensagem,
            'data' => date('d/m/Y H:i'),
        ];

        salvarMensagens($arquivo, $mensagens);
        $mensagem = '';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Chat de Operação</title>
</head>
<body>
    <h1>Chat Industrial</h1>

    <form method="post">
        <label for="mensagem">Mensagem:</label><br>

        <textarea
            id="mensagem"
            name="mensagem"
            rows="5"
            maxlength="250"
        ><?= e($mensagem) ?></textarea>

        <br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php if ($erro !== ''): ?>
        <p style="color: red;"><?= e($erro) ?></p>
    <?php endif; ?>

    <hr>

    <h2>Mensagens</h2>

    <?php foreach ($mensagens as $item): ?>
        <div>
            <small><?= e($item['data']) ?></small>

            <p>
                <?php
                // Primeiro escapamos o HTML e depois criamos <br>.
                // Fazer e(nl2br($mensagem)) escaparia os <br> criados
                // pelo nl2br(), mostrando "&lt;br&gt;" como texto.
                echo nl2br(e($item['mensagem']));
                ?>
            </p>
        </div>

        <hr>
    <?php endforeach; ?>
</body>
</html>