# Lista de Exercicios

## Parte A: Exercícios Teóricos de Fixação

1. **Definição de CRUD:** O que significa o acrônimo CRUD e qual é a correspondência direta de cada uma de suas letras com as instruções SQL no PostgreSQL?

O acrônimo **CRUD** representa as quatro operações fundamentais de persistência de dados em um sistema. No **PostgreSQL**, cada letra corresponde diretamente a um comando do SQL:
* **C (Create):** `INSERT` — Adiciona novos registros à tabela.
* **R (Read):** `SELECT` — Consulta e recupera os dados existentes.
* **U (Update):** `UPDATE` — Modifica dados já existentes em registros específicos.
* **D (Delete):** `DELETE` — Remove registros da tabela.

2. **Anatomia do SQL Injection:** Explique com suas próprias palavras como um atacante consegue alterar a lógica de uma consulta quando o código utiliza concatenação de strings com `$_GET` ou `$_POST`.

A alteração da lógica de uma consulta, quando o código utiliza concatenação de strings com `$_GET` ou `$_POST`, acontece por meio de uma vulnerabilidade clássica chamada **SQL Injection (Injeção de SQL)**. Quando o código junta duas strings para montar uma instrução SQL, o banco de dados não consegue distinguir (diferenciar) o que é a estrutura original do comando e o que é o dado enviado pelo usuário. O interpretador SQL trata tudo como uma única instrução unificada.

3. **Mecanismo das Prepared Statements:** Por que o envio de uma consulta em duas etapas (`prepare` e depois `execute`) impede que um texto digitado pelo usuário seja executado como instrução SQL pelo banco?

Primeiro o banco recebe e compila a query com os marcadores (prepare), já sabendo que eles são só dados. Depois recebe os valores (execute). Como a estrutura já está pronta, o que o usuário digitar nunca vira comando SQL: o banco apenas procura esse texto como valor.


4. **Marcadores Nomeados:** Qual é a vantagem de utilizar marcadores nomeados como `:sku` e `:preco` em vez de pontos de interrogação posicionais (`?`) em instruções SQL complexas?

A vantagem é a clareza e a facilidade de manutenção. Marcadores nomeados deixam claro o propósito de cada parâmetro na consulta e dispensam a necessidade de manter a ordem exata de vinculação, o que seria obrigatório e propenso a erros com o ponto de interrogação.


5. **Diferença entre Bindings:** Explique a diferença de comportamento entre os métodos `$stmt->bindValue()` e `$stmt->bindParam()`.

O método `bindValue()` vincula o valor **imediatamente**, no momento em que é chamado.
```php
$id = 10;
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$id = 20;
$stmt->execute();
```
Nesse caso, o valor utilizado será **10**, porque esse era o valor no momento do `bindValue()`.

O método `bindParam()` vincula uma variável por **referência**. O valor é lido somente quando o `execute()` é executado.
```php
$id = 10;
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$id = 20;
$stmt->execute();
```
Nesse caso, o valor utilizado será **20**.

| Método | Comportamento |
| :--- | :--- |
| `bindValue()` | Guarda o valor no momento da vinculação. |
| `bindParam()` | Guarda uma referência e lê o valor no momento da execução. |

Na maioria dos casos, `bindValue()` é mais simples. O `bindParam()` pode ser útil quando a mesma variável será modificada e reutilizada em um laço (loop). 



6. **Tipagem no PDO:** Qual é o risco de omitir o tipo de dado (ex: `PDO::PARAM_INT`) ao vincular uma variável que deveria ser estritamente numérica em uma cláusula `LIMIT`?

**6** - Tipagem no PDO: omitir o tipo de um valor que deveria ser inteiro, como em LIMIT, pode fazer o PDO tratá-lo como texto. Isso pode provocar erros, resultados inesperados ou incentivar soluções inseguras.

7. **Padrão DAO:** Qual é o benefício do padrão *Data Access Object* (DAO) em termos de manutenibilidade de software e do princípio de responsabilidade única (SOLID)?

O DAO separa o código responsável pelo acesso ao banco de dados das demais partes do sistema. Isso facilita a manutenção e segue o princípio da Responsabilidade Única (SRP) do SOLID.

8. **Operações de Update:** Por que a ausência de uma cláusula `WHERE` em um comando `UPDATE` é considerada um incidente gravíssimo em ambientes de produção?

Sem a cláusula `WHERE`, a instrução `UPDATE` altera os valores de **todas as linhas** da tabela indiscriminadamente. Em produção, isso sobrescreve dados consolidados do sistema, resultando na perda irreversível de integridade da informação.


9. **Impacto da LGPD:** De acordo com a Lei Geral de Proteção de Dados (LGPD), quais são as penalidades e impactos que uma organização pode sofrer caso ocorra vazamento de dados de clientes por falha de SQL Injection? 

Caso ocorra vazamento de dados de clientes por falhas de segurança como SQL Injection, a empresa pode sofrer sanções administrativas da ANPD. As penalidades incluem advertências, multas que podem chegar a 2 por cento do faturamento limite de 50 milhões de reais por infração, bloqueio ou eliminação dos dados afetados, além de danos à reputação da empresa e processos judiciais promovidos pelos clientes afetados.


