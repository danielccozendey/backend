### Exercícios
**Parte A**
!Exercícios Teóricos!

**1.Conceito de função: Explique com suas palavras o que é uma função e cite duas vantagens de dividir um programa em funções.**
- Uma função é um blocode código que executa uma tarefa específica. Ela recebe dados, faz um cálculo ou ação e devolve um resultado.
**Vantagem de usar funções**
Organização: O código fica limpo e separado em partes menores. Fica mais fácil ler e achar erros.Reutilização

**2.Princípio DRY: Por que repetir o mesmo bloco de código em várias partes do sistema pode causar problemas de manutenção? Como uma função ajuda a evitar essa repetição?**
- Repetir código cria pontos múltiplos de falha. Se uma regra muda, você precisa atualizar cada cópia. Isso causa erros e gasta tempo. Uma função guarda esse bloco em um só lugar. Você chama a função sempre que precisa e muda o código em um único ponto.
**Problemas da Repetição (DRY)**
* Erros fáceis: Esquecer de mudar uma cópia gera falhas no sistema.*Código longo: Arquivos ficam grandes e difíceis de ler.
* Tempo perdido: Atualizar várias partes atrasa o trabalho.
**Como a Função Ajuda ??**
*Ponto único: A lógica fica em um só lugar.
*Fácil troca: Mudar a função atualiza o sistema inteiro.
*Código limpo: Fica mais curto e fácil de entender.




**3.Parâmetros e retorno: Explique a diferença entre um parâmetro e um valor retornado por uma função. Use a função abaixo como exemplo:**
```php
function calcularTotal(float $preco, int $quantidade): float {
    return $preco * $quantidade;
}
```
- Parâmetros são os dados que entram na função, enquanto o valor retornado é o resultado que sai dela.
**utilizando o exemplo:**
*Parâmetros (Entrada)*
São as variáveis declaradas entre os parênteses da função ($preco e $quantidade).
Funcionam como combustíveis ou instruções para o bloco de código.
No exemplo, a função precisa receber um número decimal (preço) e um número inteiro (quantidade) para poder trabalhar.
*Retorno (Saída)*
É o resultado final enviado de volta para quem chamou a função, indicado pela palavra-chave return.
O tipo após os dois pontos (: float) define que a saída será obrigatoriamente um número decimal.
No exemplo, o retorno é a multiplicação do preço pela quantidade ($preco * $quantidade).

**4.Tipagem: Identifique o tipo de cada elemento na declaração
 function cadastrar(string $nome, int $idade): bool.** 

- function → palavra-chave utilizada para declarar uma função.
- cadastrar → nome da função.
- string $nome → parâmetro chamado $nome, que deve receber um valor do tipo string.
- int $idade → parâmetro chamado $idade, que deve receber um valor do tipo int (inteiro).
- : bool → indica que a função deve retornar um valor do tipo bool (booleano), ou seja, true ou false.


**5. void e return: Qual é a diferença entre uma função que retorna string e uma função que retorna void? Dê um exemplo de uso para cada uma.**

Uma função que retorna string deve devolver um valor textual utilizando return. Esse valor pode ser armazenado em uma variável ou utilizado diretamente.

Exemplo:
```php
function nomeCompleto(): string {
    return "Mariana Silva";
}

echo nomeCompleto();
```

Nesse exemplo, a função retorna a string "Mariana Silva".

Já uma função que retorna void não retorna um valor para ser utilizado pelo programa. Ela normalmente é usada para executar alguma ação, como exibir uma mensagem.

Exemplo:
```php
function exibirMensagem(): void {
    echo "Olá, usuário!";
}

exibirMensagem();
```

Nesse caso, a função apenas executa o echo e não retorna nenhum valor.

**6. Escopo            or que a função abaixo não consegue acessar $cliente diretamente? Explique duas formas de corrigir o código e indique qual é a mais recomendada.**
```php
$cliente = "Mariana";

function exibirCliente(): string {
    return $cliente;
}
```

A função não consegue acessar $cliente diretamente porque a variável foi criada no escopo global, enquanto a função possui seu próprio escopo local. Variáveis criadas fora de uma função não ficam disponíveis dentro dela automaticamente.

Uma primeira forma de corrigir é utilizar a palavra-chave global:
```php
$cliente = "Mariana";

function exibirCliente(): string {
    global $cliente;
    return $cliente;
}

echo exibirCliente();

Outra forma, e a mais recomendada, é passar a variável como parâmetro da função:

$cliente = "Mariana";

function exibirCliente(string $cliente): string {
    return $cliente;
}

echo exibirCliente($cliente);
```

A segunda forma é mais recomendada porque deixa a função independente de uma variável global, tornando o código mais organizado, reutilizável e fácil de testar.

**7. Referência: O que muda quando um parâmetro é declarado como float &$valor? Explique a diferença entre alterar uma cópia e alterar a variável original.**

Quando utilizamos & antes do parâmetro, como em float &$valor, o parâmetro é passado por referência. Isso significa que a função trabalha diretamente com a variável original.

Sem o &, normalmente a função trabalha com uma cópia do valor:
```php
function aumentar(float $valor): void {
    $valor += 10;
}

$preco = 100;
aumentar($preco);

echo $preco; // 100

Nesse caso, $preco continua valendo 100, porque a alteração aconteceu apenas na cópia recebida pela função.

Com &, a alteração é feita na variável original:

function aumentar(float &$valor): void {
    $valor += 10;
}

$preco = 100;
aumentar($preco);

echo $preco; // 110
```

Nesse exemplo, $preco passa a valer 110, pois a função modificou diretamente a variável original.

**8. Funções nativas: Escolha cinco funções da tabela deste material e descreva: categoria, finalidade, parâmetros principais e valor retornado.**

Como a tabela do material não foi enviada junto com as questões, vou utilizar cinco funções nativas comuns do PHP como exemplo.

1. strlen()
Categoria: Strings.

Finalidade: Retornar a quantidade de caracteres de uma string.

Parâmetro principal: Uma string.

Valor retornado: Um int representando a quantidade de caracteres.

Exemplo:
```php
$nome = "Mariana";
echo strlen($nome); // 7
```

2. strtoupper()
Categoria: Strings.

Finalidade: Converter uma string para letras maiúsculas.

Parâmetro principal: Uma string.

Valor retornado: Uma string em letras maiúsculas.

Exemplo:
```php
echo strtoupper("mariana"); // MARIANA
```

3. strtolower()
Categoria: Strings.

Finalidade: Converter uma string para letras minúsculas.

Parâmetro principal: Uma string.

Valor retornado: Uma string em letras minúsculas.

Exemplo:
```php
echo strtolower("MARIANA"); // mariana
```

4. count()
Categoria: Arrays/contagem.
Finalidade: Contar a quantidade de elementos de um array.
Parâmetro principal: Um array ou objeto contável.
Valor retornado: Um int com a quantidade de elementos.
Exemplo:
```php
$clientes = ["Mariana", "João", "Carlos"];

echo count($clientes); // 3
```

5. is_numeric()
Categoria: Verificação de tipos/valores.

Finalidade: Verificar se um valor é numérico ou pode ser interpretado como número.

Parâmetro principal: O valor que será verificado.

Valor retornado: Um bool, sendo true quando o valor é numérico e false quando não é.

Exemplo:
```php
$valor = "100";

var_dump(is_numeric($valor)); // bool(true)
``` 

**9.Previsão de saída: Qual será o resultado exibido pelo código abaixo? Explique o motivo.**

```php
function aplicarDesconto(float $preco): float {
    return $preco * 0.90;
}

$valor = 100.00;
echo aplicarDesconto($valor);
echo $valor;

O resultado exibido será:

90
100
``` 

A função *aplicarDesconto()* recebe o valor 100.00 e multiplica por 0.90, resultando em 90.

Porém, a função não altera a variável *$valor* original. O parâmetro *$preco* recebe o valor de *$valor* e a função retorna apenas o resultado do cálculo.

Por isso:
```php
echo aplicarDesconto($valor);

exibe:

90

E:

echo $valor;

continua exibindo:

100
```

Como não existe espaço ou quebra de linha entre os dois echo, na tela, o resultado real será 90100.

Se fosse utilizado:
```php
echo aplicarDesconto($valor);
echo "<br>";
echo $valor;
```

o resultado seria:

90
100

**10.Documentação: Pesquise na documentação oficial do PHP a função strlen() e anote sua sintaxe, o parâmetro recebido e o tipo de retorno.**

De acordo com a documentação oficial do PHP, a função strlen() retorna o comprimento de uma string em bytes. Sua sintaxe é:

strlen(string $string): int

Função: strlen()

Sintaxe: strlen(string $string): int

Parâmetro recebido: $string, que deve ser uma string.

Tipo de retorno: int.

Finalidade: Retornar o tamanho da string em bytes.

Exemplo:
```php
$texto = "Olá";
echo strlen($texto);
```
A função retorna um número inteiro correspondente ao tamanho da string em bytes. Para textos com caracteres acentuados ou outros caracteres multibyte, o resultado pode ser diferente da quantidade de caracteres visíveis.

