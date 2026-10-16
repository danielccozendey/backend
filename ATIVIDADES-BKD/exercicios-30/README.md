1 - O que é o PDO
O PDO, ou PHP Data Objects, é uma camada de acesso a bancos de dados oferecida pelo PHP. Ele fornece uma forma padronizada de conectar, consultar e tratar erros, independentemente do banco utilizado, como PostgreSQL ou MySQL. É preferível a extensões antigas e procedurais porque facilita a manutenção, melhora a organização do código, permite maior portabilidade e incentiva práticas mais seguras, como consultas preparadas.

2 - O que é a DSN
A DSN, ou Data Source Name, é uma cadeia de texto que informa ao PDO como localizar e acessar o banco de dados. Ela define o tipo de banco e os parâmetros necessários para a conexão. No PostgreSQL, os principais parâmetros são o host, que indica o endereço do servidor; a porta, que identifica o canal de comunicação; e o nome do banco, que determina qual banco será utilizado.

3 - Porta padrão do PostgreSQL
A porta padrão de escuta do PostgreSQL é a 5432. Ela representa o canal pelo qual o servidor aguarda conexões. Dentro da DSN, essa porta é informada pelo parâmetro de porta, permitindo que o PHP saiba onde se comunicar com o banco.

4 - Tratamento de erros com exceções
Ao configurar o modo de erro para exceções, o PDO interrompe a execução normal quando ocorre uma falha na conexão ou em uma consulta, lançando uma exceção que pode ser tratada de forma controlada. Sem essa configuração, em versões antigas do PHP, o PDO apenas registrava o erro silenciosamente, exigindo verificação manual. A partir do PHP 8, o comportamento por exceção já é o padrão.

5 - odo de leitura associativa
O modo de leitura associativa organiza os resultados pelos nomes das colunas, evitando índices numéricos duplicados. Isso economiza memória no servidor, pois cada registro ocupa menos espaço. Em consultas com muitos dados, essa economia é importante para o desempenho da aplicação.

6 - Por que usar uma única conexão
Cada conexão nova consome recursos do servidor PostgreSQL. Se a aplicação abrir uma conexão a cada consulta, o número de conexões simultâneas pode aumentar excessivamente e atingir o limite máximo permitido pelo banco. O padrão Singleton mantém uma única conexão compartilhada, reduzindo o consumo de recursos e evitando falhas por esgotamento de conexões.

7 - Construtor privado no Singleton
O construtor deve ser privado para impedir que outras partes do sistema criem novas instâncias da classe de conexão. Assim, apenas a própria classe pode controlar a criação da conexão. Também é necessário bloquear a clonagem e a desserialização, pois esses mecanismos poderiam gerar cópias e comprometer a unicidade da instância.

8 - Proteção das credenciais
Usuário e senha do banco não devem estar escritos diretamente no código-fonte. Caso o projeto seja exposto, compartilhado ou tenha o repositório vazado, as credenciais poderão ser descobertas. O correto é armazená-las em variáveis de ambiente ou em serviços seguros de gerenciamento de segredos.

9 - Exibição de erros e LGPD
Exibir a mensagem de erro do banco diretamente no navegador pode revelar informações internas, como nomes de tabelas, estrutura do banco e detalhes do servidor. Isso configura uma falha de exposição de informações e facilita ataques. A prática correta é registrar o erro em log protegido e mostrar ao usuário apenas uma mensagem genérica. Essa medida também ajuda a proteger dados pessoais e reduz riscos relacionados à LGPD.