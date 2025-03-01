# Laravel 11.x

## Passo a passo para rodar o projeto
Clone o projeto Https
```sh
git clone https://github.com/AssFerj/laravel-filament-base.git
```
```sh
cd laravel-filament-base
```

Clone o projeto SSH
```sh
git clone git@github.com:AssFerj/laravel-filament-base.git
```
```sh
cd laravel-filament-base
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Faça o build
```sh
npm run build
```

Acesse o container
```sh
docker exec -it app bash
```

Instale as dependências do projeto
```sh
composer install
```
Se tiver algum problema durante a instalação relacionado ao pacote blade-ui-kit/blade-heroicons atualize o dump-autoload
```sh
composer dump-autoload
```

Entenda melhor o [Filament](https://filamentphp.com/docs)

Acesse o projeto
[http://localhost:8080](http://localhost:8080)
