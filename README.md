# Todo-list application

### How to run 
1. Clone the repository

```
git clone https://github.com/tico1994/laravel-todolist-app.git
```

2. Run inside folder which contained application:

```
docker compose up -d
```

3. Application will be available under http://0.0.0.0:80
### About 

This is a simple PHP application written in the Laravel framework.
The purpose of the application is to manage a well-known to-do list.
The main functionalities are displaying a list of todos, editing todos, completing todos, and deleting todos.

### Tech

- Todos is situated in mysql database in the table `todos`.
- All backend code for todos is situated in App/Modules/Todo
- I'm using phpstan on a max level for static analyse
- I'm using barryvdh/laravel-ide-helper to generate phpdocs for laravel magic
- application is dockerized
- I'm using php-cs-fixer for fixing code due to the standards
- I'm using here repository pattern with separation on read/write repositories
