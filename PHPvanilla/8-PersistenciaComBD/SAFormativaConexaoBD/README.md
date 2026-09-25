# Criação de uma aplicação para Teste de Conexão PDO com Singleton e PDOException

## Passo 1 - Validando a Extensão `pdo_pgsql` e o Serviço do Postgres

1. Abra o Terminal e digite:
```bash
php -m | findstr -i pgsql
```
*Saída Esperada:* deve listar `pdo_pgsql` e o `pgsql`

Caso não aparece:
- abra o `php.ini`
- Localize a linha `;extension=pdo_pgsql` e remova o ponto e virgula inicial(`;`);
- Salve o arquivo e valide novamente o comando

2. Validando o **PostgreSQL**

Usando a Extensão do VSCode = postgresql -> instalar a extensão Chris Kolkman

## Passo 2 - Estrutura de Diretórios do Projeto

Organize a raiz do projeto exatamente com a seguinte árvore de pastas:

```text
SAFormativaConexaoBD/
├── config/
│   └── database.ini        <- Credenciais protegidas
├── logs/
│   └── database.log        <- Arquivo gerado para auditoria de falhas
├── src/
│   └── ConexaoBanco.php    <- Classe Singleton com PDO para PostgreSQL
├── schema.sql              <- Script DDL e DML para o PostgreSQL
├── index.php               <- Painel de diagnóstico e testes operacionais
└── README.md               <- Documentação do Projeto
```

## Passo 3 - Executando o Script DDL no PostgreSQL (`schema.sql`)

```sql
-- Cria o banco de dados da biblioteca (caso use o terminal psql)
CREATE DATABASE escola_biblioteca WITH ENCODING 'UTF8';

-- Cria a tabela de acervo de livros
CREATE TABLE IF NOT EXISTS livros (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(120) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    preco NUMERIC(6,2) NOT NULL,
    status VARCHAR(15) NOT NULL DEFAULT 'DISPONIVEL' 
        CHECK (status IN ('DISPONIVEL', 'EMPRESTADO', 'RESERVADO')),
    data_cadastro TIMESTAMP WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- Insere alguns livros iniciais para teste
INSERT INTO livros (titulo, autor, preco, status) 
VALUES 
('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 39.90, 'DISPONIVEL'),
('Dom Casmurro', 'Machado de Assis', 29.90, 'EMPRESTADO'),
('1984', 'George Orwell', 45.00, 'RESERVADO');
```

## Passo 4 - Criando a Arquivo de Configuração (`config/database.ini`)

adicionamso as informações relativas a infraestrutura do banco de dados

e adicionamso o caminho do arquivo ao .gitignore (arquvio não é versionado e não tem perigo de vazar informações confidenciais para a internet)

## Passo 5 - Construir a Classe de Conexão usando a técnica Singleton (`src/ConexaoBanco.php`)

Vamos criar um Arquivo que terá a classe de conexão usando a técnica de singleton e os atributos e métodos necessários para realizar conexão com o banco de dados



