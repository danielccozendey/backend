# Curso BackEnd -  1º Semestre - 105h

Prof. Diogo Barbosa

Escola SENAI Americana 

2º Semestre 2026

## Objetivos do Curso

- Desenvolver Aplicações web Server Side, utilizando a linguagem PHP;
- Aplicar Sintaxe nativa Php Vanilla;
- Manipulação HTTP;
- Persistência de Dados(Armazenamento em BD);
- Segurança contra SQL Injection/CSRF;
- Refatoração em POO (Programação Orientada Objeto);
- Arquitetura MVC;
- Utilização do FrameWork Laravel;

## Cronograma do Semestre

Carga Horária: 105h

Duração: 20 Semanas

### Semana 1: Introdução ao BackEnd e Configuração do Ambiente PHP

#### O que é BackEnd

O back-end é a parte de um site ou aplicativo que o usuário não vê, mas que faz tudo funcionar por trás das telas.

- Guarda e organiza informações em um banco de dados;
- Confere se o login e a senha estão corretos;
- Calcula valores, como o frete ou o total de uma compra;
- Garante que os dados de um usuário não apareçam para outro;
- Faz o sistema suportar muitas pessoas usando ao mesmo tempo, sem travar.

As principais linguagens utilizadas no desenvolvimento back-end são PHP, JavaScript/TypeScript, Python, Java, Kotlin, Go (Golang), C# e Rust. 

O backend é o "cérebro" oculto de um site ou aplicativo. Ele roda em um servidor e cuida de tudo o que o usuário não vê na tela.

**As 3 partes básicas de todo backend:**

1. **Servidor:** o "computador" que fica ligado esperando pedidos (requisições);
2. **Banco de dados:**  onde as informações ficam guardadas (usuários, produtos, mensagens, etc.);
3. **Lógica de negócio:**  as regras do sistema (ex: "não deixa comprar se não tiver estoque").

**O Mercado de Trabalho em Back-end**

O desenvolvimento Back-end é uma das áreas mais cruciais da Tecnologia da Informação. 

- Com a transformação digital acelerada, empresas de todos os portes e setores dependem de infraestruturas sólidas e seguras. 

- Setores de Atuação: Bancos, hospitais, e-commerces, logística, indústrias, startups e órgãos públicos utilizam Back-end para suportar suas operações críticas.

- Fatores de Crescimento: O avanço da computação em nuvem, aplicativos móveis, Big Data e IA impulsiona continuamente a busca por profissionais da área.

- Modelos de Trabalho: Alta flexibilidade com vagas presenciais, híbridas e remotas (inclusive com oportunidades internacionais).

#### Ciclo de Vida da Requsição HTTP

##### O que é HTTP

**HTTP**, Hypertext Transfer Protocol, é um protocolo de comunicação utilizado para transferência de informações na WWW(World Wide Web) e em outros sistemas de Redes.

O HTTP é a base para que o cliente e um servidor web troquem informações. Ele permite a requisição e a respostas de recursos, como imagens, arquivos e as própias páginas web, por meio de mensagens padrão (protocolo).

##### Como Funciona o HTTP

1. O cliente estabele contato com o servidor, encamihando uma requisição HTTP;
2. Nessa Requisição o cliente especifica o método pretendido (read-GET, create-POST, update-PUT/PATCH, delete-DELETE)
3. o Servidor processa e responde com uma mensagem HTTP, com os recursos solicitado.

```mermaid

graph TD

    A[Navegador]
    B[HTTP]
    C[Servidor]

    A --> |Request| B
    B --> |Request| C
    C --> |Response| B
    B --> |Response| A

```

#### Como Funciona na Prática o BackEnd

- **Ação do Usuário**: Envia uma Solicitação pela UI(Interface do Usuário). Exemplo de UI: Tela do Celular, Navegador da Internet, Alexa ...
- **Envio do Requisição**: A UI transforma ação do Usuário em uma Requisição HTTP
- **O Processamento BackEnd**: o Código Backend recebe o pedido, valida os dados e decide o que fazer (Ex: consulta uma informação no banco de dados)
- **Resposta**: O servidor devolve o resultado para a UI (Ex. Um Login Autorizado, Uma Compra Confirmada, )

#### Tipos de Requisição HTTP

Os tipos de de requisição HTTP indicam a ação que o usuário deseja executar no servidor. As principais ações são:

- **GET**: Pede dados de um lugar especifico. "Não Faz Alterações no Servidor"
- **POST**: Envia dados novos para *criar* algo ou processar informações.
- **PUT/PATCH**: Modificar dados já existentes. *PUT* Atualização Total dos dados. *PATCH* Atualização Parcial dos dados.
- **DELETE**: Apaga um dado do Servidor

---

#### Iniciando o PHP

##### O que é PHP

**PHP** (Hypertext PreProcessor) é uma liguagem de programação interpretada e open source, focada no desenvolvimento de sistemas para web, pode ser usada junto com HTML para criação de págians web dinâmicas.

##### Instalando o PHP

- Fazer o Download do PHP (php.net);
- ZIP - Non Thread Safe 8.5
- Descompactar o Arquivo do PHP na pasta C:\src\php (Para Descompactar, usar o 7Zip = Melhor) => nunca salvar arquivo na raiz do sistema(C:)
- Modificar o arquivo php.ini-development para => php.ini ( criar as configurações do PHP na Máquina) - adicionar ou remover funcionalidade do PHP
- Adicionar a Pasta do PHP(C:\src\php) as Variaveis de Ambiente do Sistema (PATH)
- verificar a instalação rodando o Comando php --version

##### Contextualizando o PHP

O PHP de fato é uma das linguagens de programação mais populares da atualizada. Ela permite que você crie aplicações web robustas, de uma maneira muito simplifica e direto ao ponto. Sem contar que a linguagem traz diversos recursos que facilitam e aceleram o processo de desenvolvimento de sites e sistemas para web. E além do mais, ela ainda tem um ótimo ecossistema, uma excelente comunidade e um grande mercado de trabalho. 

##### Criando Minha Primiera Aplicação em PHP

Criando um Hello, World!!!

##### Criando o Perfil de PHPVanilla

-> Profile -> New Profile
-> Extensions:
- PHP IntePhense ( A do Elefantinho ): AutoCompletar (Snipets)
- PHP Debug (Xdebug): Acha Erros em Linha de Código
- PHP CS FIXER: Formatação padrão do Código (Identação)
- PHP Server: Sobre um Servidor Local para Acompanhamento em Tempo Real

##### Estudo de Variáveis e Constantes em PHP

Declarar variáveis é alocar um espaço na memoria que permite a inclusão e manipulação de dados.

**Variáveis**

- devem ser declaradas usando "$" antes do nome da variável
- podem ser String, Numérica (Integer e float), Booleanas e Nulas. Não Permite declaração de Undefined
- são não tipadas ( não precisa declara o tipo na criação), a tipagem é atribuida ao adicionar o valor
- Usar o "declare(strict_types=1);" na primeira linha do arquivo ; => blindar o sistema contra conflitos de tipos de variáveis

**Constantes**

- não podem ser modificas ou redeclaradas após a criação
- pode ser criada usando "const" ou "define"
- não permitem interpolação

---

### Semana 2 - Operadores em PHP (Aritméticos, Relacionais e Lógicos)

#### Estudo de Operadores

**Aritméticos**: São usados para Realizar Cálculos.

| Operador | Nome | Exemplo | Resultado |
| - | - | - | - |
| + | Adição | 10 + 5 | 15 |
| - | Subtração | 10 - 5 | 5 |
| * | Multiplicação | 10 * 5 | 50 |
| / | Divisão | 10 / 5 | 2 |
| % | Módulo (Resto) | 10 % 3 | 1 (10 div 3 da 3, sobra 1) |
| ** | Expoente | 2 ** 3 | 8(2 elevado a 3) |

obs: O Operador % é o melhor amigo de um programador, permite ordenar listas e porganizar fila e pilhas

**Relacionais**: Permitem uma Comparação entre dois ou mais valores, o  resultado de uma operação relacional é sempre uma booleana (true , false)

| Nomes | Operador | Exemplo | Resultado |
| - | - | - | - |
| Iguais | == | "10"==10 | true | 
| Igualdade Estrita | === | "10"===10 | false | 
| Diferente | != | "10"!=10 | false |
| Diferença Estrita | !== | "10"!==10 | true |
| Maior que | > | 18 > 18 | false |
| Menor que | < | 10 < 20 | true |
| Maior ou Igual | >= | 18 >= 18 | true |
| Menor ou igual | <= | 10 <= 5 | false |

**Lógicos**: Permite a Combinação entre sentenças.

- Operador AND (E) => && : para o resultado se verdaddeiro, TODAS as Combinações precisam ser verdadeiras
    - true && true => true
    - true && false => false

- Operador OR (OU) => || : para o resultado ser verdadeiro , Basta APENAS UMA condição ser verdadeira
    - false || true => true
    - false || false => false

- Operador NOT (Não) => ! : Inverte a lógica da Sentença
    - !true => false
    - !false => true

### Semana 3 - Estrutura de Controle de Dados ( Condicionais e Repetição)

- **Conteúdo**: Estruturas `if`, `else`, `elseif`, operadores ternários, `match` => substituto do `swicth/case`, loops `for`, `while`, `do-while` e `foreach`

#### Estrutura de Controle de Dados ajudam no processo de automatização em programas e sistemas

##### Condicionais (IF, ELSE, ELSEIF)

**Forma de Uso**:

- Uso do `if` apenas: 
Exemplo: aplicar um desconto de 10% em comrpas acima de 100 Reais;

```mermaid

graph LR
    A[Comando] --> B[Condição] --> C[Tomada de Decisão]

```

```php
if ($valorCompra > 100) {
    $valorCompra = $valorCompra * 0.9;
}
```

- Uso do `if` e do `else`
Exemplo: Aplicar um desconto de 10% para compras acima de 100 reais e 5% para as demais compras

```mermaid

graph LR

    A[Comando] --> B{Condição}
    B --> |true| C[Ação 1]
    B --> |false| D[Ação 2]

```

```php

if($valorCompra > 100) {
    $valorFinal = $valorCompra*0.9;
} else{
    $valorFinal = $valorCompra*0.95;
}

```

- Uso do `elseif` (Encadeado)
Exemplo: Comrpas acima de 200 reais tem 15% de desconto, acimda de 100 reais tem 10% de desconto e outras 5% de desconto

```mermaid

graph LR
    A[Comando] --> B{Condição 1}
    B --> |true| C[Ação 1]
    B --> |false| D{Condição 2}
    D --> |true| E[Ação 2]
    D --> |false| F[Ação 3]

```

```php 

if($valorCompra > 200) {
    $valorFinal = $valorCompra*0.85;
} elseif($valorCompra >100) {
    $valorFinal - $valorCompra*0.9;
} else {
    $valorFinal = $valorCompra*0.95;
}

```

*obs*: sempre usar `elseif` para situações que precisam de mais de uma condição, ou seja, fazer encadeamento das condições. 

- Uso **ERRADO** do if

Não Fazer o Encadeamento de condicionais

```php

if($valorCompra > 200) {
    $valorFinal = $valorCompra*0.85;
}
if($valorCompra > 100) {
    $valorFinal = $valorCompra*0.90;
}
if($valorCompra < 100) {
    $valorFinal = $valorCompra*0.95;
}

```




##### Operadores Ternários
Um atalho para a estrutura condicional `if/else`, normalmente escrito em uma unica linah de código.

` condição  ? verdadeira : falso `

Perfeito para decisões curtas de uma linha de comando 
Exemplo: Verificar se Pessoa é Maior de Idade (18)

```php 

$idade = 20;
//O formato é : (Condição) ? Verdadeiro : Falso;

$status = ($idade >= 18) ? "Maior de Idade" : "Menor de Idade";
$status2 = ($idade<18) ? "Criança" : ($idade<60) ? "Adulto" : "Idoso"; 

```

##### Expressão Condicional `match` (PHP 8)

No mercado de PHP atual, não se usa mais uma dezena de `if/elseif`para checar valores fixos, e o antigo `switch/case`caiu em desuso. Usamos o `match`. Ele compara um valor e retorna diretamente o resultado.

```mermaid

graph TD
    A[valor] --> B{Condicional}
    B --> C[Ação 1]
    B --> D[Ação 2]
    B --> E[Ação 3]
    B --> F[Ação 4]
    B --> G[...]
    B --> H[Ação default]
    
```

```php

$diaSemana = date("Week"); //pega o Dia da Semana em Formato Numérico

//trasnformar dia da Semana em Formato Texto (Domingo, Segunda,...)

$nomeDiaSemana = match($diaSemana){
    "0" => "Domingo",
    "1" => "Segunda",
    "2" => "Terça",
    "3" => "Quarta",
    "4" => "Quinta",
    "5" => "Sexta",
    "6" => "Sábado",
    default => "Dia Inválido"
};

```

---

##### Laços de Repetição 

Um laço de repetição faz com que, um bloco de códigos rode várias vezes, até que uma condição mande parar.

- O Laço `while` (Enquanto)

Ele verifica se a condição é verdadeira ANTES de entrar no laço. Ideal quando você não sabe quantas vezes vai rodar o laço.

```mermaid

graph LR

    A[Início] --> B{Condição}
    B --true--> C[Executa o Laço]
    C --> B
    B --false--> D[Interrompe o Laço]

```

Exemplo: Jogo de Adivinhação de um nº Secreto

```php

$numeroSecreto = rand(1,10);

$tentativas = 0;

while($tentativa != $numeroSecreto){
    echo "Tente Novamente"
    //vou pegar um nº aleatório entre 1 e 10
    $tentativa = rand(1,10);
}

echo " Acertou Misevi!!! o nº secreto é $numeroSecreto";

```

- O Laço `do-while` (Faça-Enquanto)

A diferença é que ele executa o bloco pelo menos uma vez, mesmo que a condição seja falsa desde o início, pois ele só pergunta no final

```mermaid

flowchart LR

A([Início]) --> B[Executar Ação]
B --> C{Condição}
C --true--> B
C --false--> D([Fim]) 

```

Exemplo: Jogo de Adivinhação

```php

$numeroSecreto = rand(1,10);

do {
    $tentativa = rand(1,10); //Simular um palpite aleatório

    if($tentativa == $numeroSecreto){
        echo "Parabéns, Acertou!!!";
    }
  
} while ($tentativa != $numeroSecreto);

```

obs: Uso Idela do `do-while`, Menus de sistema ou sistema de solicitações de dados, sistemas interativos;

---

##### O Freio de Emergência: `break` e `continue`

As vezes precisamoso interferir no laço enquanto ele está rodando 

- `break`=> **Para Tudo!** Quebra o laço interiro e avai embora
- `continue` => **Pula a rodada!** Ele ignora o código daquela rodada especifica e pula logo par a próxima repetição.

Exemplo de Aplicação do Código: Sistema de Controle do Elevador

```php 

for($andar = 1 ; $andar<=10; $andar++){
    if($andar ==4){
        echo "Andar $andar está em obras. Passando direto!";
        continue;
    }

    echo "Elevador parou no andar $andar"
}

```
---

##### Laço de Repetição `for`

Use o `for`quando você sabe qunatas vezes precisa repetir uma ação ou quando precisa controlar um contador. Ele possui 3 partes:

- inicialização;
- condição;
- incremento;

Sintaxe: 

for(inicialização; condição; incremento){
    Ação
}

```mermaid
flowchart LR
    A[Início: i=0] --> B{i<10?}
    B --true--> C[aAção]
    C --> D[i++]
    B --false--> E[FIM]
```

Exemplo de Aplicação: Exibir todos os Meses do Ano

```php
for($mes=1;$mes<=12;$mes++){
    echo "Mês $mes";
}
```
Nesse Exemplo, `$mes`começa em 1, o laço continua esnquanto `$mes`for menor ou igual a 12 e, ao final de cada repetição, `$mes` aumeta o contador em 1

##### Laço de Repetição `foreach`

Use o `foreach`quando precisar percorrer cada item de um **array**. Ele acessa os elementos diretamente, sem que você precise controlar o contador.

Exemplo: Imprimir todos os itens de um vetor.

```php
$frutas = ["Maça", "Banana", "Uva", "Laranja"];

foreach($frutas as $fruta){
    echo "Fruta: $fruta";
}
```

Outro Exemplo: Acessar a chave e o valor de cada item:

```php
$preços = [
    "Caderno" => 25.00,
    "Caneta" => 5.50,
    "Mochila" => 99.00
]; //vetor não ordenado do tipo Chave(Key) => Valor(Value) ===> Coleção/Dicionário

//percorrer o vetor usando o laço Foreach
foreach($precos as $produto => $preco){
    echo "$produto: R$" . number_format($preco,2);
}
// acessa a chave e o valor de cada item do vetor
```

---
---

#### Desafio : Simulador de cobrança (FINANSENAI)

#### Desafio Final

---
---

### Semana 4 - Modularização com Funções

#### Principio do DRY (Don´t Repeat Yourself)

Se uma lógica foi escrita duas ou mais vezes dentro de um código, essa lógica deve virar uma função.

#### Funções Nativas do PHP

O PHP tem milhares de funções prontas, essa função já criada é chamada de função nativa.

- **O que é uma Função?**

Uma função é como uma máquina: você coloca a matéria-prima (Parâmetro), ela processa e devolve um produto final (Retorno)

Exemplo de Função Nativa

```php
$texto = "senai americana";

// usar uma função nativa para substituição de parte do texto ==> str_replace
$textoNovo = str_replace("americana", "são paulo", $texto);
// "senai são paulo"

//usar uma função nativa para substituiç~cao das letras minúsculas por letras maiúsculas => strtoupper
echo strtoupper($textoNovo); //SENAI SÃO PAULO
```

##### Principais Funções Nativas (Mais Utilizadas)

As funções abaixo já fazem parte do PHP e podem ser chamadas diretamente no código. Observe os parâmetros que cada uma recebe e o tipo de informação que ela retorna.

| Função | Categoria | O que faz | Como usar |
|---|---|---|---|
| `strlen()` | Strings | Retorna a quantidade de caracteres de um texto. | `$tamanho = strlen($texto);` |
| `strtoupper()` | Strings | Converte o texto para letras maiúsculas. | `$resultado = strtoupper($texto);` |
| `strtolower()` | Strings | Converte o texto para letras minúsculas. | `$resultado = strtolower($texto);` |
| `ucfirst()` | Strings | Converte a primeira letra do texto para maiúscula. | `$resultado = ucfirst($texto);` |
| `trim()` | Strings | Remove espaços e quebras de linha no início e no fim do texto. | `$limpo = trim($texto);` |
| `str_replace()` | Strings | Substitui uma parte do texto por outra. | `$novo = str_replace("-", "", $cpf);` |
| `substr()` | Strings | Extrai uma parte do texto a partir de uma posição. | `$inicio = substr($texto, 0, 3);` |
| `explode()` | Strings | Divide um texto e cria um array usando um separador. | `$palavras = explode(" ", $nome);` |
| `implode()` | Arrays | Junta os itens de um array em um único texto. | `$lista = implode(", ", $nomes);` |
| `count()` | Arrays | Conta a quantidade de itens de um array. | `$total = count($produtos);` |
| `in_array()` | Arrays | Verifica se um valor existe dentro de um array. | `$existe = in_array("SP", $estados, true);` |
| `array_push()` | Arrays | Adiciona um ou mais itens ao final de um array. | `array_push($nomes, "Ana");` |
| `array_pop()` | Arrays | Remove e retorna o último item de um array. | `$ultimo = array_pop($nomes);` |
| `sort()` | Arrays | Ordena um array em ordem crescente e reorganiza suas chaves. | `sort($notas);` |
| `array_keys()` | Arrays | Retorna um array contendo as chaves de outro array. | `$chaves = array_keys($produtos);` |
| `number_format()` | Números | Formata um número com casas decimais e separadores definidos. | `$preco = number_format($valor, 2, ',', '.');` |
| `round()` | Números | Arredonda um número para a quantidade de casas informada. | `$media = round($nota, 2);` |
| `max()` | Números | Retorna o maior valor de uma lista ou array. | `$maior = max($notas);` |
| `min()` | Números | Retorna o menor valor de uma lista ou array. | `$menor = min($notas);` |
| `is_numeric()` | Validação | Verifica se o valor é um número ou uma string numérica. | `if (is_numeric($entrada)) { ... }` |
| `isset()` | Validação | Verifica se uma variável existe e não possui valor `null`. | `if (isset($usuario)) { ... }` |
| `empty()` | Validação | Verifica se uma variável está vazia. | `if (empty($pedido)) { ... }` |
| `date()` | Data e hora | Formata uma data ou hora conforme uma máscara. | `$hoje = date('d/m/Y');` |
| `file_exists()` | Arquivos | Verifica se um arquivo ou diretório existe. | `if (file_exists('dados.txt')) { ... }` |
| `file_get_contents()` | Arquivos | Lê todo o conteúdo de um arquivo ou endereço. | `$conteudo = file_get_contents('dados.txt');` |
| `file_put_contents()` | Arquivos | Grava conteúdo em um arquivo, criando-o se necessário. | `file_put_contents('log.txt', $mensagem);` |

**Atenção:** algumas funções modificam o array original, como `sort()`, `array_push()` e `array_pop()`. Já outras retornam um novo valor, como `count()`, `explode()` e `str_replace()`. Em caso de dúvida, consulte a documentação oficial do PHP e verifique o retorno da função.

##### Documentação PHP

[Acesse a documentação oficial do PHP em português](https://www.php.net/manual/pt_BR/)

Consulte também a [referência de funções do PHP em ](https://www.php.net/manual/pt_BR/funcref.php) para pesquisar a sintaxe, osparâmetros e os valores para cada função.

#### Funções Customizadas (Criando suas próprias máquinas)

Quando o PHP não tem a função que queremos, nós a criamos!

**A Regra de Ouro**: Uma função deve focar em `return` (retornar um valor), e não imprimir (`echo`).

Veja a diferença nesse exemplo:

```php
function calcularTotal($preco, $quantidade){
    // a função calcula e retorna o resultado, mas não imprimi nada
    return $preco * $quantidade;
}

$total = calcularTotal(25.00, 3);

//imprimir é feito fora da função
echo "Total da compra: R$ " .round($total,2);
// Total da compra: R$ 75.00
```

A função `calcualrTotal()`pode ser reutilizada em uma página, relatório ou teste. O `echo`aparece somente fora da função, no momento de apresentar o resultadi para o usuário.

##### Padrão de Uso corporativo (PHP 8 Strict Types)

No mercado de trabalho, exigimos que a unção avise exatamente o **TIPO** de dado que ela espera receber e o **TIPO** de dado que ela vai devolvar.

Isso é cahamado de **tipagem de funções**. Ao declarar os tipos, o código fica mais fácil de entender e o PHP consegue identificar alguns erros antes que eles causem problemas maiores no sistema. 

Os tipos mais usados:

* `int`: número inteiro, `10` ou `1024`;
* `float`: numero decimal ou ponto flutuante, `10.90`;
* `string`: Texto, como `"Maria"`;
* `bool`: valor lógico, `true` ou `false`;
* `void`: identifica que a função não devolve nenhum valor;

O tipo deve ser escrito antes do nome de cada parâmetro e o tipo da função deve ser escrito após os parênteses, precedido do ":", informando o que a função vai devolver

Exemplo de uso de função e parâmetros tipados:

```php
function apresentarProduto(string $nome, float $preço): string{
    return "$nome custa R$ $preco";
}

$mensagem = apresentarProduto("Caderno",25.00);
echo $mensagem;
// Caderno custa R$ 25.90
```

> **Resumo**: os tipos dos parâmetros documentam as entradas da função, o tipo após `:` documenta a saída da função.

##### O Tipo Mágico : `VOID`

se uma função faz um trabalho interno e **não retorna NADA**, dizemos que o retorno dela é "vazio" (`void`).

Exemplo de função sem retorno:

```php
function registraLog(string $mensagem): void{
    //apenas salvae em um arquivo de texto, não devolver nenhuma variável
    file_put_contents("erro.log", $mensagem);
}
```

#### Escopo e Referencia (O Segredo da Memória)

##### O que é Escopo? ( A Regra de Las Vegas)

*O que acontece dentro da função, fica dentro da função*. Uma variável criada fora não existe la dentro, e uma criada lá dentro morre quando a função acaba.

**Escopo** é o local do programa onde a variável pode ser aramazenada/acessada. Em PHP, uma variável criada fora de uma função pertence ao *escopo global*, uma variável criada dentro de uma função pertende ao *escopo local*.

Exemplo de Escopo de variável:

```php
$nomeSistema = "CRM SENAI"; //variável Global

function criarMensagem(string $nome): string{
    $mensagem = "Bem-Vindo!!!"; //escopo Local
    return $mensagem . $nome;
    }

echo $nomeSistema; // Correto: esta no escopo global
//echo $mensagem; //Errado: $mensagem só existe dentro da função, não é acessada fora
echo criarMensagem("Nome do Fulano"); //Correto: A função devolve sua variável local
// CSM SENAI
//Bem-Vindo! Nome do Fulano
```


* *Como Enviar Dados Para uma Função?*

A forma mais segura e organizada é enviar os dados por **Parâmetros**. Assim, a função não precisa acessar diretamente variáveis globais:

```php

function saudar(string $nome):string{
    return "Olá, $nome!";
}

$nomeCliente = "João";
echo saudar($nomeCliente); // Olá, João!
```

Nesse Caso , `$nomeCliente` continua no escopo global, mas seu valor é enviado para o parâmetro local `$nome`. Afunção recebe uma informação, processa e retrona o resultado.

**Exemplo Incorreto:**

```php
$nome = "João"; //variável global

function saudar() :string{
    return "Olá, $nome"; // Errado: a função não reconhece a variável global 
}
```
A função `saudar()`não conhece a variável global `$nome`. Ocasionando um erro no sistema.

> **Resumo**: variáveis protegem os dados internos da função; parâmetros são o caminho recomendado para evitar Erros e enviar Informações, e `return`é usado para devolver um resultado ao códgio que chamou a função.


---

### Semana 5 - Arrays e Manipulação Avançada de Dados

Um array(também conhecido como vetor) é uma estrutura de dados usada para armazenar vários valores em uma única variável.

**Tipos de Arrays em PHP:**

- Indexados/Ordenados(Núméricos): Usam Números interiros como índices(chaves), que começam em zero por padrão;
- Associativos/Não Ordenados(Strings): Usam chaves(String) para identificar valores;
- Multidimensionais: Contêm um ou mais arrays dentro de outros arrays.

**Exemplo de Arrays:**

```php 
//array indexado
$frutas = ["maça", "banana", "laranja"];

//array associativo
$capitais = [
    "SP" => "São Paulo",
    "MG" => "Belo Horizonte",
    "RJ" => "Rio de Janeiro",
    "ES" => "Vitória"
];

//acessando Dados
echo $fruta[0]; //"maça"
echo $capitais["SP"]; //São Paulo

```

> Obs: Em arrays associativos, nos trocamos os nº do índice por Nomes(Chaves/Keys). A setinha => significa "recebe"

**Arrays Multidimensionais (Banco de Dados na Memória)

É aqui que o "BackEnd" começa de verdade. o Array Muntidimensional é o formato como os Bancos de Dados chegar como respostas as solicitações feitas pela API.

**Exemplo de Aplicação de Array Multifimensional:**

```php

$clientes = [
    ["id" => 1, "nome"=>"Ana", "email"=>"ana@email.com", "ativo"=> true],
    ["id" => 2, "nome"=>"Bruno", "email"=>"bruno@gmail.com", "ativo"=> false],
    ["id" => 3, "nome"=>"Carlos", "email"=>"carlos@hotmail.com", "ativo"=>true]
];

//Como Acessar o email do Bruno
echo $clientes[1]["email"]; //bruno@gmail.com

```

#### O Melhor Amigo dos Array: `O Foreach`

O laço de repetição especial para arrays. o `foreach`percorre cada elemento de um array.

**Exemplo de Aplicação:**

```php
foreach($clientes as $clienteAtual){
    echo $clienteAtual["nome"];
    echo $clienteAtual["email"];
}
// vai imprimir nome e email de todos os Clientes do Array


```

#### Transfomrações de Arrays (Arrow Function)

São Usadas em Filtragem de e Mapeamento de dados de um Array

- `array_filter` 
Serve para buscar dados. e devolve apenas os dados que passarem pelo filtro

```php
$clientesAtivos = array_filter($clientes, fn($c) => $c["ativo"]===true);

//novo array , tera apenas os clientes que ativo por igual a true
```

- `array_map`
Serve para alterar Todos os dados de uma lista de uma única vez

```php
$produtos = [
    ["id"=>1, "preco"=10.00, "setor"=>"jardim"],
    ["id"=>2, "preco"=15.90, "setor"=>"ferramentas"],
    ["id"=>3, "preco"=20.00, "setor"=>"jardim"],
]

// ajuste de preço em 10%
$produtosAjustados = array_map(fn($p)=>$p[preco] = $p[preco]*1.1, $produtos);
```

#### Debugando um Array (Kit Primeiro Socorros)

- `print_r`
função usada para exibir informações sobre uma variávels de forma legível em linguagem natural

```php 
print_r($frutas);

//Array
(
    [0] => "maça",
    [1] => "banana",
    [2] => "laranja"
)
```

- `var_dump`
exibi com mais detalhes as informações de um array ou variável em PHP

```php
echo var_dump($frutas);
//Mostra Tudo: tipo de dados, o tamanho e o valor
```

---

### Semana 6 - Processamento HTTP e Formulários Web

#### Anatomia de um Formulário HTML para BackEnd

Antes de PHP processar qualquer informação, precisamos coletar informações no FrontEnd através de um `<form>`

**Exemplo de `<form>` HTML**

```html
<form action="processa.php" method="POST">
    <label>Nome Completo </label>
    <input type="text" id="campoNome" name="nomeUsuario" placeholder="Digite seu nome">
    <button type="submit">Cadastrar</button>
</form>
```

**O 3 Pilares do Formulário**
1. action="processa.php" -> O Destino: Define qual script PHP no servidor receberá os dados.
2. method="POST" -> O Transporte: Define a via de protocolo HTTP usada (GET ou POST).
3. name="nomeUsuarios" -> A Etiqueta do Dado: É o nome da chave que o PHP usará no array associativo ($POST["nomeUsuario"]).

> obs: Nunca Confundir `id` com `name` no input, o PHP ignora o `id`

#### O Protocolo HTTP

Quando o Usuário clica no botão `type="submit"`, o navegador compila todas as informações dos campos preenchidos e dispara um pacote de comunicação padronizado pelo **Protocolo HTTP(Hypertext Transfer Protocol)**

**O Formato de TransferÊncia**

- **Método GET**: solicitar informações públicas e realizar buscas, mas altamente arriscada para dados privados.

- **Método POST**: As informações viajam quardadas dentro do protocolo

#### Testar o uso dos Protocolos HTTP

OK

#### GET vs. POST

1. O Método GET (Consultas e Filtros)

O método `GET` é utilizado quando a intenção do cliente é **buscar ou filtrar dados** sem alterar o estado do servidor. Os dados enviados via `GET` são anexados diretamente ao final da URL na forma de uma **Query String**

2. O Método POST (Envio de Cargas Úteis e Mutações)

O método `POST` é utilizado quando o formulário envia dados que devem ser processados para **criar ou modificar registros** no sistema (ex: cadastro de usuários, finalizações de compras, upload de arquivos)


#### Como os Métodos Funcionam no PHP (`$_GET`, `$_POST`, `$_SERVER`) - As SuperGlobais

As Variáveis SuperGlobais são arrays internos pré-definidos que estão sempre acessiveis em qualquer parte do script php, sem precisar ser declaradas.

- **$_GET**: Armazena dados passados pela URL via parâmetros de consulta (query string);
- **$_POST**: Recolhe dados enviados por formulários usando método HTTP POST.
- **$_SERVER**: Contém informações sobre o servidor, ambiente e caminhos de script

**Poque usamos `??` para obter dados da SuperGlobal??**

Usamos o Operador de Nulidade (Coalescência Nula) para verificar se o valor da variável não é `null`, se caso for `null` atribuimos um valor para evitar erros no script.

**Exemplo de Uso**:

Na primeira vex que uma página é aberta, o formulário ainda não foi enviado. Portanto, a chave pode não existir no array.

```php
$nome = $_POST["nome"];
// se escrever desta forma, o código pode gerar um aviso de erro.

//a forma correta de escrita é
$nome = $_POST["nome"] ?? "";
//Se $_POST["nome"] não existir , use uma string vazia.

//outra forma de verificar nulidade é usando if/else
if(isset($_POST["nome"])){
    $nome = $_POST["nome"];
}else{
    $nome = "";
}
```

#### Validação de Dados no BackEnd é Obrigatória

Muitos desenvolvedores iniciantes acreditam que colocar atributos `required`, `type="email"` ou `min=0` na <tag> do HTML é suficiente para proteger o sistema. **Isso é Ilusão**. Sempre devemos fazer validações de dados no código BackEnd. As validações no BackEnd devem acontecer sempre antes do processamento de qualquer dado recebido pelo usuário.

##### Funções Nativas Essenciais para Limpeza e Validação de Dados.

Abaixo está uma tabela resumida das funções nativas do PHP usadas com frequência para limpar, verificar e validar entradas de formulário.

| Função | Descrição | Quando usar | Exemplo simples |
| :--- | :--- | :--- | :--- |
| `trim($valor)` | Remove espaços no início e no fim da string | Limpar texto digitado pelo usuário | `$nome = trim($_POST['nome'] ?? '');` |
| `htmlspecialchars($valor, ENT_QUOTES, 'UTF-8')` | Converte caracteres especiais em entidades HTML seguras | Exibir dados na tela sem risco de XSS | `echo htmlspecialchars($_POST['nome'] ?? '', ENT_QUOTES, 'UTF-8');` |
| `filter_var($valor, FILTER_VALIDATE_EMAIL)` | Valida formato de e-mail | Campos de e-mail | `filter_var($email, FILTER_VALIDATE_EMAIL)` |
| `filter_var($valor, FILTER_VALIDATE_INT)` | Verifica se o valor é inteiro válido | Idade, código, quantidade | `filter_var($_POST['idade'] ?? '', FILTER_VALIDATE_INT)` |
| `filter_var($valor, FILTER_VALIDATE_FLOAT)` | Verifica se o valor é número decimal válido | Preço, peso, altura, salário | `filter_var($_POST['preco'] ?? '', FILTER_VALIDATE_FLOAT)` |
| `isset($variavel)` | Verifica se uma variável existe e não é `null` | Garantir que o campo foi enviado | `if (isset($_POST['nome'])) { ... }` |
| `empty($valor)` | Verifica se o valor está vazio | Campos obrigatórios | `if (empty($_POST['senha'])) { ... }` |
| `strlen($valor)` | Retorna o tamanho da string | Exigir mínimo ou máximo de caracteres | `if (strlen($senha) < 6) { ... }` |
| `in_array($valor, $lista, true)` | Verifica se o valor pertence a uma lista permitida | `select`, `radio`, opções válidas | `in_array($categoria, ['A','B','C'], true)` |
| `is_numeric($valor)` | Confirma se o valor é numérico | Validação de número | `if (is_numeric($_POST['quantidade'])) { ... }` |
| `preg_match($padrao, $valor)` | Valida por expressão regular | CPF, CEP, telefone, senha forte | `preg_match('/^\d{5}-\d{3}$/', $cep)` |
| `filter_input(INPUT_POST, 'campo', FILTER_SANITIZE_SPECIAL_CHARS)` | Captura e limpa dados da requisição | Ler entradas com segurança | `$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);` |

>obs: use `htmlspecialchars() ao exibir valor em HTML => converte caracteres especiais em entidades correspondentes em HTML, evitando que o código seja interpretado erradamente pelo navegador. É usado principalmente na segurança web, para evitar atques Cross-Site-Scriptinf(XSS).


#### Presenvação de Estado em Formulários (*Sticky Form*)

A técnica do **Sticky Form** consiste em imprimir de volta o valor no atributo "value" do input, os dados que o usuário acaba de digitar, os valores são devolvidos aos inputs, caso ocorra algum erro de validação de dados no envio.

**Exemplo de Uso:**

```php
<div class="campo">
    <label for="nome">Nome Completo</label>
    <input type="text" id="nome" name="nome" 
            value="<?= htmlspecialchars($dadosFormulario['nome'] ?? '') ?>"
            class="<?= isset($erro['nome']) ? 'input-erro' : '' ?>">
    <?php if (isset($erro["nome"])): ?>
        <span class="erro-texto"><?= $erro["nome"] ?></span>
    <?php endif; ?>
</div>
```

---

### Semana 7 - Segurança no BackEnd - Sanitização, Validação e Proteção contra XSS

**1º Mandamento do Desenvolvedor BackEnd**

> Nunca Confie no Usuário: Toda entrada de dados vinda de fora do servidor é potencialmente maliciosa até que seja rigorosamente validade, sanitizada e codificada.

Quando você disponibiliza um campo de texto em um site, qualquer pessoa conectada a internet pode digitar código maliciosos em vez de texto. Se o código BackEnd pega esse texto diretamente sem nenhum tratamento, a ordem de execução de código abrirá portas para a invasão devastadora do sistema.

**A Anatomia de um Ataque: O que é Cross-Site Scripting (XSS)**

O XSS ocorre quando uma aplicação web inclui dados não confiáveis em uma página web sem a devida validação ou escape de caracteres. Isso, permite que um atacante execute scripts maliciosos (geralmente em JavaScript) diretamente no navegador de outro usuário que visitam o site. 

**As Principias Modalidade de Ataques:**

1. *Roubo de Sessão(Cookies Stealing)*: O JavaScript injetado lê os cookies de autenticação da vítima (document.cookie) e os envia para o servidor do atacante, permitindo que ele faça login na conta da vítima sem precisar da senha.

2. *Desconfigurção do Site(defacement)*: Alteração visual do site, inseridno mensagens falsas, banners ofensivos ou formulários de login fraudulentos(phising interno).

3. *Redirecionamento Malicioso*: Força o navegador da vítima a abrir sites com vírus ou páginas clonadas de banco.

4. *Captura de Teclas(Keylogger)*: Grava tudo que a vítima digita enquanto a página estiver aberta. 

**Os Vetores de Ataques Mais Frequentes**:

Nem todo ataque XSS usa a tag óbvia `<script>`. Desenvolvedores que tentam bloquear XSS apenas "apagando a palavra script" são facilmente burlados por atacantes:

| Vetor de Injeção | Como funciona o ataque? |
| :--- | :--- |
| `<script>alert('XSS')</script>` | Injeção direta de bloco de script executável pelo navegador. |
| `<img src="invalido.jpg" onerror="alert('XSS')">` | O navegador tenta carregar a imagem inexistente e dispara o evento `onerror` com o JavaScript. |
| `<svg onload="alert('XSS')">` | O navegador renderiza o elemento gráfico SVG e executa o evento `onload`. |
| `<a href="javascript:alert('XSS')">Clique</a>` | O clique no link executa a pseudo-URL com JavaScript em vez de abrir um site. |
| `"><script>alert('XSS')</script>` | Usado quando o dado é impresso dentro de um `<input value="...">`, quebrando o atributo e injetando a tag. |

#### **A Tríade de Defesa: Validação, Sanitização e Escapamento**

1. **Validação**: VErifica se o dado recebido atende aos requisitos exatos do sistema (tipo, tamanho, formato).

Ex: Verificar se o e-mail possui `@` e dominio válido (`filter_var($email, FILTER_VALIDADE_EMAIL)`).

2. **Sanitização**: Transforma o dado para adequa-lo ao formato desejado, removendo caracteres indesejados.

Ex: Remover espaços no início e fim (`trim($nome)`).

3. **Escapamento/Codificação de Saída**: é o ato de converter caracteres especiais de linguagem HTML em suas respectivas **Entidades HTML** no momento exato em que eles são impressos na tela.

Ex: usar `htmlspecialchars()`.

```mermaid

flowchart LR

    A[Entrada de Dados GET/POST]
    B{1. Validação}
    C[2. Sanitização]
    D[Processamento]
    E[3.Escapamento]
    F[HTML/UI]

    A --> B
    B --(Inválida)--> A
    B --(Válida) --> C
    C --(Limpa e Formata) --> D
    D --> E
    E -- Converter Caracteres HTML --> F

```

--- 

#### **A Ferramenta Principal: `htmlspecialchars()`**

É o principal mecanismo do PHP para neutralizar XSS na camada de Apresentação(UI)

**Como a conversão de entidades HTML funciona?**

| Caractere Original | Entidade HTML Gerada | Efeito no Navegador |
| :---: | :---: | :--- |
| `<` | `&lt;` (*Less Than*) | O navegador exibe `<` na tela, mas **não cria uma tag**. |
| `>` | `&gt;` (*Greater Than*) | O navegador exibe `>` na tela sem fechar tags. |
| `"` | `&quot;` (*Quotation Mark*) | Não quebra atributos HTML `<input value="...">`. |
| `'` | `&#039;` ou `&apos;` | Protege strings envoltas em aspas simples. |
| `&` | `&amp;` (*Ampersand*) | Evita interpretação incorreta de entidades. |

**A sintaxe no PHP**

```php
string htmlspecialchars(
    string $string,
    int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5,
    ?string $encoding = "UTF-8"
)
```
- `ENT_QUOTES`: Converte tanto aspas duplas quanto aspas simples 
- `ENT_SUBSTITUTE`: Substitui sequências de bytes inválidos por caracteres de substituição Unicode em vez de retornar uma string vazia
- `ENT_HTML5`: Aplica a tabela de entidade compatíveis com a especificação HTML5
- `UTF-8`: Garante que caracteres de lingua portuguesa como "ç", "ã", "é" sejam preservados sem corrupção.

**A função helper de Escapametno**

Para não digitar essa linha extensa em todas as partes de saída de texto para HTML, os desenvolvedores profissionais criam uma função auxiliar curta:

```php
function e(string $texto):string{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, "UTF-8");
}

<p>Comentário: <?= e($comentarioUsuario) ?></p>
<input type="text" name="nome" value="<?= e($nomeUsuario) ?>" />

```

#### **Validação e Sanitização com `filter_var()`**

O PHP possui a biblioteca de filtros nativos `filter_var()`.


```php
<?php
declare(strict_types=1);

// 1. Validação de E-mail
$email = "usuario.teste@senai.br";
if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
    // E-mail válido
}

// 2. Validação de Número Inteiro com Limites (Range)
$idade = "25";
$opcoesIdade = [
    'options' => [
        'min_range' => 16,
        'max_range' => 120
    ]
];
if (filter_var($idade, FILTER_VALIDATE_INT, $opcoesIdade) !== false) {
    // Idade é um inteiro entre 16 e 120
}

// 3. Validação de URLs (Links)
$website = "https://www.sp.senai.br";
if (filter_var($website, FILTER_VALIDATE_URL) !== false) {
    // URL possui protocolo e formato válidos
}

// 4. Validação de Endereço IP
$ip = "192.168.1.100";
if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
    // IP válido
}

```
---

### Semana 8 - Persistência de Dados com Banco de Dados Relacional (PostGreSql) e Conexão PDO

**Tema:** Camada de cesso a Dados, Driver PDO(PHP Data Objects), Driver `pdo_pgsql`, Padrão Singleton, Isolamento de Credenciais (.env) e Tratamento de Exceções (PDOException) 

#### **1. Da memoria Volátil ao Banco de Dados**

Em sistemas corporativos de grande porte, arquivos planos(.txt .json) não oferecem a segurança, integridade, concorrência e velocidade necessárias para aramazenamento de dados. Então é aqui que o **BackEnd encontrao Banco de Dados Relacional**.

Banco de Dados Relacinal Permitem:

- Conectar a lógica de programação server-side ao Sistema de Gerenciamento de Banco de Dados (SGBD)
- Garantindo persistência definitiva e segura dos registros
- Aplicando integridade referencial, constraints, consultas otimizadas e propriedade ACID aprendidas na disciplina de Banco de Dados

> obs: Atomicidade, assegura que cada transação seja unica. Consistência, respeite todas as regras, restrições e chaves definidas, garantido a validade da transação. Isolamento, transações de forma independente. Durabilidade, transações são confirmadas, garantindo a persistÊncai permanente. 

```mermaid
flowchart LR
    navegador['Navegar Web - Cliente/Front']
    servidor['Servidor PHP - Processa as Regras de Negócio ']
    banco['SGBD - Base de Dados Persistente'] 

    navegador --> |"Requisição HTTP"| servidor
    servidor --> |"Driver PDO"| banco
    servidor --> |"Resposta HTML/JSON"| navegador
```

#### **2. O que é o PDO(PHP Data Objects)?**

O **PDO** é uma camada de abstração de acesso a dados integrada nativamente ao PHP. Ele fornece uma interface uniforme e orientada a objetos para se comunicar com múltiplos sistemas de banco de dados (PostgreSQL, MySQL, SQLite, OracleSQL, SQLServer)

```mermaid
flowchart TB
    aplicacao[Aplicação PHP - Controller, Services, Models]
    pdo[Interface PDO - Métodos: query, prepare, execute]

    driver[Driver PDO_PGSQL]
    drivermysql[Driver PDO_MYSQL]
    driveroracle[Driver PDO_OCI]

    postgres[Banco PostgreSQL]
    mysql[Banco MySQL]
    oracle[Banco Oracle SQL]
    

    aplicacao --> pdo
    pdo --> driver
    pdo --> drivermysql
    pdo --> driveroracle
    driver --> postgres
    drivermysql --> mysql
    driveroracle --> oracle
```

#### **3. Vantagens do uso do PDO**

- **Portabilidade de Código**: Os métodos de conexão , consulta e transações são idênticos , independente do banco utilizado. Se o cliente migrar do banco PostgreSQL para outro SGBD, o programdor apenas altera a string DSN de conexão, preservando toda a lógica de acesso já criada.
- **Suporte Nativo* a Prepared Statements: O PDO foi projetado para trabalhar com consultas nativas, oferencendo a defesa contra ataques de **SQL Injection**
- **Tratamento Orientado a Objetos com Exceptions**: Em vez de retornar códigos de erros, o PDO lança uma instancia da classe especializada `PDOException`

**A Sintaxe da Conexão PDO: DSN(Data Source Name)**

Para que o PDO saiba onde o banco está localizado, em qual porta abrir, utilizamos a string padronizada **DSN**

```text
pgsql:host=127.0.0.1;port=5432;dbname=seu_banco
  |         |             |           |
  |         |             |           └─ Nome da base de dados ralacional(nome do banco)
  |         |             └─ Porta padrão do Banco de Dados PostgreSQL(5432)
  |         └─ Endereço IP ou hostname do servidor
  └─ Identificador do driver do SGBD (pgsql) - PostgreSQL
```

#### **4. A Configuração do PDO**

Ao instanciar um objeto PDO, devemos configurar quatro flags essenciais  que determian como o driver se comportará frnete a erros e consultas

```php
$opcoes = [
    //1. flag: Lança exceções imediatamente quando ocorrer qualquer erro SQL
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    //2. Retorna registros apenas com nomes das colunas (Eliminar duplicidade numérica)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    //3. Desatica emulação e utiliza prepared statements nativos 
    PDO:: ATTR_EMULATE_PREPARES => false,

    //4. Limita a 5 segundos para tentar a conexão com o servidor do BD
    PDO:: ATTR_TIMEOUT => 5
];
```

**Detalhamento das Flags**:
- PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION : por padrão o PDO pode falhar silenciosamente e retorna apenas `false`. Ao Ativar o ERR_MODE força o PHP a dispara uma `PDOException`, permitindo que o nosso código interprete qualquer erro em um bloco `try-catch`.
- PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC : por padrão o métos `fetch()`retrona um array duplicado ontendo índices numéricos`[0,1]`e associativos`["id","código_maquina"]`. Definir `FETCH_ASSOC`reduz o consumo de memória RAM pela metade e entrega coleções limpas.
- PDO::ATTREMULATE_PREPARES => false : Garante que o PHP envie a consulta e os parêmtros separados diretamente para o planejador do BD processar, blindando e aplicação contra ataques sofisticados de `SQL_injection`

---

#### **5. Proteção de Credenciais**

Um dos erros mais graves cometidos por desenvolvedores iniciantes é escrever dados de conexão diretamente dentro do código:

```PHP
// péssima prática de código
$pdo = new PDO("pgsql:host=localhost;dbname=producao", "postgres", "senha123456");
```

Se esse arquivo for versionado e enviado para o GitHub:
1. Suas senhas de produção fincam publicas
2. Robôs maliciosos varrem repsoitórios à produra de credenciais expostas para invadir banco de dados e sequestrar informações (ataques de Ransoware)
3. A empresa é penalizada por violação da **LGPD(Lei Geral de Proteção de Dados)**

**A Abordagem Segura: Usando Arquivos de Configuração Isolados(`.ini`ou `.env`)**

Isolamos as credenciais em um arquivo externo protegido que **nunca entra no Git**:

```ini
; config/database.ini
[database]
db_driver   = pqsql
db_host     = 127.0.0.1
db_port     = 5432
db_name     = producao
db_user     = postgres
db_pass     = senha12345
```

No arquivo `.gitignore` do projeto:

```text
config/database.ini
.env
logs/*.log
```

---

#### **6. Padrão Singleton de Conexão**

Imagine uma aplicação web com 500 usuários acessando simultaneamente. Se cada script, função executar `new PDO()` sempre que precisar consultar o banco, teremos milhares de conexões de redes abertas desnecessariamente. 

No SGBD(PostgreSQL), cada conexão aberta cria um processo no sistema operacional dedicado. Abrir conexões repetidas esgota rapidamente o limite configurado(`max_connection`) do BD gerando erro:
`Fatal Error: sorry, too many clients already`

**Como o Singleton Resolve Isso**

O padrão **Singleton** garante que **apenas uma única instancia de conexão PDO exista por requisição**, reutilizando-a em qualquer ponto do sistema.

**As Configurações do Singleton**:
1. **Construtor Privado** (`private function _constructor`): Impede que outros arquivos instanciem uma nova conexão
2. **Propriedades Estáticas Privadas** (`private static ?PDO $instancia = null`): Armazena a Conexão aberta.
3. **Método de Acesso Estático Público** (`public static function obterConexão():PDO`): A conexão é Criada pelo método, se já existir uma conexão apenas devolve a conexão já existente. sem a necessidade de criar uma nova.
4. **Bloqueio de Clonagem e Desserialização** (`_clone`e `_wakeup`): Garante que ninguém consiga duplicar o objeto de conexão

---

#### **7. Tratamento de Falhas com `PDOException`**

Qaundo uma tentativa de conexão falha(servidor desligado, senha incorreta, porta inacessível), o PDO lança uma Exceção(`PDOException`).Então devemos Tratar esse Erro. 

**Práticas recomendadas de Segurança** (AppSec):

* **Para o Usuário**: Exibir mensagens Amigáveis e genéricas: *Não foi possível  processar sua solicitaç~çao. Tente novamente mais tarde*
* **Para a Equipe de Desenvolvimento**: Gravar os detalhes técnicos completos com timestamp em um arquivo de log seguro (`logs/database.log`).


---

### Semana 9 - CRUD Completo com Prepared Statement e Proteção contra SQL Injection

**Tema:** Operações CRUD Completas, Vulnerabilidade SQL Injetion (OWASP Top do problemas de CiberSegurança), Consultas com PDO (`prepare`, `bindValue`, `execute`), Marcadores Nomeados e Padrão Arquitetura DAO(Data Access Object). 


#### **1. As Operações CURD**

Em qualquer qualquer organização, o objetivo central de um sistema de software é manipular informações com segurança, velocidade e consistência. Para que isso aconteça, as operações fundamentais, que todo desenvolvedor BackEnd deve dominar com perfeição são 4 conhecidas pelo acrônimo **CRUD**

```mermaid
flowchart TB
    subgraph CRUD ["As 4 Operações Fundamentais"]
        C["<b>C</b>reate (Criar)"] -->|"Comando SQL"| SQL_I["INSERT INTO ..."]
        R["<b>R</b>ead (Ler)"] -->|"Comando SQL"| SQL_S["SELECT ... FROM ..."]
        U["<b>U</b>pdate (Atualizar)"] -->|"Comando SQL"| SQL_U["UPDATE ... SET ... WHERE ..."]
        D["<b>D</b>elete (Excluir)"] -->|"Comando SQL"| SQL_D["DELETE FROM ... WHERE ..."]
    end

    style C fill:#dcfce7,stroke:#16a34a,stroke-width:2px,color:#14532d
    style R fill:#dbeafe,stroke:#2563eb,stroke-width:2px,color:#1e3a8a
    style U fill:#fef9c3,stroke:#ca8a04,stroke-width:2px,color:#713f12
    style D fill:#fee2e2,stroke:#dc2626,stroke-width:2px,color:#7f1d1d

```
Na Semana 08, aprendemos sobre conexão usando PDO e padrão Singleton. Agora, vamos dar vida a essa conexão: aprenderemos a inserir novos registros, consultar dados com filtros dinâmicos, atualizar e remover com segurança os dados do banco.

#### **2. A Maior Ameaça da História da WEB: SQL Injection (SQLi)

Antes de escrever as query de manipulação, precisamos aprender sobre os perigos que cercam o banco de dados

A vulnerabilidade `SQL Injection` ocupa o topo das listas de falha de segurança cibernética. Ela ocorre quando um desenvolvedor comete o erro gravíssimo de **concatenar entradas fornecidads pelo usuário diretamente na instrução SQL** 

**Exemplo de Código Proibido**:

```php
// Código Vulnerável e Perigoso - Nunca Faça Isso
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
// o invasor digita:  admin' --

$sql = "SELECT * FROM usuarios WHERE login = '". $usuario . "' AND senha = '" . senha . "'";
$resultado = $pdo->query($sql);
```
**O que acontece quando o atacante digita `admin ' --`?**

```sql
SELECT * FROM usuarios WHERE login = 'admin'--' AND senha = '...';
```

1. A aspa digitada pelo atacante fecha a string do login antecipadamente
2. o operador `--`no PostgrSQL indica o **início de um comentário** pelo motor do banco
3. O restante da query ( a validação da senha! ) é **ignorada** pelo motor de busca do banco
4. **Resultado**: o invasor faz login instantaneamente na conta do administrador sem precisar saber a senha!

---

#### **3. Cenários de SQL Injetion**

| Tipo de Injeção | Payload Injetado pelo Invasor | Consequência no PostgreSQL |
| :--- | :--- | :--- |
| **Bypass de Autenticação** | `' OR '1'='1` | A condição torna-se sempre verdadeira, retornando o primeiro usuário da tabela (geralmente o administrador do sistema). |
| **Exfiltração de Dados (UNION SQLi)** | `' UNION SELECT id, nome, senha FROM usuarios --` | O invasor anexa tabelas sigilosas inteiras no resultado da consulta visível na tela, violando a LGPD. |
| **Destruição / Adulteração (Stack Queries)** | `'; DROP TABLE pecas_industriais; --` | Dependendo do driver e das permissões do usuário, o invasor encerra a consulta atual e executa comandos de destruição em massa. |

#### 4. A Defesa Contra SQL Injection

Para eliminar vulnerabilidade usa-se  a **Prepared Statements (Consultas Preparadas com PDO)**

```mermaid
sequenceDiagram
    autonumber
    participant App as Aplicação PHP
    participant SGBD as Motor PostgreSQL

    Note over App, SGBD: Fluxo Seguro com Prepared Statement
    App->>SGBD: 1. PREPARE: "SELECt * FROM usuarios WHERE login = : user"
    Note over SGBD: Compila a query, gerando o plano de execução<br/>e define que :user É ESTRITAMENTE DADO!
    SGBD->>App: Query compilada pronta para receber parâmetros
    App->>SGBD: 2. EXECUTE: [':user' => "admin' --"]
    Note over SGBD: O banco busca literalmente um usuário<br/>cujo nome seja "admin ' --". Nenhuma tag vira código!
    SGBD->>App: Retorna registro ou vazio (Sem invasão!)

```

#### **5. Marcadores/Denominadores Nomeados**

O PDO aceita dois formatod de marcadores em prepare statement

**1. Posicionais (`?`)**

```php
//funciona, mas é sujeito a erros de contagem de parâmetros em queries longas
$sql = "INSERT INTO pecas (sku, descricao, preco) VALUE (?, ?, ?);
$stmt = $pdo->prepare($sql);
$stmt->execute([$sku, $descricao, $preco]);
```

**2. Nomeação (`:nome`) - Padrão Recomendado**

```php
//Autoexplicativo, altamente legivel e à prova de inversão de ordem
$sql = "INSERT INTO pecas (sku, descricao, preco) VALUE (:sku, :desc, :preco)";
$stmt = $pdo->prepare($sql);
$stmt->execute([ // usa-se um vetor chave valor para determinar a nomeção dos valores atribuidos
    ":sku" => $sku,
    ":desc" => $descricao,
    ":preco" => $preco
]);
```

#### **6. Método de Vinvulação: `bindValue()` Vs. `bindParam()`**

Ao associar parâmetros a uma consulta `prepare`, pode-se utilizar dpois métodos com comportamentos distintos. o `bindValue()` ou o `bindParam()`, o primeiro vincula um valor fixo no momento da chamada, enaquanto o segundo vincula uma variável por referÊncia e só avalia o valor real quando a consulta é executada.

**Exemplo `bindValue()`** : Associa o valor extao da variável naquele momento. é mais comum e seguro para 95% dos casos de uso
```php
$id = 10;
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$id = 20; //não altera o valor que já foi passado no bindValue!
$stmt->execute(); //executa com id = 10
```


**Exemplo `bindParam()`** : Associa a variável como uma referência de memória (`&`). O valor é lido no momento exato da chamada èxecute`. Usar apenas em loops ou situações específicas que precisa alterar o valor repetidamente. 
```php
$id = 10;
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$id = 20; //altera o valor da referência 
$stmt->execute(); //executa com id = 20
```

> obs: Tipagem Explícitas com Constantes do PDO:
> Para Garantir que o PostgreSQL interprete corretamente o tipo de dado, informe sempre a constante correspondente:
> * `PDO::PARAM_INT`: Para chaves primárias, quantidades e inteiros.
> * `PDO::PARAM_STR`: Para textos, strings, datas e números decimais (`NUMERIC`).
> * `PDO::PARAM_BOOL`: Para valores booleanos (`true`/`false`).
> * `PDO::PARAM_NULL`: Para passar valores nulos explícitos.

#### **7. O Padrão de Arquitetura DAO(DATA ACCESS OBJECT)**

Em aplicações profissionais, comando SQL nunca devem ser escritos diretamente dentro de arquivos de interface visual ( como páginas HTML ou controladores de tela)

Para separar a **lógica de apresentação** da **lógica de acesso a dados**, usa-se o padrão de projetos **DAO(Data Access Object)**:

```mermaid
flowchart LR
    A["Interface Web/Controlador<br/>(index.php)"]
    B["Classe DAO<br/>(LogicaDAO.php)"]
    C["SGBD<br/>(banco_dados)"]

    A -->|"Chama métodos:<br/>salvar(),listar(),excluir()"| B
    B -->|"Executa Prepared Statement<br/>via PDO"| C
```

### Semana 10 - Sessões, Cookies e Autenticação Segura

**Tema:** Gestão de Estado com HTTP, Ciclo de Vida da Sessão(`$_SESSION`), Cookies, Hashing de Criptografia, Middlewares de Autenticação

#### **O Protocolo HTTP: Como ele lembra de você?**

O Protocolo HTTP é totalmente **STATELESS (sem aramazenamento de estado)**. Isso Significa que o servidor web trata cada requisição HTTP de forma isolada, como se fosse a primeira vez que ele estivesse interagindo com o usuário do sistema.

Para resolver esse problema sem obrigar o usuário a digitar o login e senha novamente a cada clique fazemos o seguinte:
1. Ao fazer o login bem-sucedido, o servidor entrega ao cliente uma **comanda/pulseira VIP numerada* (um identificados de sessão única e aleatória).
2. O navegador aramazena essa comanda/pulseira em um **Cookie**.
3. A cada nova página solicitada, o navegador apresenta automaticamente essa pulseira no cabeçalho da requisição
4. O PHP lê o número da comanda/pulseira, localiza os dados do usuário armazenados na memória do servidor(`$_SESSION`) e reconhece quem é ele!

**Situação sem Armazenamento de Cookie e SESSION**

```mermaid
sequenceDiagram
    autonumber
    participant Cliente as Navegador do Usuário
    participant Servidor as Servidor PHP/BD

    Cliente->>Servidor: 1. POST /login.php (Usuário envia email e senha)
    Servidor-->>Cliente: 2. HTTP 200 OK (Credenciais válidas! Redireciona)
    Note over Servidor: A conexão TCP é encerrada. O Servidor esquece do Usuário

    Cliente->>Servidor: 3. GET /dashboard.php (Usuário tent ler os relatórios)
    Note over Servidor: Servidor: "Quem é você? Nunca te vi antes!"
    Servidor -->> Cliente: 4. HTTP 302 Redirect -> login.php
```

**Situação com Armazenamento de Cookie e SESSION**

```mermaid
sequenceDiagram
    autonumber
    participant Navegador as Navegador do Usuário
    participant PHP as Servidor PHP
    participant Sessao as Armazenamento de $_SESSION

    Navegador->>PHP: POST /login.php (envia usuário e senha)
    PHP->>PHP: Valida as credenciais
    PHP->>Sessao: Armazena os dados do usuário em $_SESSION
    Sessao-->>PHP: Retorna o ID da sessão
    PHP-->>Navegador: Resposta com Set-Cookie: PHPSESSID=<ID da sessão>
    Note over Navegador: Guarda o ID da sessão no cookie

    Navegador->>PHP: GET /dashboard.php com Cookie: PHPSESSID=<ID da sessão>
    PHP->>Sessao: Busca os dados associados ao ID da sessão
    Sessao-->>PHP: Retorna os dados do usuário
    PHP-->>Navegador: Exibe o dashboard autenticado

```

#### **Como funciona o COOKIE HTTP**

Um **Cookie** é um pequeno arquivo de texto (geralmente limitado a 4KB) gravvado pelo navegador a pedido do servidor através do cabeçalho de resposta `Set-Cookie`.

**Cookies podem vazar informação?**

Sim, se um cookie de sessão for configurado com parâmetros desprotegidos, qualquer script malicioso injetado na página (XSS) pode roubar a sessão do usuário logado.

**Para evitar problemas de Segurança em Cookies:**

| Flag de Segurança | O que ela faz? | Por que é indispensável? |
| :--- | :--- | :--- |
| **`HttpOnly`** | Impede que scripts JavaScript executem leitura no cookie via `document.cookie`. | **Neutraliza o roubo de sessão via XSS!** Mesmo que haja uma falha de injeção de script na tela, o navegador proíbe o JavaScript de ler o identificador de sessão. |
| **`SameSite=Lax`** | Restringe o envio do cookie apenas a navegações originadas do próprio domínio. | **Protege contra ataques CSRF** (*Cross-Site Request Forgery*), impedindo que links externos forjem ações logadas. |
| **`Secure`** | Garante que o cookie só seja transmitido em conexões criptografadas com **HTTPS**. | Impede que bisbilhoteiros em redes Wi-Fi públicas interceptem a sessão em trânsito (*Man-in-the-Middle*). *(Em ambiente local de desenvolvimento sem SSL, pode ser desativado temporariamente).* |

#### **O Cilco de Vida da SESSÃO em PHP: `$_SESSION` no Servidor**

Enqunto os cookies residem no Navegador, os dados da sessão ficam aramazenados com  **privacidade total dentro do servidor** (em arquivos temporários na memória).

```mermaid
flowchart TB
    subgraph Cliente["Cliente-Side(Navegador)"]
        cookie["Cookie de Sessão"]
    end

    subgraph Servidor["Server-Side(Servidor)"]
        memoria["Superglobal $_SESSION"]
        disco["Token"]
    end

    Cliente -->|"Interage com o UI"| cookie
    cookie -->|"Envia Token no Header HTTP"| Servidor
    Servidor -->|"Lê Token e Carrega Dados"| memoria
    memoria <-->|"Persistência em Disco"| disco
    Servidor -->|"Garante A Autenticação do Usuário"| Cliente

    style cookie fill:#fed7aa,stroke:#ea580c,stroke-width:2px,color:#7c2d12
    style memoria fill:#bbf7d0,stroke:#16a34a,stroke-width:2px,color:#14532d
    style disco fill:#e2e8f0,stroke:#64748b,stroke-width:2px,color:#1e293b   

```

**Sintaxe Essencial do PHP para Sessões**

```php
//configurando a sessão com funções pré-definidas no PHP (documentação)

//1. Configurar as flags dos cookies Antes de abrir a Sessão
session_set_cookie_params([
    "lifetime"  => 0,       //Cookie expira ao fechar o navegador
    "path"      => "/"      //Válido para todo o domínio do site
    "httponly"  => true     //Proteção contra XSS
    "samesite"  => "Lax"    //Proteção conta CSRF
]);

// 2. Iniciar ou restaurar a session ativa
session_start();

// 3. Gravar os dados ba sessão (após validar o Login)
//usar a superglobal($_SESSION) para isso
$_SESSION["usuario_id"] = 10;
$_SESSION["usuario_perfil"] = "ADMIN";

//4. Permitir a leitura dos dados em qualquer página do meu site
$idLogado = $_SESSION["usuario_id"] ?? null; // se o usuario não tiver feito login a session é null

```

#### **Criptografia de Senhas**

No passado, desenvolvedores armazenavam senhas utilizando funções matemáticas de integridade como `md5($senha)` ou `sha1($senha)`.

> O MD5 foi quebrado em 2004 e SHA1 foi quebrado em 2017. 

**A Solução Moderna é Criptografia com uso de Hash**

O padrão de Criptografia Moderno é o **Argon2id**, complementado pelo **Bcrypt**

**Características da Cryptografica de Hash**:
1. **Unidirecional(One-Way):**  É matematicamente impossivel descriptografar o hash para recuperar a senha original.
2. **Salt Automático e Aleatório**: A cada execução, a função gera um vetor de `salt` unico de 16 bytes. Mesmo que 2 pessoas tenham o mesma senha, os hashes gerados serão completamentes diferentes!
3. **Custos Ajustáveis**: É possivel calibrar quanto tempo e quanta memória o algoritmo levará para calcular o hash.

**Sintaxe Profissional de Cryptografia Moderna**

```php
$senhaDigitada = "123456";
$senhaInformada = $_POST["senha"];
$hashDoBanco    = $usuario["hash"];

//gerar a hash utilizando Argon2id (ou Bcrypt)
$hash = password_hash($senhaDigitada, PASSWORD_ARGON2ID);// isso será armazenado no banco
//Saída: $argon2id$v=19$m65536,t=4,p=1$FSGJhfavdb...(comprimeto ~96 a 128 chars)

// o Processo de Verificação
if(password_verify($senha_informada, $hashDoBanco)){
    //Senha Correta
}else {
    //Senha incorreta
}

```

>[!Aviso]
>Nunca tente fazer (password_hash($senha) === $hashDoBanco)
>Como o `password_hash`gera um salt aleatírio a cada milisegundo, a comparação por igualdade **sempre dará falso**
>A Verificação deve ser feita **exclusivamente com a função nativa `password_verify()`

#### **Arquitetura de Autenticação: Middleware**

para inpedir que visitantes não logados acessem páginas privadas (como dashboard.php ou relatorios.php), criamos interceptadores chamados **Guard (Middlewares de Proteção)**.

```mermaid
flowchart TD
    req["Requisição do Navegador<br/>GET(dashboard.php)"] --> guard["Middleware: guard.php"]

    guard --> check1{"$_SESSION[usuario_id existe?]"}
    check1 -- Não --> kick1["header(login.php)"]

    check1 -- Sim --> allow["header(dashboard.php)"]
```
**Como usar o guard.php**:

Em todas as páginas restritas do sistema a **primira linha de código** após o `declare(strict_types=1)` será:

```php
require_onde __DIR__ . "/src/guard.php";
```
Se a pessoa não estiver autenticas ou não tiver o perfil de acesso, ela é expulsa antes mesmo que qualquer bytes de HTML seja renderizado


