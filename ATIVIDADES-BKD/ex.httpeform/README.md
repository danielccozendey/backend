1. Diferença estrutural entre GET e POST

GET: os dados são anexados à URL, na chamada query string, que começa após o símbolo de interrogação. Cada informação aparece como par nome e valor, separados por “e comercial”. A requisição não possui corpo.

POST: os dados são enviados no corpo (body) da requisição HTTP, separados da URL. O cabeçalho informa o formato dos dados, e o endereço permanece limpo, sem parâmetros visíveis.

2. Senhas e o método GET

Como a senha passa a fazer parte da URL, ela fica registrada em locais inseguros:

Histórico do navegador: qualquer pessoa com acesso ao computador vê a URL completa.
Logs do servidor web: servidores como Apache e Nginx registram cada URL acessada, incluindo os parâmetros.
Barra de endereço e favoritos: a senha fica visível na tela ou pode ser compartilhada junto com o link.
Cabeçalho Referer: a URL pode vazar para sites de terceiros.
Proxies e cache: também podem armazenar a URL.

Observação: o POST evita esses vazamentos, mas não criptografa nada. Quem protege a senha durante o trânsito é o HTTPS.

3. Warning com $_POST['nome'] e o operador ??

Por que ocorre: na primeira vez que a página é carregada, o formulário ainda não foi enviado. Portanto, o $_POST está vazio e a chave “nome” não existe. Tentar ler uma chave inexistente gera o aviso de “Undefined array key”.

Como o ?? resolve: o operador de coalescência nula verifica se o valor da esquerda existe e não é nulo. Se existir, usa esse valor. Se não existir, usa o valor da direita, que pode ser, por exemplo, um texto vazio. Como ele não emite aviso ao testar chaves inexistentes, o warning desaparece. Equivale a combinar uma verificação de existência com uma escolha de valor padrão, porém de forma mais enxuta.

4. Idempotência e links GET

O que significa: uma requisição idempotente produz o mesmo efeito no servidor, não importa quantas vezes seja repetida. O GET deve apenas consultar dados, sem alterar o estado do sistema.

Por que é má prática usar GET para atualizar ou deletar:

Robôs e pré-carregamento: buscadores e navegadores podem acessar o link automaticamente e apagar registros sem querer.
CSRF: um atacante pode esconder o link em outro site ou em uma imagem, e o navegador da vítima, já autenticado, executa a ação.
Repetição acidental: recarregar a página, voltar no histórico ou usar um favorito repete a operação.
Manipulação fácil: basta alterar o identificador na URL para tentar afetar outros registros.

Ações que modificam dados devem usar POST (ou PUT/DELETE), com token CSRF e verificação de permissão no servidor.

5. Por que required e type="email" não garantem segurança

Essas validações acontecem no navegador do usuário, ambiente que o atacante controla. Elas podem ser contornadas facilmente:

Removendo ou editando os atributos pelo DevTools.
Enviando requisições diretas por ferramentas como curl ou Postman, sem usar o formulário.
Desativando o JavaScript ou usando um navegador que não valide.

Assim, qualquer dado que chega ao servidor pode ser inválido ou malicioso. A validação no cliente serve para melhorar a experiência do usuário. A validação e sanitização no servidor é a que garante a segurança. As duas devem coexistir, mas só a do servidor é confiável.

6. Risco de exibir $_POST sem htmlspecialchars()

O risco é o XSS (Cross-Site Scripting). Se o usuário enviar um script malicioso e o sistema o exibir diretamente, o navegador o interpretará como código e o executará.

Consequências possíveis: roubo de cookies e sessões, redirecionamento para sites falsos, alteração do conteúdo da página e captura de dados digitados.

Como a função protege: o htmlspecialchars() converte caracteres especiais em entidades HTML, fazendo com que o conteúdo seja exibido como texto comum e não executado.

7. Sticky Forms

O que é: técnica em que o formulário mantém os valores digitados pelo usuário quando a página é recarregada após o envio, principalmente em caso de erro de validação.

Impacto na UX:

O usuário não precisa preencher tudo novamente por causa de um único erro.
Reduz frustração, retrabalho e abandono do formulário.
Facilita a identificação e a correção do problema.

Cuidado: ao reexibir os dados nos campos, é necessário sanitizá-los com htmlspecialchars() para evitar XSS.

8. Comprovando POST na aba Network
Abra o DevTools (tecla F12) e acesse a aba Network (Rede).
Ative a opção Preserve log, para não perder o registro após o recarregamento.
Preencha e envie o formulário.
Clique na requisição correspondente ao arquivo PHP.
Na aba Headers, verifique o campo Request Method, que deve indicar POST.
Na aba Payload (ou Form Data), confira os dados enviados no corpo da requisição.
Observe que a URL não exibe os parâmetros. Em um GET, eles apareceriam na seção Query String Parameters.