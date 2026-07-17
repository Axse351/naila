<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pesanan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">

                <div>
                    <span class="text-sm text-gray-500">No. Invoice</span>
                    <p class="text-lg font-semibold text-gray-800">{{ $order->invoice_number }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Pemesan</span>
                    <p class="text-gray-800">{{ $order->user->name }} ({{ $order->user->email }})</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Detail Produk</span>
                    <table class="min-w-full text-sm mt-2">
                        <thead>
                            <tr class="text-left text-gray-500">
                                <th class="py-1">Produk</th>
                                <th class="py-1">Qty</th>
                                <th class="py-1">Harga</th>
                                <th class="py-1">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td class="py-1">{{ $item->nama_produk }}</td>
                                    <td class="py-1">{{ $item->qty }}</td>
                                    <td class="py-1">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td class="py-1">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Total</span>
                    <p class="text-2xl font-bold text-green-700">
                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                    </p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Status</span>
                    <p class="text-gray-800 capitalize">{{ str_replace('_', ' ', $order->status) }}</p>
                </div>

                @if ($order->status === 'menunggu_konfirmasi')
                    <div class="flex gap-3 pt-4">
                        <form action="{{ route('admin.orders.approve', $order) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-green-700 hover:bg-green-800 text-white text-sm font-medium px-4 py-2 rounded-md">
                                ACC Pembayaran
                            </button>
                        </form>
                        <form action="{{ route('admin.orders.reject', $order) }}" method="POST"
                            onsubmit="return confirm('Yakin tolak pesanan ini?');">
                            @csrf
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-md">
                                Tolak
                            </button>
                        </form>
                    </div>
                @endif

                <div class="pt-4">
                    <a href="{{ route('admin.orders.index') }}"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900">
                        &larr; Kembali ke daftar pesanan
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
