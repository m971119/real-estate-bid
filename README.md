# BidNest
A **VILT** ( Vue + Inertia + Laravel + TailwindCSS ) real estate listing and bidding application

> *bidding part in progress...*

## Environment Requirements
- node: v18
- php: v8.3
- MySQL: 8

## Installation
```
npm install
compser install
cp .env.example .env
php artisan key:generate
```

### Set up Database via Docker
You may choose to set up the database using docker
```
# make sure you are in the project folder
cd real-estate-bid
docker-compose up
```
- After the containers are set up. You may visit the db adminer via localhost:8080.

`.env` (If you choose to use docker for db)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3308
DB_DATABASE={YOUR_DATABASE_NAME}
DB_USERNAME=root
DB_PASSWORD=root
```

## Database Migration and Seed
```
php artisan migrate:fresh --seed
```

## Develop
```
npm run dev
php artisan serve
```

## ESLint
```
npm run fix:eslint
```
