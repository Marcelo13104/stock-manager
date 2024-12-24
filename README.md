# Stock Manager

Sistema web de gestão de estoque desenvolvido com PHP, MySQL e Bootstrap.

## Funcionalidades

- CRUD completo de produtos (Criar, Ler, Atualizar, Deletar)
- Interface responsiva com sidebar navegável
- Modal para adição/edição de produtos
- Listagem em tabela com ordenação
- Validação de dados
- Feedback visual das operações

## Tecnologias

- Frontend: HTML5, CSS3, JavaScript, Bootstrap 5
- Backend: PHP 7+
- Banco de Dados: MySQL
- Ícones: Bootstrap Icons

## Estrutura

```
stock-manager/
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── main.js
├── config/
│   └── database.php
├── src/
│   └── Controllers/
│       └── ProductController.php
├── public/
│   └── index.html
└── api/
    └── products.php
```

## Instalação

1. Clone o repositório
2. Configure um servidor web com PHP (XAMPP, WAMP, MAMP)
3. Crie o banco de dados MySQL
4. Configure as credenciais em `config/database.php`
5. Acesse via `http://localhost/stock-manager/public/index.html`

## API Endpoints

- GET `/api/products.php` - Lista todos os produtos
- GET `/api/products.php?id=X` - Retorna produto específico
- POST `/api/products.php` - Cria novo produto
- PUT `/api/products.php?id=X` - Atualiza produto existente
- DELETE `/api/products.php?id=X` - Remove produto
