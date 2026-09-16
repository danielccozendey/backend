1. GET vs POST — GET manda os dados na própria URL (query string após ?); POST manda no corpo da requisição, fora da URL.

2. Senhas via GET — Nunca usar, porque a URL fica exposta no histórico do navegador e nos logs do servidor (access.log), ambos em texto puro.

3. Coalescência nula (??) — Evita o Warning de "chave indefinida" quando o formulário ainda não foi enviado. $_POST['nome'] ?? '' retorna a string vazia se a chave não existir.

4. Idempotência — GET deveria ser seguro para repetir sem efeitos colaterais (só leitura). Usar GET para deletar/alterar é perigoso porque crawlers, proxies e ataques CSRF podem disparar a ação sem intenção do usuário.

5. Validação client vs server — Falsa, porque validação em HTML/JS roda no navegador do usuário, que pode ser burlado (desativando JS ou enviando requisição direto via Postman/curl). Só a validação no servidor é confiável.

6. XSS e sanitização — Risco de Cross-Site Scripting: dados não tratados podem injetar <script> malicioso na página. htmlspecialchars() converte caracteres especiais em entidades HTML, neutralizando o código.

7. Sticky Forms — Técnica de repreencher os campos com os valores já digitados após um erro de validação, evitando que o usuário redigite tudo — melhora a UX e reduz abandono.

8. DevTools (Network) — Abrir F12 → Network → marcar "Preserve log" → enviar o formulário → localizar a requisição → conferir o campo "Method" (deve mostrar POST) e verificar que os dados aparecem em "Form Data", não na URL.