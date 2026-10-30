Parte A – Questões Teóricas de Fixação
1. O Colapso do Código Espaguete

Misturar tudo no mesmo arquivo deixa o código desorganizado, dificulta encontrar erros, fazer alterações e aumentar o sistema.

2. A Tríade MVC

O Model cuida dos dados e das regras de negócio, a View cuida da parte visual e o Controller controla as ações e a comunicação entre os dois.

3. O Papel do Composer

O primeiro arquivo define as bibliotecas necessárias para o projeto, enquanto o segundo registra suas versões exatas. A pasta de bibliotecas instaladas não deve ser enviada ao Git porque pode ser criada novamente.

4. A Especificação PSR-4

Permite que o PHP encontre automaticamente os arquivos das classes usando seus nomes e suas pastas, sem precisar incluí-los manualmente.

5. Front Controller

Centraliza as requisições em um único arquivo e protege os arquivos internos contra acessos diretos pela internet.

6. Roteador HTTP

Ele identifica o tipo de requisição e o endereço acessado para executar a ação correta, como listar ou cadastrar produtos.

7. Injeção de Dados na View

A função transforma os dados recebidos em variáveis que podem ser utilizadas diretamente nas páginas do sistema.

8. Segurança contra XSS nas Views

Evita que códigos maliciosos sejam executados no navegador quando informações são exibidas na página.

9. Single Responsibility no Controller

O Controller deve apenas controlar as requisições e organizar as ações. As conexões e consultas ao banco devem ficar separadas para facilitar a manutenção.

10. Transição para o Framework Laravel

O Laravel utiliza os mesmos conceitos de organização, separação de responsabilidades, rotas, modelos, controladores, visualizações, carregamento automático de classes e segurança, mas oferece ferramentas que facilitam o desenvolvimento.