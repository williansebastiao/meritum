# Meritum

Este repositório tem como objetivo demorar como funciona autenticação com JWT.

## Serviços

- Docker
- JWT

## Features

- Nenhuma até o momento


## Instalação

Clone o projeto

```bash
  git clone git@github.com:williansebastiao/meritum.git
```

Acesso o diretório do projeto

```bash
  cd /path/to/project
```

Instale as dependencias

```bash
  composer Install
  composer dumpautoload
```

Crie um banco de dados com nome Meritum e execute o seguinte comando.

```bash
  php artisan migrate
```

Executar o projeto

```bash
  make start
```

Acesse a página: http://localhost:8000
## Testes

Para executar testes de api, utilize o seguinte endpoint: http://localhost:8000/api

#### Register
Endpoint: /register

Body:
```bash
  {
	"first_name": "Sarah",
	"last_name": "Souza",
	"email": "sarahsantossouza@teleworm.us",
	"phone": "(34) 98478-7368",
	"cpf": "856.659.638-28",
	"password": "12345678"
}
```

#### Authenticate
Endpoint: /authenticate

Body:
```bash
  {
	"email": "sarahsantossouza@teleworm.us",
	"password": "12345678"
}
```

#### Me
Endpoint: /user/me

#### Logout
Endpoint: /user/logout
