<?php

// Dados de acesso ao PostgreSQL
$host = "localhost";
$porta = "5432";
$banco = "senai";
$usuario = "postgres";
$senhaBanco = "SUA_SENHA_DO_POSTGRES";

echo "=== Cadastro de colaborador ===\n";

echo "Nome: ";
$nome = trim(fgets(STDIN));

echo "E-mail: ";
$email = trim(fgets(STDIN));

echo "Senha: ";
$senha = trim(fgets(STDIN));

// Validar nome e e-mail
if ($nome == "") {
    echo "O nome é obrigatório.\n";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Digite um e-mail válido.\n";
    exit;
}

// Validar senha
if (strlen($senha) < 8) {
    echo "A senha precisa ter pelo menos 8 caracteres.\n";
    exit;
}

if (!preg_match("/[A-Z]/", $senha)) {
    echo "A senha precisa ter uma letra maiúscula.\n";
    exit;
}

if (!preg_match("/[a-z]/", $senha)) {
    echo "A senha precisa ter uma letra minúscula.\n";
    exit;
}

if (!preg_match("/[0-9]/", $senha)) {
    echo "A senha precisa ter um número.\n";
    exit;
}

if (!preg_match("/[^a-zA-Z0-9]/", $senha)) {
    echo "A senha precisa ter um caractere especial.\n";
    exit;
}

// Conferir se o PHP tem suporte a Argon2id
if (!defined("PASSWORD_ARGON2ID")) {
    echo "Este PHP não oferece PASSWORD_ARGON2ID. Verifique a instalação do PHP.\n";
    exit;
}

try {
    $conexao = new PDO(
        "pgsql:host=$host;port=$porta;dbname=$banco",
        $usuario,
        $senhaBanco
    );

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $hashSenha = password_hash($senha, PASSWORD_ARGON2ID);

    $sql = "INSERT INTO usuarios (nome, email, senha)
            VALUES (:nome, :email, :senha)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nome,
        ":email" => $email,
        ":senha" => $hashSenha
    ]);

    echo "Colaborador cadastrado com sucesso!\n";

} catch (PDOException $erro) {
    echo "Erro ao cadastrar: " . $erro->getMessage() . "\n";
}