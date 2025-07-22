# Website-Wide Search System (WWSS)

---

## Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/prasanth-j/wwss-backend.git
cd wwss-backend
```

### 2. Copy & Configure Environment

```bash
cp .env.example .env

# update the following variables in your `.env` file as needed:
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=wwss
DB_USERNAME=root
DB_PASSWORD=root
```

### 3. Build & Start Docker Containers

```bash
docker-compose up --build
```

### 4. Install Composer Dependencies

```bash
docker-compose exec app composer install
```

### 5. Generate Application Key

```bash
docker-compose exec app php artisan key:generate
```

### 6. Run Migrations & Seeders

```bash
docker-compose exec app php artisan migrate --seed
```

---
