1. Conceituação OWASP: XSS e Client-Side
XSS significa Cross-Site Scripting. É quando um atacante consegue injetar scripts maliciosos (geralmente JavaScript) em páginas web que outros usuários vão visitar.

Por que é Client-Side mas o Back-End previne: O código roda no navegador da vítima (Client-Side), acessando cookies e dados do usuário. Mas a prevenção tem que ser no Back-End porque é o servidor que envia o conteúdo para o navegador. Se o back-end não limpar os dados antes de enviar, o script malicioso vai como se fosse parte legítima da página.

2. Reflected vs Stored XSS
XSS Refletido: O script é refletido na hora, geralmente pela URL. Exemplo: site.com/busca?q=<script>alert('XSS')</script>. A vítima precisa clicar num link preparado e o ataque não persiste.

XSS Gravado (Stored): O script fica salvo no servidor (comentários, perfis, posts) e roda sempre que alguém acessa aquela página. Não precisa de link especial e fica lá até alguém remover.

Qual é pior: O Stored é muito mais perigoso porque atinge todo mundo que visita a página (não só quem clica num link), fica ativo por muito tempo, e vem de uma fonte confiável (o próprio site), então ninguém suspeita.

3. Mecanismo de Escapamento com htmlspecialchars()
O que ela faz: Transforma caracteres especiais em entidades HTML: < vira &lt;, > vira &gt;, & vira &amp;, e com ENT_QUOTES, as aspas " e ' também são convertidas.

Exemplo:

php
$entrada = '<script>alert("XSS")</script>';
$saida = htmlspecialchars($entrada, ENT_QUOTES, 'UTF-8');
// Vira: &lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;
Por que o navegador não executa: O navegador trata essas entidades como texto puro, não como código. Ele mostra < na tela, mas não interpreta como abertura de tag HTML. É a diferença entre mostrar o caractere e usar o caractere como markup.

4. Flags de Proteção: ENT_QUOTES
Para que serve: A flag ENT_QUOTES faz com que tanto aspas duplas (") quanto aspas simples (') sejam codificadas.

O risco de omitir: Num campo como <input value="<?= htmlspecialchars($input) ?>">, se alguém mandar input = " onclick="alert('XSS'), o value fecha antes e o onclick é injetado. Com ENT_QUOTES, as aspas viram &quot; e o ataque não funciona.

5. Anti-Alucinação PHP: FILTER_SANITIZE_STRING
Por que não usar no PHP 8.3: Essa função foi removida no PHP 8.3 (já estava descontinuada desde o 8.1). Além disso, ela dava uma falsa sensação de segurança — só removia tags, mas não protegia de verdade contra XSS.

O que fazer agora: Valide na entrada (veja se o dado faz sentido) e codifique na saída com htmlspecialchars() na hora de exibir.

6. Validação de E-mail: empty() vs filter_var()
empty($email): Só checa se tem alguma coisa. Um e-mail como "nome" passa, mesmo sendo inválido.

filter_var($email, FILTER_VALIDATE_EMAIL): Verifica se o formato é realmente um e-mail válido (tem @, domínio, etc.). "nome@dominio.com" passa, "nome" não.

Resumo: empty() diz se está preenchido, filter_var() diz se está certo.

7. Roubo de Sessão via XSS
Como funciona: O atacante injeta um script que pega o cookie de sessão da vítima (document.cookie) e manda para o servidor dele. Com esse cookie, ele consegue se passar pela vítima e acessar a conta dela.

Por que funciona: Se o cookie não tiver a flag HttpOnly, o JavaScript consegue ler. E como o script roda no domínio do site, o navegador não questiona.

Como se proteger: Sempre usar htmlspecialchars() na saída, marcar cookies como HttpOnly e Secure, e usar Content Security Policy.

8. Segurança em Camadas: Sanitizar na Entrada vs Codificar na Saída
Por que fazer os dois: Sanitizar na entrada (tipo strip_tags()) não é suficiente porque o mesmo dado pode ser usado em lugares diferentes (HTML, JavaScript, URL). Cada contexto exige uma proteção específica. Além disso, é defesa em camadas: se uma falhar, a outra segura.