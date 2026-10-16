<?php

// Lê o arquivo de configuração
$config = parse_ini_file("database.ini", true);

// Pega os dados do banco
$host = $config["database"]["host"];
$porta = $config["database"]["port"];
$banco = $config["database"]["dbname"];
$usuario = $config["database"]["user"];
$senha = $config["database"]["password"];

// Monta a conexão
$dsn = "pgsql:host=$host;port=$porta;dbname=$banco";

try {
    // Tenta conectar
    $pdo = new PDO($dsn, $usuario, $senha);

    // Mostra erro caso alguma consulta falhe
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Pega a versão do PostgreSQL
    $versao = $pdo->query("SELECT version()")->fetchColumn();

    echo "Conexão realizada com sucesso!\n";
    echo "Porta $porta acessível.\n";
    echo "Banco $banco acessível.\n";
    echo "Versão do PostgreSQL: $versao\n";

} catch (PDOException $e) {
    echo "Erro ao conectar no banco de dados.\n";
    echo "Verifique o host, a porta, o nome do banco, o usuário e a senha.\n";
}