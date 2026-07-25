<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Penukaran Poin
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 bg-red-100 text-red-800 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">User</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Jenis Promo</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Produk Diminta</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Poin Dipakai</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Status</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Tanggal</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($redemptions as $redemption)
                                <tr>
                                    <td class="px-4 py-3 font-medium text-gray-800">
                                        {{ $redemption->user->name }}
                                        <div class="text-xs text-gray-400">
                                            Sisa poin: {{ $redemption->user->point }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ \App\Models\Redemption::labelPromo($redemption->jenis_promo) }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $redemption->product->nama_produk ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $redemption->poin_dipakai }} poin
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($redemption->status === 'menunggu')
                                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">
                                                Menunggu
                                            </span>
                                        @elseif ($redemption->status === 'disetujui')
                                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                                Disetujui
                                            </span>
                                        @else
                                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-500 whitespace-nowrap">
                                        {{ $redemption->created_at->format('d M Y, H:i') }}
                                    </td>
                                    <td class="px-4 py-3 text-right whitespace-nowrap">
                                        @if ($redemption->status === 'menunggu')
                                            <form action="{{ route('admin.redemptions.approve', $redemption) }}" method="POST" class="inline"
                                                onsubmit="return confirm('Setujui penukaran poin ini? Poin user akan langsung dipotong.');">
                                                @csrf
                                                <button type="submit" class="text-green-600 hover:underline text-sm font-medium">
                                                    Setujui
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.redemptions.reject', $redemption) }}" method="POST" class="inline"
                                                onsubmit="return confirm('Tolak permintaan ini?');">
                                                @csrf
                                                <button type="submit" class="text-red-600 hover:underline text-sm font-medium ms-3">
                                                    Tolak
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-xs text-gray-400">
                                                Diproses oleh {{ $redemption->processor->name ?? '-' }}
                                                <br>
                                                {{ $redemption->diproses_at?->format('d M Y, H:i') }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada permintaan penukaran poin.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $redemptions->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
