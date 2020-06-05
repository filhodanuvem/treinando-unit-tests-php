# Treinando Unit tests em PHP - Guia

## [IPFizzBuzz](./src/Service/IPFizzBuzz.php)

FizzBuzz é um jogo que você pode conhecer melhor [aqui](https://en.wikipedia.org/wiki/Fizz_buzz). Nós mudamos um pouco o jogo para funcionar com ips.  

1. Imagine o ip A.B.C.D (127.0.0.1).
2. Se D for multiplo de 3, o metodo getFizzBuzzByIP retorna "Fizz".
3. Se D for multiplo de 5, o metodo getFizzBuzzByIP retorna "Buzz".
4. Se D for multiplo de 3 e 5, o metodo getFizzBuzzByIP retorna "FizzBuzz".
5. Caso nao seja multiplo de nenhum desses numeros, ele retorna o proprio "D".
6. Caso o valor fornecido seja fora das regras listadas acima o teste deve garantir o retorno de uma Exception.

Cada caso do FizzBuzz deveria ser testado. 

Exemplo: Quando eu chamo `(new IPFizzBuzz)->getFizzBuzzByIP('95.92.245.15')` o retorno deveria ser "FizzBuzz" porque 15 é multiplo de 3 e 5.


## [IPFinder](./src/Service/IPFinder.php)

O desafio dessa classe é testa-la de uma forma onde você não faça uma request real no site `checkip.amazonaws.com`, ou seja, você usará o conceito de mocks ou stubs para simular o objeto Client.

Exemplo de teste: Quando eu chamo `$ipFinder->findIp()` e a request me retorna "127.0.0.1", eu deveria ter como retorno "127.0.0.1". 

## [LocationFinder](./src/Service/LocationFinder.php)

O desafio dessa classe é parecido com o IPFinder, mas voce precisa pensar em testes para caso a request não retorne um status code 200, para caso o json de resposta esta incorreto de alguma forma ou quando você passa um ip com espaços. Esses são só alguns exemplos que fazem a classe ser um pouco mais complexa de se testar. 