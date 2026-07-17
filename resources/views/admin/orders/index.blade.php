<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Pesanan
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
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Invoice</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">User</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Total</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Status</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Tanggal</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="px-4 py-3 font-medium text-gray-800">
                                        {{ $order->invoice_number }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $order->user->name }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($order->status === 'paid')
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">Selesai</span>
                                        @elseif ($order->status === 'menunggu_konfirmasi')
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">Menunggu
                                                Konfirmasi</span>
                                        @elseif ($order->status === 'ditolak')
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">Ditolak</span>
                                        @else
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-600 rounded-full">Belum
                                                Bayar</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $order->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-4 py-3 text-right whitespace-nowrap">
                                        <a href="{{ route('admin.orders.show', $order) }}"
                                            class="text-blue-600 hover:underline text-sm font-medium">
                                            Detail
                                        </a>

                                        @if ($order->status === 'menunggu_konfirmasi')
                                            <form action="{{ route('admin.orders.approve', $order) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="text-green-600 hover:underline text-sm font-medium ms-3">
                                                    ACC
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.orders.reject', $order) }}" method="POST"
                                                class="inline" onsubmit="return confirm('Yakin tolak pesanan ini?');">
                                                @csrf
                                                <button type="submit"
                                                    class="text-red-600 hover:underline text-sm font-medium ms-3">
                                                    Tolak
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada pesanan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
