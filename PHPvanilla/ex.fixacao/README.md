Parte A — Exercícios Teóricos


**1** . Protocolo Stateless
Dizer que o HTTP é stateless significa que, por si só, cada requisição é independente: o protocolo não mantém automaticamente um vínculo entre uma requisição e a próxima. Cookies e sessões permitem associar requisições ao mesmo navegador e preservar informações como o estado de login ou itens de um carrinho.

**2** . Cookies vs. Sessões
Um cookie é armazenado no navegador do usuário e enviado ao servidor em requisições seguintes. Já os dados de $_SESSION são mantidos pelo servidor; normalmente, o navegador guarda apenas um identificador de sessão que permite ao PHP localizar esses dados.

Para informações confidenciais, a sessão costuma ser mais segura porque os dados ficam no servidor, não diretamente no navegador. Ainda assim, o identificador de sessão precisa ser protegido: quem o obtiver pode tentar se passar pelo usuário.

**3** . Flag HttpOnly
Quando o cookie é configurado com HttpOnly, o JavaScript da página não pode ler seu valor por meio de document.cookie. Isso dificulta que um script injetado por uma falha de XSS roube o identificador da sessão e o envie ao atacante.

Mas HttpOnly não elimina a vulnerabilidade XSS nem impede que o script malicioso execute ações dentro da página já aberta. Ele protege a leitura do cookie pelo JavaScript, não todos os efeitos possíveis de um XSS.

**4** . Flag SameSite=Lax
SameSite=Lax controla quando o navegador envia o cookie em requisições iniciadas a partir de outro site. Em geral, permite o envio em navegações de nível superior com métodos seguros, como GET, mas restringe o envio em requisições cruzadas como POST. Isso ajuda a reduzir ataques de CSRF, nos quais um site malicioso tenta induzir o navegador autenticado a executar uma ação em outro site.

É uma defesa parcial: operações que alteram dados não devem usar GET, e SameSite não substitui outras medidas de proteção contra CSRF quando necessárias.

**5** . Ataque de Fixação de Sessão
No Session Fixation, o atacante tenta fazer com que a vítima use um identificador de sessão que ele já conhece. Se a aplicação mantiver esse mesmo identificador depois que a vítima entrar na conta, o atacante poderá tentar reutilizá-lo para acessar a sessão autenticada.

Após autenticação bem-sucedida, session_regenerate_id(true) gera um novo identificador e solicita a remoção do antigo. Assim, o identificador conhecido antes do login não deve continuar associado à sessão autenticada.

**6** . MD5, SHA-256 e Rainbow Tables
MD5 e SHA-256 são algoritmos rápidos de hash geral, não funções lentas projetadas para armazenar senhas. Se um banco de dados de hashes vazar, essa rapidez permite que atacantes testem muitas senhas candidatas em pouco tempo. Para senhas, recomenda-se usar algoritmos próprios e configuráveis, como Argon2id, bcrypt ou PBKDF2.

Rainbow tables são tabelas pré-computadas que relacionam hashes a possíveis entradas. Sem um salt único, um atacante pode comparar hashes roubados com tabelas já preparadas em vez de calcular tudo do zero.

**7** . Papel do Salt
Um salt é um valor único, normalmente aleatório, combinado com a senha durante o processo de hash. Com salts diferentes, dois usuários que escolham a mesma senha geram hashes diferentes; isso também dificulta o uso de tabelas pré-computadas e obriga o atacante a trabalhar hash por hash.

Com password_hash() do PHP, o salt é tratado e incluído no hash armazenado; em geral, não é necessário inventar ou concatenar um salt manualmente.

**8** . Argon2id vs. bcrypt
Argon2id foi projetado para dificultar a adivinhação em grande escala e permite configurar o uso de memória, além do custo de processamento. Essa característica torna mais caro paralelizar tentativas em GPUs e hardware especializado, que conseguem testar grandes quantidades de candidatos quando cada tentativa exige poucos recursos.

bcrypt também é uma opção reconhecida para armazenamento de senhas, mas não tem o mesmo parâmetro de custo de memória. A escolha e os parâmetros devem considerar a capacidade do servidor e ser ajustados para manter a verificação suficientemente custosa sem prejudicar o uso normal.

**9** . password_verify() e comparação com ===
A recomendação é usar password_verify() para comparar uma senha digitada com o hash armazenado. A função verifica a senha considerando as informações do hash e é documentada pelo PHP como segura contra ataques de temporização (timing attacks).

Uma comparação comum com === não foi feita especificamente para verificar hashes de senha de modo resistente a esses ataques. Por isso, não se deve recalcular o hash e compará-lo manualmente: use password_verify().