# CRUD Gambar

Project ini adalah aplikasi sederhana untuk mengelola data gambar menggunakan CodeIgniter.

## Cara Menjalankan

```powershell
cd C:\Sismul2
C:\xampp\php\php.exe -S localhost:8080 index.php
```

Buka alamat berikut di browser:

```text
http://localhost:8080/gambar
```

## Fitur

- Menampilkan daftar gambar
- Menambahkan gambar baru
- Melihat detail gambar
- Mengubah data gambar
- Menghapus gambar

## Penyimpanan

- Database tersimpan di `application/database/sismul2.sqlite`
- File gambar tersimpan di `uploads/gambar`

## Lokasi Code CRUD

Code CRUD utamanya ada di sini:

- Controller CRUD: `application/controllers/Gambar.php`
- Model database: `application/models/Gambar_model.php`
- View daftar: `application/views/gambar/index.php`
- View tambah/edit: `application/views/gambar/form.php`
- View detail: `application/views/gambar/detail.php`
- Route URL: `application/config/routes.php`
- Koneksi database: `application/config/database.php`

Yang paling penting untuk CRUD adalah `application/controllers/Gambar.php`.

## Mapping Fungsi CRUD

- `index()` = Read / tampilkan semua gambar
- `tambah()` = halaman form tambah
- `simpan()` = Create / simpan gambar baru
- `detail($id)` = Read detail
- `edit($id)` = halaman form edit
- `update($id)` = Update data gambar
- `hapus($id)` = Delete gambar

## Query Model

Model `Gambar_model.php` berisi query database:

- `all()`
- `find($id)`
- `insert($data)`
- `update($id, $data)`
- `delete($id)`
