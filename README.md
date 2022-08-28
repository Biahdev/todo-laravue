<h1 align="center">
  <span>To-do</span>
</h1>

<h4 align="center"> 
  🚧 Em construção  🚧
</h4>

## 📋 Sobre o projeto

To-do - É um sistema de gestão de tarefas simples e eficiente feito com Vue.js, Vuex e Laravel com ApiRest. O front foi feito junto ao curso do Tiago Matos.

## 🗺 Roadmap

### Front-end

- [X] Setup básico de pastas
- [X] Crud das tarefas
  - [X] Criar uma tarefa
  - [X] Editar uma tarefa
  - [X] Excluir uma tarefa
  - [X] Listar tarefas
  - [X] Trocar o status para tarefa concluida

### Back-end

- [X] Setup básico de pastas
- [X] Crud das tarefas
  - [X] Criar uma tarefa
  - [X] Editar uma tarefa
  - [X] Excluir uma tarefa
  - [X] Listar tarefas
  - [X] Trocar o status para tarefa concluida

## ⚡ Tech Stack

As seguintes ferramentas foram usadas na construção do projeto:

### Front-end

- Vue.js
- Vuex
- Tailwind CSS

### Back-end

- PHP 8.1
- Laravel 9
- MySql 8

### Utilitários

- Editor:  **[Visual Studio Code](https://code.visualstudio.com/)**
- BD: MySqlWorkBench
- API Client : [Insonia](https://insomnia.rest/)

## 🛠 Como executar o projeto

Este projeto é divido em Duas partes:

1. Frontend
2. Backend

### Pré-requisitos

- Node.js
- NPM
- PHP 8.x
- MySQL 8
- Composer

### Rodando o front-end

```bash

# Clone este repositório
$ git clone 

# Vá para a pasta back-end
$ cd front-end

# Instale as dependências
$ npm install

# Execute a aplicação em modo de desenvolvimento
$ npm run dev

#click no link do servidor que foi gerado

```

### Rodando o Backend (servidor)

```bash

# Clone este repositório
$ git clone 

# Vá para a pasta server
$ cd back-end

# Instale as dependências
$ composer install

# Execute a aplicação em modo de desenvolvimento
$ php artisan serve

#click no link do servidor que foi gerado
```

## 🌐 End points da API

| Método    | URL                 | Descrição                     |
| ---------- | ------------------- | ------------------------------- |
| `GET`    | api/                | Listar as tarefas               |
| `POST`   | api/task            | Criar uma nova tarefa           |
| `UPDATE` | api/task/:id        | Atualizar o titulo da tarefa    |
| `UPDATE` | api/task/status/:id | Atualizar o status dessa tarefa |
| `DELETE` | api/task/:id        | Deletar uma tarefa              |

### Get

```json
// Retorno
[
  {
    "id": 1,
    "title": "Tarefa 1",
    "completed": 0,
    "created_at": "2022-08-27T23:56:39.000000Z",
    "updated_at": "2022-08-27T23:56:39.000000Z"
  },
  {
    "id": 2,
    "title": "Tarefa 2",
    "completed": 0,
    "created_at": "2022-08-27T23:56:39.000000Z",
    "updated_at": "2022-08-27T23:56:39.000000Z"
  }
]
```

### Post

```json
// Envio 
{
  "title":"Tarefa 3"
}

// Retorno
{
  "title": "Tarefa 3",
  "completed": false,
  "updated_at": "2022-08-28T02:50:23.000000Z",
  "created_at": "2022-08-28T02:50:23.000000Z",
  "id": 13,
  "message": "Tarefa criada com sucesso!",
  "httpCode": 202
}
```

### Update

```json
// Envio
{
  "title":"Tarefa Update"
}

// Retorno
{
  "id": 1,
  "title": "Tarefa Update",
  "completed": false,
  "created_at": "2022-08-27T23:56:39.000000Z",
  "updated_at": "2022-08-28T02:55:26.000000Z",
  "message": "Tarefa atualizada com sucesso com sucesso!",
  "httpCode": 202
}

```

### Update Status

```json
// Envio
{
  "completed":true
}

// Retorno
{
  "id": 1,
  "title": "Tarefa Update",
  "completed": true,
  "created_at": "2022-08-27T23:56:39.000000Z",
  "updated_at": "2022-08-28T02:55:26.000000Z",
  "message": "Tarefa atualizada com sucesso com sucesso!",
  "httpCode": 202
}
```

### Delete

```json
// Retorno
{
  "id": 9,
  "title": "Tarefa Update",
  "completed": 1,
  "created_at": "2022-08-27T23:56:39.000000Z",
  "updated_at": "2022-08-28T02:58:41.000000Z",
  "message": "Tarefa deletada com sucesso!",
  "httpCode": 202
}
```

## 🦸 Autora

<p>Feito com ❤️ por Ana Beatriz, entre em contato!  </p>

[![dev.to](https://img.shields.io/badge/dev.to-111?style=for-the-badge&logo=devdotto&logoColor=white)](https://dev.to/biahdev)
[![codepen](https://img.shields.io/badge/codepen-111?style=for-the-badge&logo=codepen&logoColor=white)](https://codepen.io/BiahDev)
[![linkedin](https://img.shields.io/badge/linkedin-111?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/biahdev)
[![twitter](https://img.shields.io/badge/twitter-111?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/BiahDev)
<a href="mailto:bia8717@hotmail.com">
  <img src="https://img.shields.io/badge/Email-111?style=for-the-badge&logo=gmail&logoColor=white" />
</a>
