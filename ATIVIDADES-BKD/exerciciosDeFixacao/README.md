**1** - Riscos do modelo procedural: regras duplicadas e inconsistentes, possibilidade de alterar dados críticos sem validação e dificuldade de manter, testar e auditar o sistema.

**2** - Criação do objeto: o PHP reserva espaço na memória Heap para a nova instância e guarda seus atributos. O método construtor é chamado automaticamente para inicializar o objeto com valores válidos.

**3** - Uso de $this: $this->saldo acessa o saldo do objeto atual. Já $saldo é apenas uma variável local do método e não altera o estado da conta.

**4** - Método para definir saldo diretamente: não deve existir porque permitiria qualquer código alterar o saldo livremente, inclusive com valores negativos ou incorretos. O saldo deve mudar somente por depósito, saque ou transferência.

**5** - private e protected: private permite acesso apenas dentro da própria classe. protected permite acesso também às subclasses, facilitando a herança sem expor os dados ao código externo.

**6** - Promoção de propriedades: recurso do PHP oito que declara e inicializa uma propriedade diretamente na assinatura do construtor. Isso elimina repetições e torna o código mais curto e legível.

**7** - Propriedades somente leitura: uma propriedade somente leitura pode receber valor apenas uma vez, normalmente na criação do objeto. Isso protege dados como titular e número de documento contra alterações indevidas.

**8** - Classe abstrata de conta: uma conta bancária genérica não deve ser criada diretamente, pois existem apenas tipos concretos, como conta corrente e conta poupança. A classe abstrata reúne o que é comum e obriga as filhas a definirem seus comportamentos específicos.

**9** - Polimorfismo: o método de transferência aceita qualquer objeto que seja uma conta bancária. Durante a execução, o PHP chama o comportamento correto da subclasse, sem precisar saber se a conta de destino é corrente ou poupança.

**10** - Falha no saque: retornar falso ou nulo esconde o motivo da falha e pode ser ignorado pelo programador. Lançar uma exceção deixa o erro explícito, informa a causa e permite tratamento adequado.