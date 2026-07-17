<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'slug',
        'kategori',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'status',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    /**
     * Generate slug otomatis dari nama produk.
     */
    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            $product->slug = Str::slug($product->nama_produk) . '-' . uniqid();
        });

        static::updating(function (Product $product) {
            if ($product->isDirty('nama_produk')) {
                $product->slug = Str::slug($product->nama_produk) . '-' . uniqid();
            }
        });
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}
