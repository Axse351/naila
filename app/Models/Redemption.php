<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Redemption extends Model
{
    use HasFactory;

    /**
     * Kebutuhan poin per jenis promo.
     */
    public const POIN_REQUIRED = [
        'reguler' => 100,
        'b5g1' => 50,
        'couple' => 20,
    ];

    protected $fillable = [
        'user_id',
        'product_id',
        'jenis_promo',
        'poin_dipakai',
        'status',
        'catatan',
        'diproses_oleh',
        'diproses_at',
    ];

    protected $casts = [
        'poin_dipakai' => 'integer',
        'diproses_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function processor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diproses_oleh');
    }

    public static function labelPromo(string $jenis): string
    {
        return match ($jenis) {
            'reguler' => 'Tukar 100 Poin',
            'b5g1' => 'Promo Beli 5 Gratis 1',
            'couple' => 'Promo Pasangan',
            default => $jenis,
        };
    }
}
