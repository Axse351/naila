<?php

// =========================================================================
// PENTING - BACA DULU
// =========================================================================
// File ini HANYA untuk kamu yang project-nya SUDAH pernah migrate tabel
// `orders` versi lama (status masih enum, belum ada kolom order_type).
//
// Kalau kamu migrate dari NOL (database baru / fresh migrate), JANGAN pakai
// file ini. Cukup pakai migration:
//   2024_01_01_000004_create_orders_table.php
// yang sudah lengkap (status string + order_type).
//
// Kalau tabel `orders` SUDAH ada di database kamu:
// 1. Pindahkan file ini keluar dari folder PAKAI_JIKA_SUDAH_MIGRATE ke
//    database/migrations langsung.
// 2. Jalankan: php artisan migrate
// =========================================================================

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah kolom status dari enum -> varchar biar fleksibel
        DB::statement("ALTER TABLE orders MODIFY status VARCHAR(50) NOT NULL DEFAULT 'pending'");

        // Tambah kolom order_type kalau belum ada
        if (! Schema::hasColumn('orders', 'order_type')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->enum('order_type', ['dine_in', 'pick_up'])->default('pick_up')->after('user_id');
            });
        }
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE orders MODIFY status ENUM('pending', 'paid', 'batal') NOT NULL DEFAULT 'pending'");

        if (Schema::hasColumn('orders', 'order_type')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('order_type');
            });
        }
    }
};
