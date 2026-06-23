# 📚 CRUD Data Buku Perpustakaan

Aplikasi CRUD (Create, Read, Update, Delete) Data Buku Perpustakaan yang dibuat menggunakan PHP Native, MySQL, HTML, dan Bootstrap.

## 👨‍💻 Teknologi yang Digunakan

- PHP Native
- MySQL
- HTML5
- Bootstrap 5

## ✨ Fitur

- Menampilkan Data Buku
- Menambahkan Data Buku
- Mengubah Data Buku
- Menghapus Data Buku
- Pencarian Buku
- Statistik Total Buku
- Statistik Total Stok

## 🗄️ Database

### Nama Database

```sql
perpustakaan
```

### Tabel

```sql
buku
```

### Struktur Tabel Buku

| Field | Type |
|---------|---------|
| id_buku | INT (PK) |
| judul | VARCHAR(150) |
| penulis | VARCHAR(100) |
| penerbit | VARCHAR(100) |
| tahun_terbit | YEAR |
| stok | INT |

## 🚀 Cara Menjalankan

1. Jalankan Laragon.
2. Aktifkan MySQL dan Nginx.
3. Import database `perpustakaan.sql`.
4. Simpan project pada folder:

```text
C:\laragon\www\crud_perpustakaan
```

5. Buka browser:

```text
http://localhost:8080/crud_perpustakaan
```

## 📸 Screenshot Fitur

### Menampilkan Data Buku
- Screenshot halaman utama.

### Menambahkan Data Buku
- Screenshot form tambah buku.
- Screenshot setelah data berhasil ditambahkan.

### Mengubah Data Buku
- Screenshot form edit buku.
- Screenshot setelah data berhasil diubah.

### Menghapus Data Buku
- Screenshot konfirmasi hapus.
- Screenshot setelah data berhasil dihapus.

## 📋 Diagram Aplikasi

Diagram aplikasi dibuat menggunakan TLDraw sesuai ketentuan tugas.

## 👤 Author

Andika Rizki Saputra

---

Project ini dibuat sebagai tugas CRUD Data Buku Perpustakaan menggunakan PHP Native dan MySQL.
