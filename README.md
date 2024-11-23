# 🚀 CRUD Posts with Laravel

CRUD Posts adalah aplikasi sederhana untuk mengelola data postingan dengan fitur Create, Read, Update, dan Delete (CRUD). Aplikasi ini menggunakan **Laravel Framework** dan dirancang untuk memudahkan pengelolaan postingan dengan gambar.

## ✨ Fitur
- 🔄 **CRUD**: Buat, lihat, edit, dan hapus data postingan.
- 🖼️ **Upload Gambar**: Tambahkan gambar untuk setiap postingan.
- 📋 **Responsif**: Tabel yang responsif dan mudah digunakan di berbagai perangkat.
- 🎉 **Toastr Notifications**: Notifikasi untuk aksi pengguna.
- 🍭 **SweetAlert Confirmation**: Konfirmasi aksi penghapusan dengan SweetAlert.

---

## ⚙️ Teknologi yang Digunakan
- **Laravel 10**
- **Bootstrap 5**
- **Toastr.js**
- **SweetAlert2**

---

## 📥 Cara Instalasi

Ikuti langkah-langkah di bawah untuk menjalankan proyek ini di komputer Anda:

### 1. Clone Repository
```
git clone https://github.com/Abdirizal024/nopalbelajar.git
```
```
cd nopalbelajar
```
### 2. Install Dependencies
```
composer install
```
```
npm install
```
```
npm run build
```
### 3. Konfigurasi File ```.env```
```
cp .env.example .env
```
Buat file ```.env:```
```
cp .env.example .env
```
Edit file .env untuk mengatur koneksi database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=password
```
4. Generate Application Key
```
php artisan key:generate
```
6. Migrasi dan Seed Database
```
php artisan migrate --seed
```
8. Jalankan Aplikasi
```
php artisan serve
```
Akses aplikasi di browser melalui URL: ```http://localhost:8000```

📸 **Screenshot**
Dashboard

Tambah Post

Edit Post

🚦 Fitur CRUD
Tambah Post
Klik tombol Tambah Post di halaman utama.
Isi formulir dengan judul, konten, dan gambar.
Klik Simpan.
Edit Post
Klik tombol Edit di baris postingan.
Ubah data yang diinginkan.
Klik Update.
Hapus Post
Klik tombol Hapus.
Konfirmasi penghapusan menggunakan SweetAlert.
💡 Pengembang
Nama Anda - GitHub
Kontributor - GitHub
🛠️ Masalah dan Kontribusi
Jika menemukan masalah atau ingin berkontribusi:

Buat Issue di GitHub Issues.
Fork repository, lakukan perubahan, dan kirimkan Pull Request.

📝 Lisensi
Proyek ini menggunakan lisensi MIT. Silakan gunakan dan modifikasi sesuai kebutuhan Anda.

⭐ Jangan lupa beri bintang jika proyek ini membantu Anda! ⭐
---

### **Penyesuaian**

1. **Ganti `username` dan `repo-name`** dengan nama pengguna dan nama repository Anda.
2. **Tambahkan screenshot** aplikasi sebenarnya ke dalam proyek, lalu perbarui URL placeholder di bagian **Screenshot** dengan URL gambar Anda.
3. **Perbarui informasi kontak** di bagian **Pengembang**.

Hasilnya adalah README yang profesional, informatif, dan menarik untuk repository GitHub Anda. 🎉
