Uma função é um bloco de código nomeado que executa uma tarefa específica e pode ser reutilizado várias vezes sem reescrever o código.


2- Copiar código é arriscado: esquecer de atualizar uma cópia gera problemas e inconsistência.

3- Parâmetro: entra na função (dado fornecido). Retorno: sai da função (resultado devolvido).


4- string $nome → parâmetro texto (nome)
int $idade → parâmetro número inteiro (idade)
bool → retorno, devolve true ou false (sucesso ou não do cadastro)


5 - string → a função devolve um texto, que você pode guardar numa variável.
void → a função não devolve nada, só executa uma ação (ex: exibir na tela).


6- Por quê: cada função tem seu próprio escopo — variáveis de fora não são visíveis automaticamente dentro dela.
 **Duas formas de corrigir**:

Passar como parâmetro (✅ recomendada)

Usar global (não recomendada);

7-  Sem & (por valor): a função recebe uma cópia — mudanças ficam só dentro dela, o original não muda.

Com & (por referência): a função recebe a variável original — mudanças dentro dela alteram o valor original também.

