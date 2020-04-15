# Treinando Unit tests em PHP - Guia

## [IPFizzBuzz](./src/Service/IPFizzBuzz.php)

FizzBuzz é um jogo que você pode conhecer melhor [aqui](https://en.wikipedia.org/wiki/Fizz_buzz). Nós mudamos um pouco o jogo para funcionar com ips.  

Imagine o ip A.B.C.D (127.0.0.1).
Se D for multiplo de 3, o metodo getFizzBuzzByIP retorna "Fizz".
Se D for multiplo de 5, o metodo getFizzBuzzByIP retorna "Buzz".
Se D for multiplo de 3 e 5, o metodo getFizzBuzzByIP retorna "FizzBuzz".
Caso nao seja multiplo de nenhum desses numeros, ele retorna o proprio "D".

Cada caso do FizzBuzz deveria ser testado. 


## [IPFinder](./src/Service/IPFinder.php)

