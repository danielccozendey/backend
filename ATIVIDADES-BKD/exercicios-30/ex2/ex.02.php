<?php

require_once "ConexaoBanco.php";

// Nome do arquivo de configuração
define("ARQUIVO_CONFIG", "database.ini");

echo "Testando o padrão Singleton...\n";
echo "--------------------------------\n";

// Primeira chamada: cria a conexão
$conexao1 = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

// Segunda chamada: reutiliza a mesma conexão
$conexao2 = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

// Pega o identificador de cada objeto na memória
$id1 = spl_object_id($conexao1);
$id2 = spl_object_id($conexao2);

echo "ID da conexão 1: $id1\n";
echo "ID da conexão 2: $id2\n";
echo "--------------------------------\n";

// Verifica se são exatamente o mesmo objeto
if ($conexao1 === $conexao2) {
    echo "As duas variáveis apontam para a mesma conexão.\n";
    echo "O padrão Singleton está funcionando corretamente.\n";
} else {
    echo "As variáveis apontam para conexões diferentes.\n";
    echo "O padrão Singleton NÃO está funcionando.\n";
}