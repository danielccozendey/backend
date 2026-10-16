<?php
// ex03_login_seguro.php
// Tela de login com validação server-side (método POST)

// Credenciais fictícias
const EMAIL_VALIDO = 'admin@senai.br';
const SENHA_VALIDA = 'senhaSegura123';

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

// Leitura dos dados (?? evita Warning na primeira carga)
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';   // a senha NÃO leva trim e NUNCA volta para o HTML

$erros  = [];
$logado = false;
$falhou = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. E-mail válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'Informe um e-mail válido.';
    }

    // 2. Senha com no mínimo 6 caracteres
    if (mb_strlen($senha) < 6) {
        $erros[] = 'A senha deve ter no mínimo 6 caracteres.';
    }

    // Só compara com as credenciais se as validações passarem
    if (empty($erros)) {
        $emailOk = hash_equals(EMAIL_VALIDO, strtolower($email));
        $senhaOk = hash_equals(SENHA_VALIDA, $senha);

        if ($emailOk && $senhaOk) {
            $logado = true;
        } else {
            $falhou = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Seguro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 40px auto; padding: 0 15px; color: #222; }
        form { display: flex; flex-direction: column; gap: 14px; }
        label { display: flex; flex-direction: column; font-size: 14px; gap: 4px; }
        input { padding: 9px; border: 1px solid #bbb; border-radius: 4px; font-size: 15px; }
        button { padding: 10px; border: 0; border-radius: 4px; background: #2563eb; color: #fff; font-size: 15px; cursor: pointer; }
        .erros { background: #fee2e2; border-left: 4px solid #dc2626; padding: 10px 14px; margin-bottom: 18px; border-radius: 4px; }
        .erros ul { margin: 0; padding-left: 18px; }
        .invalido { background: #fee2e2; color: #991b1b; border: 1px solid #ef4444; padding: 12px; border-radius: 4px; margin-bottom: 18px; text-align: center; }
        .card { background: #dcfce7; color: #166534; border: 1px solid #22c55e; padding: 24px; border-radius: 8px; text-align: center; }
        .card a { color: #166534; }
    </style>
</head>
<body>

<?php if ($logado): ?>

    <div class="card">
        <h1>Bem-vindo(a)!</h1>
        <p>Login realizado com sucesso como <strong><?= e($email) ?></strong>.</p>
        <p><a href="ex03_login_seguro.php">Sair</a></p>
    </div>

<?php else: ?>

    <h1>Login</h1>

    <?php if (!empty($erros)): ?>
        <div class="erros">
            <ul>
                <?php foreach ($erros as $erro): ?>
                    <li><?= e($erro) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($falhou): ?>
        <div class="invalido">Credenciais inválidas</div>
    <?php endif; ?>

    <form method="POST" action="ex03_login_seguro.php">
        <label>E-mail
            <input type="text" name="email" value="<?= e($email) ?>">
        </label>

        <!-- Sem atributo value: a senha NUNCA é repopulada -->
        <label>Senha
            <input type="password" name="senha" autocomplete="current-password">
        </label>

        <button type="submit">Entrar</button>
    </form>

<?php endif; ?>

</body>
</html>