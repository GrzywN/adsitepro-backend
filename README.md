# An recruitment task for adsite.pro company.

## Task

Get ready for an exciting adventure! :)

__Technologies:__
- Backend: Laravel (PHP)
- Frontend: Vue.js + Tailwind CSS

__Assumptions:__

You are to create a simple TO-DO application for task creation. In the application, the user will be able to create task categories and then add tasks to them. When creating a task, the user should be able to assign a person to it from the available application users and specify how many minutes it will take to complete the task. Each person has a 9600-minute limit, which resets on the 1st day of the month.

__Finally, the application should allow:__
- Managing users
- Adding task categories and tasks

The rest is up to your creativity.

We will primarily evaluate the quality of the code, and to a lesser extent, the appearance of the application.

## Run Locally

Make sure you have docker installed and ports are available

```bash
  systemctl restart docker
```

Clone the project

```bash
  git clone https://github.com/GrzywN/adsitepro-backend.git
```

Go to the project directory

```bash
  cd adsitepro-backend
```

Copy environmental config

```bash
  cp .env.example .env
```

Change docker context to default (for linux users)

```bash
  docker context use default
```

Install laravel dependencies

```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

Start the server

```bash
  ./vendor/bin/sail up -d
```

Generate application key

```bash
  ./vendor/bin/sail artisan key:generate
```

Clear cached configuration

```bash
  ./vendor/bin/sail artisan optimize:clear
```

Link storage

```bash
  ./vendor/bin/sail artisan storage:link
```

Run migrations and seeders

```bash
  ./vendor/bin/sail artisan migrate:fresh --seed
```

Run tests to ensure everything is working fine 🎉

```bash
  ./vendor/bin/sail artisan test
```

To stop the server simply run

```bash
  ./vendor/bin/sail stop
```
