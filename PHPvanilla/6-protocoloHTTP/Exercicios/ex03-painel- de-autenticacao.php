<?php
// ex03_login_seguro.php - Painel de Autenticacao Segura (POST)

$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";
$erro = "";
$logado = false;

// dados ficticios validos para o login
$EMAIL_VALIDO = "admin@senai.br";
$SENHA_VALIDA = "senhaSegura123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail invalido.";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter no minimo 6 caracteres.";
    } elseif ($email === $EMAIL_VALIDO && $senha === $SENHA_VALIDA) {
        $logado = true;
    } else {
        $erro = "Credenciais invalidas.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Seguro</title>
    <style>
        .erro       { color: red; font-weight: bold; }
        .bemvindo   { background: #d4edda; color: #155724; padding: 15px; border-radius: 6px; }
    </style>
</head>
<body>

<h1>Login</h1>

<form method="POST" action="ex03_login_seguro.php">
    <label>E-mail:</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" value=""><br><br>
    <!-- o campo senha nunca e repopulado, por seguranca -->

    <button type="submit">Entrar</button>
</form>

<hr>

<?php if ($logado): ?>
    <div class="bemvindo">
        <p>Bem-vindo(a), <?php echo htmlspecialchars($email); ?>!</p>
        <p>Login realizado com sucesso.</p>
    </div>
<?php elseif ($erro !== ""): ?>
    <p class="erro"><?php echo htmlspecialchars($erro); ?></p>
<?php endif; ?>

</body>
</html>




