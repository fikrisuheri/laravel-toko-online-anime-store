<h1 align="center">Selamat datang di Aplikasi Toko Online Laravel! 👋</h1>
<img src="https://user-images.githubusercontent.com/61069138/177085248-ff1e8def-d301-4ad3-aea0-5a7416178997.png" >


<p align="center">Dibuat Menggunakan Framework Laravel Versi 9.</p>
<div align="center">

[![All Contributors](https://img.shields.io/github/contributors/fikrisuheri/laravel-toko-online-anime-store)](https://github.com/fikrisuheri/laravel-toko-online-anime-store/graphs/contributors)
![GitHub last commit](https://img.shields.io/github/last-commit/fikrisuheri/laravel-toko-online-anime-store.svg)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/fikrisuheri/laravel-toko-online-anime-store)
</div>

## DIMOHON UNTUK TIDAK DIPERJUALBELIKAN !

## Fitur apa saja yang tersedia di Aplikasi Toko Online Laravel?

- TERINTEGRASI DENGAN PAYMENT GATEWAY MIDTRANS
- PERHITUNGAN ONGKIR SUDAH MEMAKAI RAJA ONGKIR
- ORDER LEBIH DARI SATU PRODUK
- KERANJANG BELANJA
- Dan lain-lain


## Akun Default

- email: admin@gmail.com
- Password: admin123

---

## Install

1. **Clone Repository**

```bash
git clone https://github.com/fikrisuheri/laravel-toko-online-anime-store.git
cd laravel-toko-online-anime-store
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Buka `.env` lalu ubah baris berikut sesuai dengan api rajaongkir kamu**

```bash
RAJAONGKIR_API_KEY=xxxxxxxxxx
RAJAONGKIR_PACKAGE=starter
```

4. **Buka `.env` lalu ubah baris berikut sesuai dengan api midtrans kamu**

```bash
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_MERCHAT_ID=xxxxxx
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxx
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxx
```


5. **Instalasi Aplikasi**

```bash
php artisan key:generate
php artisan migrate --seed
```

4. **Jalankan Aplikasi**

```bash
php artisan serve
```


## Contributing

Contributions, issues and feature requests di persilahkan.


## Author

- Facebook : <a href="https://web.facebook.com/ahmad.ari.9847/"> FIKRI SUHERI</a>
- INSTAGRAM : <a href="https://www.instagram.com/fikrisuheri__"> FIKRI SUHERI</a>

## Donation

You can support Me On [Saweria](https://saweria.co/fikrisuheri) Or [Traktee](https://trakteer.id/fikri-suheri)

## Preview

![Screenshot 2022-07-04 115800](https://user-images.githubusercontent.com/61069138/177089013-6fc3302f-0daf-4598-9d84-79a709cadfa1.png)
![Screenshot 2022-07-04 120138](https://user-images.githubusercontent.com/61069138/177089020-91808870-775d-42ad-bc56-41db9d9cee25.png)
![Screenshot 2022-07-04 120326](https://user-images.githubusercontent.com/61069138/177089026-e700b29a-8120-4f9e-aa8f-3ce76f6ccf54.png)
![Screenshot 2022-07-04 120307](https://user-images.githubusercontent.com/61069138/177089043-7415b6c6-265f-448b-b67e-3f21face387a.png)
