# Treinando Unit tests em PHP

Esse repositório contém uma pequena aplicação que descobre o seu IP
e diz qual a sua localizacao baseado no IP. Leia o arquivo [getIp.php](./getIp.php) para
entender como a aplicação funciona.

## Como instalar e rodar tests

```bash
./composer.phar install
./vendor/bin/phpunit
```

## Objetivo

Seu objetivo é criar testes para todas as classes `App\Service`. Siga o documento [Guide.md](Guide.md) para saber a melhor ordem de estudo.
Cada teste cobre partes das suas classes `App\Service`, o objetivo seria chegar a 100% de cobertura para fins de estudo. Você pode acompanhar sua porcentagem de cobertura através da pagina do [github actions](https://github.com/cloudson/treinando-unit-tests-php/actions).

![](./coverage.png)

