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