
# Crud-usando-Arquitetura-de-Microservi-os-e-RabbitMQ

Crud usando pela primeira vez microserviçoes com laravel e RadditMQ


## Instalação

Instale com composer

```bash
  cd project/sistema-produtos
  composer update
  php artisan key:generate
  ./vendor/bin/sail up
  
  cd project/main
  composer update
  php artisan key:generate
  ./vendor/bin/sail up
```
    
## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

#### Configurações do banco de dados

`DB_CONNECTION`=mysql

`DB_HOST`=mysql

`DB_PORT`=3306

`DB_DATABASE`=laravel

`DB_USERNAME`=sail

`DB_PASSWORD`=



#### Configurações do RadditMQ

`QUEUE_CONNECTION`=rabbitmq

`RABBITMQ_QUEUE`=

`RABBITMQ_HOST`=

`RABBITMQ_PORT`=

`RABBITMQ_USER`=

`RABBITMQ_PASSWORD`=

`RABBITMQ_VHOST`=


## Documentação da API

#### Retorna todos os produtos

```http
  GET   http://localhost:8002/api/products
```

#### Retorna um produto

```http
  GET http://localhost:8002/api/products/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do produto que você quer |

#### Retorna um item

```http
  POST http://localhost:8001/api/products
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do produto que você quer |

        
	"title":"Novo produto",
	"price":5.99,
	"imageurl":"image"


### Edita um produto
```http
  UPDATE http://localhost:8001/api/products/{id}
```
    "title":"Novo produto EDITADO",
	"price":5.99,
	"imageurl":"image"

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do produto que você quer |


### Deleta um produto
```http
  DELETE http://localhost:8001/api/products/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do produto que você quer |





