<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function sanitizarTexto(string $dado): string
{
    return trim(strip_tags($dado));
}

function validarColaborador(array $dados): array
{
    $erros = [];

    if ($dados['nome'] === '') {
        $erros['nome'] = 'Nome obrigatório.';
    }

    if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'E-mail inválido.';
    }

    if (filter_var($dados['matricula'], FILTER_VALIDATE_INT) === false) {
        $erros['matricula'] = 'Matrícula deve ser inteira.';
    }

    if (filter_var($dados['salario'], FILTER_VALIDATE_FLOAT) === false) {
        $erros['salario'] = 'Salário inválido.';
    }

    return $erros;
}

$dados = [
    'nome' => '',
    'email' => '',
    'matricula' => '',
    'salario' => '',
];

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($dados as $campo => $valor) {
        $dados[$campo] = sanitizarTexto($_POST[$campo] ?? '');
    }

    $erros = validarColaborador($dados);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Colaborador</title>
</head>
<body>
    <h1>Cadastro de Colaborador</h1>

    <form method="post">
        <label>Nome:</label><br>
        <input name="nome" value="<?= e($dados['nome']) ?>">
        <p><?= e($erros['nome'] ?? '') ?></p>

        <label>E-mail:</label><br>
        <input name="email" value="<?= e($dados['email']) ?>">
        <p><?= e($erros['email'] ?? '') ?></p>

        <label>Matrícula:</label><br>
        <input name="matricula" value="<?= e($dados['matricula']) ?>">
        <p><?= e($erros['matricula'] ?? '') ?></p>

        <label>Salário:</label><br>
        <input name="salario" value="<?= e($dados['salario']) ?>">
        <p><?= e($erros['salario'] ?? '') ?></p>

        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $erros === []): ?>
        <h2>Cadastro realizado!</h2>

        <p>Nome: <?= e($dados['nome']) ?></p>
        <p>E-mail: <?= e($dados['email']) ?></p>
        <p>Matrícula: <?= e($dados['matricula']) ?></p>
        <p>Salário: R$ <?= e($dados['salario']) ?></p>
    <?php endif; ?>
</body>
</html>