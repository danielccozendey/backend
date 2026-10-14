Parte A — Exercícios teóricos


1-  Abstração de dados (PDO)
PDO (PHP Data Objects) é uma interface orientada a objetos para acessar bancos de dados no PHP. Sua principal vantagem é oferecer uma API padronizada para diversos SGBDs, como PostgreSQL, MySQL e SQLite, reduzindo o acoplamento do projeto a uma extensão específica, como a antiga pgsql.
Em projetos corporativos, isso melhora a manutenção, facilita uma eventual troca de banco, padroniza o tratamento de erros e incentiva o uso de consultas preparadas, que ajudam a prevenir SQL Injection. O driver PDO_PGSQL implementa essa interface para o PostgreSQL.

2-Ciclo do DSN
DSN (Data Source Name) é a string que informa ao PDO qual banco acessar e onde ele está. Para PostgreSQL, os elementos costumam ser separados por ponto e vírgula.

host: endereço/IP ou nome do servidor onde o PostgreSQL está em execução, por exemplo, localhost

port: porta TCP pela qual o servidor aceita conexões

dbname: nome do banco de dados que será utilizado
A DSN identifica o destino da conexão; usuário e senha são normalmente informados separadamente.

3- Padrão de portas
A porta padrão do PostgreSQL é a 5432. Na string de conexão, ela é indicada pelo parâmetro port, como em uma conexão que contenha port=5432. Se a aplicação e o servidor usarem a porta padrão, ela pode até ser omitida, mas indicá-la torna a configuração mais explícita.

4- Flags de integridade
Ao configurar PDO::ATTR_ERRMODE com PDO::ERRMODE_EXCEPTION, erros de operações no banco passam a lançar uma PDOException. Isso permite centralizar o tratamento com estruturas de exceção, registrar erros adequadamente e impedir que a aplicação siga como se a consulta tivesse funcionado.

No PHP 8 ou superior, o modo padrão já é PDO::ERRMODE_EXCEPTION. Em versões anteriores ao PHP a  enas registrava códigos de erro, exigindo que o programador verificasse manualmente cada operação.

5- Fetch mode e memória
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC faz com que cada linha retornada seja um array associativo indexado somente pelos nomes das colunas.

Isso evita a duplicação típica do modo padrão, que pode disponibilizar valores tanto por índice numérico quanto por nome de coluna. Assim, há menor uso de memória para representar os resultados, algo relevante em consultas que retornam muitas linhas.

6- Padrão Singleton e conexões
Criar uma nova conexão com new PDO() a cada consulta é inadequado porque cada conexão ativa consome recursos no PHP e no PostgreSQL. Em acessos simultâneos, isso pode atingir rapidamente o limite definido por max_connections, impedindo novas conexões e causando indisponibilidade.
No PostgreSQL, max_connections determina a quantidade máxima de conexões concorrentes; o valor típico padrão é 100, embora possa variar conforme a instalação.

O Singleton busca manter uma única instância reutilizável da conexão por ciclo de execução da aplicação, evitando aberturas desnecessárias.

7-Encapsulamento do Singleton
O construtor de ConexaoBanco deve ser private para impedir que outras partes do sistema criem objetos diretamente. Dessa forma, a classe controla a criação e devolve sempre a mesma instância pelo método responsável, normalmente um método estático de acesso.
Também devem ser bloqueados os métodos mágicos:

__clone(), para impedir cópias da instância

__wakeup(), para impedir que uma desserialização crie outra instância
Com isso, a classe preserva a regra de existir apenas uma conexão gerenciada por ela.

8-Segurança de credenciais
Usuário e senha não devem ficar fixos no código-fonte porque podem vazar por repositórios Git, backups, compartilhamentos de arquivos, capturas de tela ou acesso indevido ao servidor. Além disso, a troca de credenciais exigiria alterar o código e publicar uma nova versão.
O ideal é armazenar esses dados em variáveis de ambiente, arquivos de configuração fora do repositório ou serviços de gerenciamento de segredos. Cada ambiente — desenvolvimento, homologação e produção — deve ter credenciais próprias e com o menor privilégio necessário.

9-Exceções e LGPD
Exibir diretamente $e->getMessage() no navegador é uma falha de Information Disclosure porque a mensagem pode revelar detalhes internos: endereço do banco, nome da base, tabelas, estrutura de consultas, caminhos de arquivos, versão de componentes e, em certos casos, fragmentos de dados sensíveis. Esses detalhes ajudam um atacante a mapear o sistema e explorar vulnerabilidades.
A OWASP recomenda não expor detalhes de implementação, mensagens de exceção, rastros de depuração ou informações internas ao usuário.

Em produção, a aplicação deve mostrar uma mensagem genérica — por exemplo, “Não foi possível concluir a operação” — enquanto o detalhe técnico é registrado de forma protegida nos logs, com controle de acesso. Isso reduz o risco de vazamento de dados pessoais e contribui para os princípios de segurança da LGPD.