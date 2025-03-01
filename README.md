# Laravel 11.x

## Passo a passo para rodar o projeto
Clone o projeto Https
```sh
git clone https://github.com/stoix-dev/Laravel-CMS.git
```
```sh
cd Laravel-CMS
```

Clone o projeto SSH
```sh
git clone git@github.com:stoix-dev/Laravel-CMS.git
```
```sh
cd Laravel-CMS
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Suba os containers do projeto
```sh
docker-compose up -d
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

Instale manualmente o pacote
```sh
composer require blade-ui-kit/blade-heroicons
```

Instale as dependências do Filament
```sh
php artisan filament:install --panels
```

Entenda melhor o [Filament](https://filamentphp.com/docs)

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Acesse o projeto
[http://localhost:8080](http://localhost:8080)
