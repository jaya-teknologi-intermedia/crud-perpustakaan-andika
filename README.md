# 📚 Sistem Perpustakaan PHP Native

## Deskripsi

Sistem Perpustakaan merupakan aplikasi berbasis web yang dibuat menggunakan PHP Native dan MySQL untuk membantu pengelolaan data perpustakaan secara sederhana.

Aplikasi ini memungkinkan pengguna untuk mengelola data buku, data anggota, serta data peminjaman buku dengan sistem login berbasis session sehingga setiap anggota dapat melihat riwayat peminjamannya sendiri.

---

## Fitur Aplikasi

### 🔐 Autentikasi & Session

* Login anggota
* Session login
* Logout
* Proteksi halaman menggunakan session
* Menampilkan nama anggota yang sedang login

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
* Relasi anggota dan buku
* Status peminjaman
* ID anggota otomatis diambil dari session login
* User tidak dapat memilih data dirinya secara manual

### 📚 Riwayat Peminjaman

* Menampilkan riwayat peminjaman anggota yang sedang login
* Data ditampilkan berdasarkan session user
* Setiap anggota hanya dapat melihat data miliknya sendiri

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

### Tabel anggota

| Field          | Tipe    |
| -------------- | ------- |
| id_anggota     | INT     |
| nama           | VARCHAR |
| alamat         | VARCHAR |
| no_hp          | VARCHAR |
| tanggal_daftar | DATE    |

### Tabel buku

| Field        | Tipe    |
| ------------ | ------- |
| id_buku      | INT     |
| judul        | VARCHAR |
| penulis      | VARCHAR |
| penerbit     | VARCHAR |
| tahun_terbit | YEAR    |
| stok         | INT     |

### Tabel peminjaman

| Field           | Tipe    |
| --------------- | ------- |
| id_peminjaman   | INT     |
| id_anggota      | INT     |
| id_buku         | INT     |
| tanggal_pinjam  | DATE    |
| tanggal_kembali | DATE    |
| status          | VARCHAR |

### Relasi

```text
anggota (1)
    |
    | id_anggota
    |
    v
peminjaman
    ^
    |
    | id_buku
    |
buku (1)
```

---

## Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/jaya-teknologi-intermedia/crud-perpustakaan-andika.git
```

### 2. Pindahkan ke Folder Laragon

```text
C:\laragon\www\
```

### 3. Import Database

```text
database/perpustakaan.sql
```

### 4. Jalankan Laragon

Pastikan Apache dan MySQL berjalan.

### 5. Buka Browser

```text
http://localhost/crud_perpustakaan
```

atau

```text
http://localhost:8080/crud_perpustakaan
```

sesuai konfigurasi Laragon.

---

## Struktur Project

```text
crud_perpustakaan
│
├── login.php
├── logout.php
├── index.php
│
├── buku.php
├── tambah.php
├── edit.php
├── hapus.php
│
├── anggota.php
├── tambah_anggota.php
├── edit_anggota.php
├── hapus_anggota.php
│
├── peminjaman.php
├── tambah_peminjaman.php
├── riwayat.php
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

Tambahkan screenshot berikut pada folder:

```text
screenshots/
```

* Login
* Dashboard
* Data Buku
* Tambah Buku
* Edit Buku
* Data Anggota
* Tambah Anggota
* Edit Anggota
* Data Peminjaman
* Tambah Peminjaman
* Riwayat Peminjaman
* Logout

---

## Pengembang

Dibuat sebagai tugas pengembangan aplikasi Sistem Perpustakaan menggunakan PHP Native dan MySQL pada program magang / PKL di Jaya Teknologi Intermedia.
