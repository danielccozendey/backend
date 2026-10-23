<?php

// Função que registra um log no arquivo logs/sistema.log
function registrarLog(string $nivel, string $mensagem): void {

    // Aceita somente estes níveis
    $niveisPermitidos = ["INFO", "WARNING", "ERROR"];

    // Deixa o nível sempre em letras maiúsculas
    $nivel = strtoupper($nivel);

    // Se o nível não for válido, não registra
    if (!in_array($nivel, $niveisPermitidos)) {
        return;
    }

    // Pasta onde o log será salvo
    $pastaLogs = "logs";

    // Se a pasta logs não existir, cria ela
    if (!is_dir($pastaLogs)) {
        mkdir($pastaLogs, 0777, true);
    }

    // Caminho completo do arquivo de log
    $arquivoLog = $pastaLogs . "/sistema.log";

    // Pega a data e hora atual
    $dataHora = date("Y-m-d H:i:s");

    // Monta a linha no formato:
    // [DATA_HORA] [NIVEL] Mensagem
    $linha = "[{$dataHora}] [{$nivel}] {$mensagem}" . PHP_EOL;

    // Grava no final do arquivo
    file_put_contents($arquivoLog, $linha, FILE_APPEND);
}

// Função que tenta conectar no banco
function conectarBanco(string $host, string $porta, string $banco, string $usuario, string $senha): PDO {

    // Monta a conexão com o PostgreSQL
    $dsn = "pgsql:host={$host};port={$porta};dbname={$banco}";

    try {
        // Tenta conectar
        $conexao = new PDO($dsn, $usuario, $senha);

        // Mostra erros do PDO
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Se conectou, grava um log de sucesso
        registrarLog("INFO", "Conexão realizada com sucesso no banco '{$banco}'.");

        return $conexao;

    } catch (PDOException $erro) {
        // Se falhou, grava um log de erro
        registrarLog("ERROR", "Falha na conexão com o banco '{$banco}': " . $erro->getMessage());

        // Mostra o erro na tela
        die("Erro ao conectar no banco: " . $erro->getMessage());
    }
}


$host = "192.168.10.82";
$porta = "5432";
$banco = "senai_dev";
$usuario = "postgres";
$senha = "1234";

// Tenta conectar no banco
$conexao = conectarBanco($host, $porta, $banco, $usuario, $senha);

// Mostra que funcionou
echo "<h2>Logger seguro</h2>";
echo "<p>Conexão testada com sucesso!</p>";
echo "<p>O log foi salvo em: <strong>logs/sistema.log</strong></p>";

// Exemplos extras de log
registrarLog("WARNING", "Este é um exemplo de aviso.");
registrarLog("INFO", "Sistema iniciado corretamente.");