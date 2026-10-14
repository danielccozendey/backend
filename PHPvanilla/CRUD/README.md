**1** - CRUD: significa Create, Read, Update e Delete. No PostgreSQL, correspondem respectivamente a INSERT, SELECT, UPDATE e DELETE.

**2** - SQL Injection: acontece quando valores recebidos por $_GET ou $_POST são juntados diretamente ao texto da consulta. Um atacante pode inserir conteúdo que modifica a lógica do SQL e possibilita acesso, alteração ou exclusão indevida de dados.

**3** - Prepared Statements: separam a estrutura da consulta dos dados enviados pelo usuário. O banco interpreta os valores apenas como dados, e não como comandos SQL, reduzindo o risco de SQL Injection.

**4** - Marcadores nomeados: marcadores como :sku e :preco tornam consultas grandes mais claras e fáceis de manter. Eles reduzem o risco de trocar a ordem dos valores, problema comum com marcadores posicionais ?.

**5** - bindValue() e bindParam(): bindValue() envia um valor já definido. bindParam() vincula uma variável por referência, portanto utiliza o valor que a variável possuir no momento da execução da consulta.

**6** - Tipagem no PDO: omitir o tipo de um valor que deveria ser inteiro, como em LIMIT, pode fazer o PDO tratá-lo como texto. Isso pode provocar erros, resultados inesperados ou incentivar soluções inseguras.

**7** - DAO: o padrão Data Access Object concentra as consultas e operações de banco em uma camada específica. Isso facilita manutenção, testes, reutilização e segue o princípio de responsabilidade única, pois a classe DAO cuida apenas do acesso aos dados.

**8** - UPDATE sem WHERE: atualiza todos os registros da tabela. Em produção, isso pode sobrescrever dados de todos os clientes, produtos ou pedidos, causando corrupção de dados e necessidade de recuperação por backup.

**9** - LGPD: um vazamento causado por SQL Injection pode gerar advertência, obrigação de corrigir falhas, bloqueio ou eliminação de dados e divulgação pública da infração. A multa pode chegar a 2% do faturamento no Brasil, limitada a R$ 50 milhões por infração.