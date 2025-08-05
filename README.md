# 📝 Laravel 12 Todo App

Basit ama kapsamlı bir **Laravel 12 Todo uygulaması**. Kullanıcılar kayıt olabilir, giriş yapabilir ve görevlerini kategoriye göre yönetebilir. Proje **Docker üzerinde çalışır** ve veritabanı olarak **SQLite** kullanır.

---

## 🚀 Özellikler

- ✅ Laravel 12.x
- ✅ Kullanıcı kayıt & giriş (Auth)
- ✅ Görev oluşturma, düzenleme, silme
- ✅ Görev durumu ve öncelik belirleme (Enum kullanımı)
- ✅ Kategoriye göre görev ayırma
- ✅ SQLite ile hızlı kurulum
- ✅ Docker tabanlı çalışma ortamı

---

## 🐳 Docker ile Kurulum

> Uygulama Laravel 12 ve PHP 8.2 ile çalışır. Aşağıdaki komutlar Docker üzerinden çalıştırmak içindir.

### 1. Docker container'larını başlat:
```bash
docker-compose up -d --build
```

### 2. Container içerisine gir:
```bash
docker exec -it laravel-app bash
```

### 3. Laravel yapılandırması:
```bash
composer install
cp .env.example .env
php artisan key:generate
```
### 4. SQLite dosyasını oluştur:
```bash
touch database/database.sqlite
```
.env içindeki veritabanı ayarları:
```
DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/database/database.sqlite
```

### 5. Migration çalıştır:
```bash
php artisan migrate
```
## 📂 Klasör Yapısı (Özet)
src
├── app/
│   ├── Enums/                    → Todo enum sınıfları
│   ├── Http/
│   │   ├── Controllers/          → Auth, Todo, Category
│   │   ├── Middleware/           → Auth middleware'ları
│   │   └── Requests/             → Form validation sınıfları
│   ├── Models/                   → User, Todo, Category
│   └── Providers/
│
├── resources/
│   ├── views/
│   │   ├── layouts/              → Temel layout blade dosyası
│   │   ├── includes/            → Partial view dosyaları
│   │   └── pages/
│   │       ├── auth/            → Giriş / Kayıt formları
│   │       ├── categories/      → Kategori yönetimi
│   │       └── todos/           → Todo listesi
│   └── js/                      → JS dosyaları (vite ile)
│
├── routes/
│   ├── web.php                  → Web route'ları
│   └── console.php
│
├── database/
│   ├── migrations/              → Veritabanı yapısı
│   ├── seeders/
│   └── factories/
│
├── docker-compose.yml
├── Dockerfile
├── vite.config.js
├── package.json
├── composer.json
└── README.md

## 🔐 Auth Sistemi
Laravel’in kendi session tabanlı Auth yapısı kullanılır:

Auth::check(), Auth::user()

RedirectIfAuthenticated ve Authenticate middleware'ları

Giriş yapan kullanıcı sessions tablosunda izlenir
