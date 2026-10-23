<?php

declare(strict_types=1);

// Exercício 1 - Gerenciador de ferramentas (CLI)
// Para rodar: php ex01_cli_ferramentas.php

// função que conecta no banco
function conectar(): PDO
{
    $dsn = "pgsql:host=localhost;port=5432;dbname=feramentas_db";
    $pdo = new PDO($dsn, "postgres", "postgres");

    // faz o PDO mostrar os erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

// mostra o menu na tela
function mostrarMenu(): void
{
    echo "\n--- MENU ---\n";
    echo "1 - Cadastrar nova ferramenta\n";
    echo "2 - Listar ferramentas ativas\n";
    echo "3 - Sair\n";
    echo "Opcao: ";
}

// le o que o usuario digitou no terminal
function ler(): string
{
    $texto = fgets(STDIN);

    // se der erro ou acabar a entrada, devolve vazio
    if ($texto === false) {
        return "";
    }

    return trim($texto);
}

// faz o INSERT da ferramenta no banco
function inserir(PDO $pdo, string $nome, string $categoria, float $preco): void
{
    $sql = "INSERT INTO ferramentas (nome, categoria, preco, ativa)
            VALUES (:nome, :categoria, :preco, :ativa)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nome" => $nome,
        ":categoria" => $categoria,
        ":preco" => $preco,
        ":ativa" => "true",
    ]);
}

// pergunta os dados pro usuario e chama o inserir
function cadastrar(PDO $pdo): void
{
    echo "Nome: ";
    $nome = ler();
    echo "Categoria: ";
    $categoria = ler();
    echo "Preco: ";
    $preco = str_replace(",", ".", ler());

    // validacao simples
    if ($nome == "" || $categoria == "" || !is_numeric($preco)) {
        echo "Dados invalidos!\n";
        return;
    }

    inserir($pdo, $nome, $categoria, (float) $preco);
    echo "Ferramenta cadastrada!\n";
}

// lista so as ferramentas que estao ativas (SELECT)
function listar(PDO $pdo): void
{
    $sql = "SELECT id, nome, categoria, preco FROM ferramentas WHERE ativa = :ativa ORDER BY id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":ativa" => "true"]);
    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($lista) == 0) {
        echo "Nenhuma ferramenta ativa.\n";
        return;
    }

    foreach ($lista as $f) {
        echo $f["id"] . " | " . $f["nome"] . " | " . $f["categoria"] . " | R$ " . $f["preco"] . "\n";
    }
}

// escolhe o que fazer de acordo com a opcao (retorna false pra sair)
function tratarOpcao(PDO $pdo, string $opcao): bool
{
    if ($opcao == "1") {
        cadastrar($pdo);
    } elseif ($opcao == "2") {
        listar($pdo);
    } elseif ($opcao == "3" || $opcao == "") {
        echo "Saindo...\n";
        return false;
    } else {
        echo "Opcao invalida!\n";
    }

    return true;
}

// funcao principal, fica repetindo o menu ate o usuario sair
function main(): void
{
    try {
        $pdo = conectar();
    } catch (PDOException $e) {
        echo "Erro ao conectar: " . $e->getMessage() . "\n";
        return;
    }

    $continuar = true;
    while ($continuar) {
        mostrarMenu();
        $continuar = tratarOpcao($pdo, ler());
    }
}

main();