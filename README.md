# ProjectSBD

Aplikasi untuk memenuhi tugas mata kuliah Sistem Basis Data dengan case pembuatan website pengumuman online.

### Langkah-langkah instalasi

-   Clone repository ini

HTTPS

```bash
$ git clone https://github.com/mrizkimaulidan/projectsbd.git
```

SSH

```bash
$ git clone git@github.com:mrizkimaulidan/projectsbd.git
```

-   Masuk ke foldernya

```bash
$ cd projectsbd/
```

-   Install seluruh packages yang dibutuhkan

```bash
$ composer install
```

-   Copy file .env.example dan ubah namanya menjadi `.env`

```bash
$ cp .env.example .env
```

-   Siapkan database dan atur file .env sesuai dengan konfigurasi Anda
-   Ubah value APP_NAME= pada file .env menjadi nama aplikasi yang Anda inginkan
-   Jika sudah, migrate seluruh migrasi dan seeding data

```bash
$ php artisan migrate --seed
```

-   Generate APP_KEY dengan perintah di bawah ini

```bash
$ php artisan key:generate
```

-   Ketik perintah dibawah ini untuk membuat cache baru dari beberapa konfigurasi yang telah diubah

```bash
$ php artisan optimize
```

-   Jalankan local server

```bash
$ php artisan serve
```

-   _(Opsional)_ Secara default debugbar akan aktif, untuk menonaktifkannnya cari variabel `DEBUGBAR_ENABLED` pada file .env dan ubah valuenya menjadi `false`

-   Akses ke halaman

```
http://127.0.0.1:8000
```

---

-   User default aplikasi untuk login

##### Administrator

```
Email       : admin@mail.com
Password    : secret
```

### Dibuat dengan

- [Laravel](https://laravel.com/) - Backend Framework
- [Bootstrap](https://getbootstrap.com/) - Frontend Framework
