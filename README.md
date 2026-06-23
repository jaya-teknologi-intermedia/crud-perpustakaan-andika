# 📚 Sistem Perpustakaan PHP Native

## Deskripsi

Sistem Perpustakaan merupakan aplikasi berbasis web yang dibuat menggunakan PHP Native dan MySQL untuk membantu pengelolaan data perpustakaan secara sederhana.

Aplikasi ini memungkinkan pengguna untuk mengelola data buku, data anggota, serta data peminjaman buku melalui antarmuka yang mudah digunakan.

---

## Fitur Aplikasi

### 📖 Manajemen Buku

* Menampilkan data buku
* Menambahkan data buku
* Mengubah data buku
* Menghapus data buku
* Pencarian data buku

### 👤 Manajemen Anggota

* Menampilkan data anggota
* Menambahkan data anggota
* Mengubah data anggota
* Menghapus data anggota
* Pencarian data anggota

### 📋 Manajemen Peminjaman

* Menampilkan data peminjaman
* Menambahkan data peminjaman
* Menampilkan relasi anggota dan buku yang dipinjam
* Menampilkan status peminjaman

### 🏠 Dashboard

* Menampilkan total buku
* Menampilkan total anggota
* Menampilkan total peminjaman
* Navigasi ke seluruh modul aplikasi

---

## Teknologi yang Digunakan

* PHP Native
* MySQL
* HTML5
* CSS3
* Bootstrap 5
* Laragon
* HeidiSQL

---

## Struktur Database

### Database

```sql
perpustakaan
```

### Tabel

#### buku

| Field        | Tipe    |
| ------------ | ------- |
| id_buku      | INT     |
| judul        | VARCHAR |
| penulis      | VARCHAR |
| penerbit     | VARCHAR |
| tahun_terbit | YEAR    |
| stok         | INT     |

#### anggota

| Field          | Tipe    |
| -------------- | ------- |
| id_anggota     | INT     |
| nama           | VARCHAR |
| alamat         | VARCHAR |
| no_hp          | VARCHAR |
| tanggal_daftar | DATE    |

#### peminjaman

| Field           | Tipe    |
| --------------- | ------- |
| id_peminjaman   | INT     |
| id_anggota      | INT     |
| id_buku         | INT     |
| tanggal_pinjam  | DATE    |
| tanggal_kembali | DATE    |
| status          | VARCHAR |

---

## Cara Menjalankan Project

1. Clone repository

```bash
git clone https://github.com/jaya-teknologi-intermedia/crud-perpustakaan-andika.git
```

2. Pindahkan project ke folder web server (Laragon)

```text
C:\laragon\www\
```

3. Import database

```text
database/perpustakaan.sql
```

4. Jalankan Laragon

5. Buka browser

```text
http://localhost:8080/crud_perpustakaan
```

---

## Struktur Project

```text
crud_perpustakaan
│
├── index.php
├── buku.php
├── anggota.php
├── peminjaman.php
│
├── tambah.php
├── edit.php
├── hapus.php
│
├── tambah_anggota.php
├── edit_anggota.php
├── hapus_anggota.php
│
├── tambah_peminjaman.php
│
├── koneksi.php
│
├── database/
│   └── perpustakaan.sql
│
├── screenshots/
│
└── README.md
```

---

## Screenshot

Tambahkan screenshot hasil aplikasi pada folder:

```text
screenshots/
```

* Dashboard
* Data Buku
* Tambah Buku
* Edit Buku
* Data Anggota
* Tambah Anggota
* Edit Anggota
* Data Peminjaman
* Tambah Peminjaman

---

## Pengembang

Dibuat sebagai tugas pengembangan aplikasi CRUD Sistem Perpustakaan menggunakan PHP Native dan MySQL.
