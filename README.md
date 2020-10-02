# Treinando Unit tests em PHP

Esse repositório contém uma pequena aplicação que descobre o seu IP
e diz qual a sua localizacao baseado no IP. Leia o arquivo [getIp.php](./getIp.php) para
entender como a aplicação funciona.

## Como instalar e rodar tests

```bash
./composer.phar install
./vendor/bin/phpunit --colors tests
```

## Objetivo

Faça um fork 😉. 
Seu objetivo é criar testes para todas as classes `App\Service`. Siga o documento [Guide.md](Guide.md) para saber a melhor ordem de estudo.
Cada teste cobre partes das suas classes `App\Service`, o objetivo seria chegar a 100% de cobertura para fins de estudo. Você pode acompanhar sua porcentagem de cobertura através da pagina do [github actions](https://github.com/cloudson/treinando-unit-tests-php/actions).

![](./full_coverage.png)
Curtiu o desafio? Quer deixar algum feedback para melhorar o repo ou trocar ideia? Abra uma issue e conversamos por la :smile: 

Se você quiser rodar o projeto e ver cobertura na sua maquina local, o modo mais fácil é via docker. 

```
docker build . -t app 
docker run app vendor/bin/phpunit --whitelist ./src/Service --coverage-text --colors ./tests
```
