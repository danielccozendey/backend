<?php

class ConexaoBanco
{
    // Guarda a única conexão do sistema
    private static $conexao = null;

    // Impede que alguém crie a classe com new
    private function __construct()
    {
    }

    // Impede que alguém clone a conexão
    private function __clone()
    {
    }

    // Método que cria a conexão apenas uma vez
    public static function obterConexao($arquivoConfig)
    {
        // Se ainda não existe conexão, cria uma
        if (self::$conexao === null) {

            // Lê o arquivo database.ini
            $config = parse_ini_file($arquivoConfig, true);

            if ($config === false) {
                echo "Erro ao ler o arquivo database.ini\n";
                exit;
            }

            // Pega os dados do banco
            $host = $config["database"]["host"];
            $porta = $config["database"]["port"];
            $banco = $config["database"]["dbname"];
            $usuario = $config["database"]["user"];
            $senha = $config["database"]["password"];

            // Monta a DSN
            $dsn = "pgsql:host=$host;port=$porta;dbname=$banco";

            try {
                // Cria a conexão
                self::$conexao = new PDO($dsn, $usuario, $senha);

                // Configura erros como exceção
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                echo "Erro ao conectar no banco de dados.\n";
                echo "Verifique o host, a porta, o nome do banco, o usuário e a senha.\n";
                exit;
            }
        }

        // Retorna sempre a mesma conexão
        return self::$conexao;
    }
}