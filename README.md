# Real Estate Bid

## Environment Requirements
- node: v18
- php: v8.3
- MySQL: 8

## Installation

```
npm install
compser install
cp .env.example .env
```

### Set up Database via Docker
You may choose to set up the database using docker
```
cd realestate-bid
docker-compose up
```
- After the containers are set up. You may visit the db adminer via localhost:8080 and create a database manually

`.env`
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
