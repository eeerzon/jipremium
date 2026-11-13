# JIPREMIUM

Website pameran JIPREMIUM: halaman publik (home, visit, exhibit, brand, notice, inquiries, newsletter), registrasi Visitor/Buyer (online & onsite) yang terhubung ke API Kreen, dan panel admin.

- Laravel 12, PHP **8.2+**
- MySQL (2 koneksi: `mysql` untuk data website, `event_db` untuk database event Kreen)
- Frontend: Blade + Bootstrap/jQuery (tanpa build step)

## Struktur folder

Repo ini adalah **web root** server, bukan folder Laravel standar.

```
/                     <- document root Apache
├── index.php         <- entry point, memuat jipremium/vendor dan jipremium/bootstrap
├── .htaccess         <- rewrite ke index.php + blokir file sensitif
├── css/ js/ fonts/ images/ image/ product_images/ scss/ download/ videos/
├── public/           <- pdfs + folder upload admin (public/images, public/image)
└── jipremium/        <- aplikasi Laravel (app, config, routes, resources, database, ...)
    ├── .htaccess     <- "Require all denied" (folder ini tidak boleh diakses dari web)
    └── local-router.php  <- router untuk menjalankan di local, meniru aturan .htaccess
```

Path upload bersifat relatif terhadap web root (`public/images/`, `public/image/`), jadi aplikasi harus dijalankan dari folder root ini.

## Yang tidak ada di repo

| Apa | Kenapa | Ambil dari |
|---|---|---|
| `jipremium/.env` | Berisi secret | Buat dari `jipremium/.env.example`, minta nilainya ke tim |
| `jipremium/vendor/` | Dependency | `composer install` |
| `public/images/*`, `public/image/*` | File upload dari admin | Copy dari server live |
| `videos/*.mp4` | Lebih dari 100 MB (batas GitHub) | Copy dari server live |
| `myad/` (phpMyAdmin) | Tool server, tidak boleh di-versioning | — |
| `jipremium/storage/logs/*` | Log berisi data pengunjung | — |

## Menjalankan di local

Butuh: PHP 8.2+ (ekstensi `pdo_mysql`, `mbstring`, `intl`, `gd`, `zip`), Composer, MySQL/MariaDB.

```bash
cd jipremium
composer install
cp .env.example .env
php artisan key:generate
```

Isi `.env` minimal:

```dotenv
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jipremium
DB_USERNAME=root
DB_PASSWORD=
# DB_SOCKET=/tmp/mysql.sock   # isi jika MySQL hanya bisa lewat socket

EVENT_DB_HOST=127.0.0.1
EVENT_DB_PORT=3306
EVENT_DB_DATABASE=kreen_event_local
EVENT_DB_USERNAME=root
EVENT_DB_PASSWORD=

KREEN_API_SECRET_KEY=...        # untuk ambil form registrasi dari API Kreen
KREEN_FAKE_ORDER_API=true       # WAJIB true di local, lihat catatan di bawah
```

Siapkan database:

```bash
mysql -uroot -e "CREATE DATABASE jipremium; CREATE DATABASE kreen_event_local;"
php artisan migrate
mysql -uroot < database/local/jipremium_local_patch.sql
```

`jipremium_local_patch.sql` melengkapi tabel/kolom yang di production dibuat di luar migration. Kalau ada dump production, lebih baik pakai dump itu.

Buat akun admin:

```bash
php artisan tinker --execute="App\User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>bcrypt('ganti-password')]);"
```

Jalankan dari **folder root** (bukan dari `jipremium/`):

```bash
cd ..
php -S 127.0.0.1:8000 -t . jipremium/local-router.php
```

Buka http://127.0.0.1:8000 — admin di http://127.0.0.1:8000/login.

Perubahan file PHP/Blade langsung berlaku tanpa restart server. Jalankan `php artisan optimize:clear` jika route/config pernah di-cache.

### `KREEN_FAKE_ORDER_API`

Registrasi mengirim order ke API Kreen, dan Kreen langsung mengirim email tiket ke pendaftar. Dengan `KREEN_FAKE_ORDER_API=true` (hanya berlaku saat `APP_ENV=local`), request checkout ke Kreen dipalsukan: registrasi di local tetap sukses dan tersimpan di database local, tapi **tidak ada order atau email yang terkirim**. Di production variabel ini harus dihapus atau `false`.

## Setting event (file global)

Semua nilai yang berubah tiap tahun ada di satu file: [`jipremium/app/Support/JipremiumEvent.php`](jipremium/app/Support/JipremiumEvent.php)

- Event ID dan Ticket ID Kreen untuk Visitor & Buyer (online/onsite)
- Deadline registrasi online, jam buka/tutup registrasi onsite (`Asia/Jakarta`)
- Tujuan tombol registrasi di halaman Visit (desktop & mobile): isi dengan nama route (`visitor_onsite.create`) atau URL lengkap (dibuka di tab baru)

Controller registrasi dan halaman Visit membaca dari file ini, jadi cukup ubah di sini.

## Deploy ke live

1. Backup file dan database server.
2. Server butuh PHP 8.2+.
3. Upload kode (tanpa `.env`, `vendor`, upload, log), lalu di folder `jipremium/`:
   ```bash
   composer install --no-dev --optimize-autoloader
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
4. `.env` production: `APP_ENV=production`, `APP_DEBUG=false`, `SESSION_SECURE_COOKIE=true`, `APP_KEY` sama dengan yang lama, secret Kreen terbaru, tanpa `KREEN_FAKE_ORDER_API`.
5. **Jangan** jalankan `php artisan migrate` di production — skema production tidak sepenuhnya mengikuti migration.
6. Cek: `/jipremium/.env` dan `/phpinfo.php` harus 403/404, `/register` harus 404, dan coba satu registrasi sampai halaman thank you.

## API

Route di `routes/api.php` dilindungi header `API-Secret-Key` (nilai dari `API_SECRET_KEY` di `.env`):

- `POST /api/order/check-qrcode`
- `POST /api/checkin-backfill/run`, `POST /api/checkin-backfill/fix-flag-present` (menulis ke database event live)
