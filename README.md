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

Code CRUD utamanya ada di sini:

Controller CRUD: Gambar.php
Model database: Gambar_model.php
View daftar: index.php
View tambah/edit: form.php
View detail: detail.php
Route URL: routes.php
Koneksi database: database.php
Yang paling penting untuk CRUD adalah application/controllers/Gambar.php.

Mapping fungsi CRUD-nya:

index() = Read / tampilkan semua gambar
tambah() = halaman form tambah
simpan() = Create / simpan gambar baru
detail($id) = Read detail
edit($id) = halaman form edit
update($id) = Update data gambar
hapus($id) = Delete gambar
Model Gambar_model.php berisi query database:

all()
find($id)
insert($data)
update($id, $data)
delete($id)

Code CRUD utamanya ada di sini:

Controller CRUD: Gambar.php
Model database: Gambar_model.php
View daftar: index.php
View tambah/edit: form.php
View detail: detail.php
Route URL: routes.php
Koneksi database: database.php
Yang paling penting untuk CRUD adalah application/controllers/Gambar.php.

Mapping fungsi CRUD-nya:

index() = Read / tampilkan semua gambar
tambah() = halaman form tambah
simpan() = Create / simpan gambar baru
detail($id) = Read detail
edit($id) = halaman form edit
update($id) = Update data gambar
hapus($id) = Delete gambar
Model Gambar_model.php berisi query database:

all()
find($id)
insert($data)
update($id, $data)
delete($id)
