<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <form method="GET" action="{{ route('admin.products.index') }}" class="flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama produk..."
                            class="border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 text-sm">
                        <button type="submit"
                            class="bg-gray-700 hover:bg-gray-800 text-white text-sm font-medium px-4 py-2 rounded-md">
                            Cari
                        </button>
                    </form>

                    <a href="{{ route('admin.products.create') }}"
                        class="bg-green-700 hover:bg-green-800 text-white text-sm font-medium px-4 py-2 rounded-md text-center">
                        + Tambah Produk
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Gambar</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Nama Produk</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Kategori</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Harga</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Stok</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Status</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($products as $product)
                                <tr>
                                    <td class="px-4 py-3">
                                        @if ($product->gambar)
                                            <img src="{{ asset('storage/' . $product->gambar) }}"
                                                alt="{{ $product->nama_produk }}"
                                                class="w-14 h-14 object-cover rounded-md">
                                        @else
                                            <div
                                                class="w-14 h-14 bg-gray-100 rounded-md flex items-center justify-center text-gray-400 text-xs">
                                                No Image
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-800">
                                        {{ $product->nama_produk }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $product->kategori ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $product->stok }}
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($product->status === 'aktif')
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                                Aktif
                                            </span>
                                        @else
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-600 rounded-full">
                                                Nonaktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-right whitespace-nowrap">
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                            class="text-blue-600 hover:underline text-sm font-medium">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:underline text-sm font-medium ms-3">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada produk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
