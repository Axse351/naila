<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redemption;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RedemptionController extends Controller
{
    public function index(): View
    {
        $redemptions = Redemption::with('user', 'product')
            ->latest()
            ->paginate(10);

        return view('admin.redemptions.index', compact('redemptions'));
    }

    /**
     * Admin ACC -> poin user dipotong, status jadi disetujui.
     * Cek ulang saldo poin saat approve (jaga-jaga poin sudah kepakai di request lain).
     */
    public function approve(Redemption $redemption): RedirectResponse
    {
        if ($redemption->status !== 'menunggu') {
            return redirect()
                ->route('admin.redemptions.index')
                ->with('error', 'Permintaan ini sudah diproses sebelumnya.');
        }

        if ($redemption->user->point < $redemption->poin_dipakai) {
            return redirect()
                ->route('admin.redemptions.index')
                ->with('error', 'Poin user sudah tidak mencukupi, permintaan tidak bisa disetujui.');
        }

        DB::transaction(function () use ($redemption) {
            $redemption->user->decrement('point', $redemption->poin_dipakai);

            $redemption->update([
                'status' => 'disetujui',
                'diproses_oleh' => auth()->id(),
                'diproses_at' => now(),
            ]);
        });

        return redirect()
            ->route('admin.redemptions.index')
            ->with('success', 'Penukaran poin disetujui, poin user sudah dipotong.');
    }

    public function reject(Redemption $redemption): RedirectResponse
    {
        if ($redemption->status !== 'menunggu') {
            return redirect()
                ->route('admin.redemptions.index')
                ->with('error', 'Permintaan ini sudah diproses sebelumnya.');
        }

        $redemption->update([
            'status' => 'ditolak',
            'diproses_oleh' => auth()->id(),
            'diproses_at' => now(),
        ]);

        return redirect()
            ->route('admin.redemptions.index')
            ->with('success', 'Permintaan penukaran poin ditolak.');
    }
}
