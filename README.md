# Rockpukat - Paket Update Lengkap

Paket ini berisi SEMUA file yang perlu ditambah/diganti sesuai revisi yang
sudah dibahas. Struktur folder di dalam zip ini SAMA PERSIS dengan struktur
project Laravel kamu — tinggal salin foldernya ke project, timpa (overwrite)
file yang sudah ada.

---

## 0. Backup dulu (WAJIB)

Sebelum menimpa apapun, backup database dan folder project kamu (misal zip
manual folder project, atau `git commit` kalau pakai git).

```bash
# kalau pakai git, paling aman:
git add -A
git commit -m "backup sebelum update rockpukat"
```

---

## 1. Salin file migration

Salin semua file di `database/migrations/` (yang di luar folder
`PAKAI_JIKA_SUDAH_MIGRATE`) ke `database/migrations/` project kamu.

**Pilih salah satu skenario di bawah ini:**

### Skenario A — Database masih kosong / mau migrate fresh
Langsung pakai migration `2024_01_01_000004_create_orders_table.php` yang
sudah lengkap (kolom `status` sudah string, `order_type` sudah ada).
**Jangan** salin file di folder `PAKAI_JIKA_SUDAH_MIGRATE`.

```bash
php artisan migrate:fresh
```

### Skenario B — Database sudah ada, tabel `orders` sudah pernah dibuat
Salin file di `database/migrations/PAKAI_JIKA_SUDAH_MIGRATE/` keluar ke
`database/migrations/` biasa (sejajar dengan migration lain), lalu:

```bash
php artisan migrate
```

Ini akan menambahkan kolom `order_type` dan mengubah `status` jadi lebih
fleksibel tanpa menghapus data yang sudah ada.

---

## 2. Salin Models

Salin isi folder `app/Models/` ke `app/Models/` project kamu:
- `User.php` (tambahan: `role`, `no_hp`, `point` di fillable, method `isAdmin()`)
- `Product.php`
- `Order.php` (tambahan: `order_type` di fillable)
- `OrderItem.php`

> Kalau model kamu sudah punya isi custom lain (misal accessor tambahan),
> jangan ditimpa mentah-mentah — cukup tambahkan bagian yang belum ada
> (terutama method `isAdmin()` di `User.php`, karena dipakai di navbar).

---

## 3. Salin Controllers

Salin isi folder `app/Http/Controllers/` (termasuk subfolder `Admin/`) ke
lokasi yang sama di project kamu. Yang berubah isinya:
- `app/Http/Controllers/Admin/OrderController.php` → perhitungan poin
  diperbaiki jadi **qty produk x 10 poin** (bukan dari nominal rupiah)
- `app/Http/Controllers/KatalogController.php` → method `pesan()` yang tidak
  terpakai dihapus
- `app/Http/Controllers/OrderController.php` → ditambah method `pembayaran()`
  (multi metode bayar), `order_type` di `store()`, dan `confirm()` menerima
  pilihan metode bayar dari user

---

## 4. Salin routes/web.php

Timpa `routes/web.php` project kamu dengan file di paket ini. Perubahan:
- Route `pesanan.qris` diganti jadi `pesanan.pembayaran`
- Route redundant `KatalogController::pesan` dihapus

---

## 5. Salin Views

Salin semua file di `resources/views/` pada paket ini ke lokasi yang sama:

| File | Keterangan |
|---|---|
| `layouts/navigation.blade.php` | Navbar admin: "Profile"/"Log Out" → "Profil"/"Keluar" |
| `profile/edit.blade.php` | Kartu poin + progress bar + S&K poin |
| `user/app.blade.php` | Homepage: profil UMKM, promo (foto benar + keterangan syarat), info (S&K poin, benefit daftar akun, lokasi/WA/sosmed nyambung) |
| `user/katalog.blade.php` | Tidak berubah fungsinya, disertakan lengkap |
| `user/layouts/header.blade.php` | Menu aktif dinamis, teks "Masuk"/"Daftar"/"Keluar" |
| `user/layouts/footer.blade.php` | Tidak berubah |
| `user/pesan/create.blade.php` | Tambahan pilihan Dine In / Pick Up |
| `user/pesan/checkout.blade.php` | Tombol → "Lanjutkan ke Pembayaran", poin dari qty x10 |
| `user/pesan/pembayaran.blade.php` | **File baru**, menggantikan `qris.blade.php`. Berisi 4 metode bayar |
| `user/pesan/index.blade.php` | Riwayat pesanan, tambahan info order_type |
| `user/pesan/selesai.blade.php` | Versi rekomendasi (isi aslinya belum sempat dikirim — cek & sesuaikan dulu sebelum menimpa punyamu) |

> **Hapus** file lama `resources/views/user/pesan/qris.blade.php` setelah
> memastikan `pembayaran.blade.php` yang baru sudah jalan (supaya tidak ada
> file nyasar).

### Gambar yang perlu kamu siapkan sendiri:
Taruh di `public/assets_user/images/`:
- `buy1get1.png` — sudah ada
- `buy5get1.png` — sudah ada
- `promo-couple.png` — **baru**, pakai foto promo couple yang benar arahnya
  (yang sebelumnya kebalik)
- `qris.png` — pastikan ini barcode QRIS asli Rockpukat

---

## 6. Tambahkan CSS

Buka `public/assets_user/css/custom.css` project kamu, lalu **tempel isi
file `public/assets_user/css/custom-additions.css` (dari paket ini) di
paling bawah** file tersebut. Ini yang menyelesaikan:
- Poin 1: warna menu navbar jadi kuning saat aktif/hover
- Poin 2: judul halaman (Katalog, Profil, dll) tidak kepotong header lagi

```bash
cat public/assets_user/css/custom-additions.css >> public/assets_user/css/custom.css
```

(jalankan command di atas dari root project, setelah file
`custom-additions.css` ditaruh di folder yang sama)

---

## 7. Bersihkan cache & jalankan ulang

```bash
php artisan optimize:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# kalau gambar produk pakai storage disk, pastikan symlink sudah ada:
php artisan storage:link
```

Untuk bagian admin (pakai Vite/Tailwind), jangan lupa build ulang assetnya
kalau sedang development:

```bash
npm run dev
# atau untuk production
npm run build
```

---

## 8. Cek manual (checklist)

- [ ] Buka halaman utama → cek promo (foto sudah benar arahnya + ada keterangan syarat)
- [ ] Klik menu "Katalog" di navbar → warnanya berubah kuning, judul halaman tidak kepotong
- [ ] Buka halaman Profil (harus login) → kartu poin tampil lengkap dengan progress & S&K
- [ ] Pesan 1 produk → pilih Dine In / Pick Up → checkout → tombol "Lanjutkan ke Pembayaran"
- [ ] Di halaman pembayaran → coba pilih QRIS / DANA / Seabank / Tunai
- [ ] Login sebagai admin → ACC pesanan tsb → cek poin user bertambah sesuai qty x 10
- [ ] Halaman Info → cek link Lokasi (harus buka Google Maps), WhatsApp (harus auto-chat ke nomor kamu), Instagram & TikTok (harus buka app/link yang benar)
- [ ] Navbar & tombol login/register semuanya sudah Bahasa Indonesia ("Masuk", "Daftar", "Keluar")

---

## File yang masih perlu kamu konfirmasi

- `user/pesan/selesai.blade.php` — saya belum pernah menerima isi file
  aslinya, jadi versi di paket ini adalah rekomendasi baru. Cek dulu sebelum
  ditimpa, siapa tahu ada logic lain yang perlu dipertahankan.
- Halaman **login.blade.php** dan **register.blade.php** (Breeze) — kalau di
  situ masih ada teks Inggris seperti "Log in" / "Register" / "Email" /
  "Password", kirim isi filenya dan saya terjemahkan sekalian.
