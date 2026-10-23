# Lista de Exercicios

## Parte A: Exercícios Teóricos de Fixação

1. Definição de CRUD
CRUD é um conjunto de quatro operações básicas que um sistema realiza com os dados de um banco. Ele serve para criar, consultar, alterar e excluir informações.

A letra C significa Create, ou seja, criar novos dados. No PostgreSQL, essa operação é feita com o comando INSERT.

A letra R significa Read, ou seja, ler ou consultar dados já cadastrados. Essa operação é feita com o comando SELECT.

A letra U significa Update, ou seja, atualizar informações que já existem. Essa operação é feita com o comando UPDATE.

A letra D significa Delete, ou seja, apagar dados do banco. Essa operação é feita com o comando DELETE.

Portanto, CRUD representa: Create com INSERT, Read com SELECT, Update com UPDATE e Delete com DELETE.

2. Anatomia do SQL Injection
O SQL Injection acontece quando o sistema monta o comando SQL colocando diretamente dentro dele informações digitadas pelo usuário, como dados vindos de formulários ou da barra de endereço do navegador.

O problema é que o banco de dados não consegue separar o que é parte do comando SQL e o que é apenas um dado comum. Assim, se o atacante digitar caracteres especiais e palavras próprias do SQL, ele pode enganar o sistema.

Por exemplo, em vez de enviar apenas um e-mail, o atacante pode enviar um texto que faz a condição da consulta se tornar verdadeira. Com isso, ele pode burlar um login, ver informações de outros usuários ou conseguir acesso a dados que não deveria ver.

Em resumo, o SQL Injection permite que o atacante altere a lógica da consulta porque o texto malicioso é tratado como se fosse parte do comando SQL.

3. Mecanismo das Prepared Statements
As Prepared Statements protegem o sistema porque separam o comando SQL dos dados enviados pelo usuário.

Primeiro, o programa envia ao banco apenas a estrutura da consulta, com espaços reservados para os valores. Depois, ele envia somente os valores digitados pelo usuário.

Dessa forma, o banco já sabe qual é o comando e entende que os valores são apenas dados. Mesmo que o usuário digite algo malicioso, o banco não vai interpretar aquilo como código SQL.

Por isso, o atacante pode mudar o valor que envia, mas não consegue mudar a lógica da consulta.

4. Marcadores Nomeados
Os marcadores nomeados, como :sku e :preco, são nomes dados aos valores que serão usados na consulta.

A vantagem é que o código fica mais fácil de entender. Em vez de usar vários pontos de interrogação, cada valor tem um nome claro. Assim, fica evidente qual valor é o código do produto, qual é o preço e assim por diante.

Isso também diminui erros. Com os pontos de interrogação, é preciso acertar exatamente a ordem dos valores. Se a ordem estiver errada, o banco pode gravar uma informação no lugar errado. Com os marcadores nomeados, cada valor é identificado pelo nome, tornando o código mais seguro e mais fácil de manter.

5. Diferença entre Bindings
O método bindValue() envia o valor para a consulta no momento em que ele é vinculado. Ou seja, o valor é copiado naquele instante. Se a variável mudar depois, o valor que já foi enviado não muda.

Já o método bindParam() vincula a própria variável à consulta. O valor só é lido quando a consulta for executada. Portanto, se a variável mudar antes da execução, o banco receberá o valor mais recente.

Em resumo, bindValue() usa o valor fixado na hora da vinculação, enquanto bindParam() usa o valor que a variável tiver no momento da execução.

6. Tipagem no PDO
Quando um valor deveria ser um número, é importante informar ao PDO que ele é um número. Isso evita que o valor seja tratado como texto.

Em comandos como LIMIT, o banco espera receber um número inteiro. Se o valor for enviado como texto, a consulta pode dar erro ou não funcionar como esperado.

Definir o tipo correto ajuda o sistema a tratar o dado da maneira adequada, deixando a aplicação mais segura, mais estável e menos propensa a erros.

7. Padrão DAO
O padrão DAO, que significa Data Access Object, é uma forma de organizar o código separando a parte que conversa com o banco de dados das outras partes do sistema.

Com o DAO, todas as operações de inserir, consultar, alterar e excluir ficam concentradas em classes específicas. Assim, o restante do sistema não precisa saber como as consultas são feitas.

Isso facilita a manutenção, porque se o banco mudar, o desenvolvedor sabe que deve alterar apenas a camada DAO. O código também fica mais organizado e mais fácil de testar.

O DAO ajuda no princípio da responsabilidade única do SOLID, porque cada classe passa a ter apenas uma função: o DAO cuida do acesso aos dados, enquanto outras classes cuidam das regras de negócio ou da interface com o usuário.

8. Operações de Update
Um comando de atualização sem a cláusula WHERE é muito perigoso porque ele altera todos os registros da tabela, e não apenas um registro específico.

Por exemplo, se o sistema quiser alterar o preço de apenas um produto, mas esquecer de informar qual produto deve ser alterado, o banco pode atualizar o preço de todos os produtos de uma vez.

Isso pode causar prejuízos grandes, perda de dados importantes e problemas sérios para a empresa. Por isso, todo comando de atualização deve ter uma condição clara que diga exatamente quais registros devem ser modificados.

9. Impacto da LGPD
Se uma empresa sofrer vazamento de dados por causa de SQL Injection, ela pode sofrer punições previstas na Lei Geral de Proteção de Dados.

Entre as penalidades estão advertência, multa simples, multa diária e a divulgação pública da infração. A autoridade responsável também pode determinar o bloqueio ou a eliminação dos dados envolvidos e, em casos mais graves, suspender parcial ou totalmente as atividades da empresa relacionadas ao tratamento de dados.

As multas podem chegar a dois por cento do faturamento da empresa, com limite de cinquenta milhões de reais por infração.

Além das punições legais, a empresa pode perder a confiança dos clientes, sofrer ações judiciais, ter prejuízos financeiros e prejudicar sua reputação. Por isso, evitar falhas de segurança como o SQL Injection é fundamental para proteger os dados dos clientes e cumprir a LGPD.