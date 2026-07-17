<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($product->gambar)
                    <div class="mb-5">
                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}"
                            class="w-32 h-32 object-cover rounded-md">
                    </div>
                @endif

                <form action="{{ route('admin.products.update', $product) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="nama_produk" value="Nama Produk" />
                        <x-text-input id="nama_produk" name="nama_produk" type="text" class="block mt-1 w-full"
                            value="{{ old('nama_produk', $product->nama_produk) }}" required autofocus />
                        <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="kategori" value="Kategori" />
                        <x-text-input id="kategori" name="kategori" type="text" class="block mt-1 w-full"
                            value="{{ old('kategori', $product->kategori) }}"
                            placeholder="Contoh: Original, Premium, Toping" />
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="deskripsi" value="Deskripsi" />
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <x-input-label for="harga" value="Harga (Rp)" />
                            <x-text-input id="harga" name="harga" type="number" step="0.01" min="0"
                                class="block mt-1 w-full" value="{{ old('harga', $product->harga) }}" required />
                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="stok" value="Stok" />
                            <x-text-input id="stok" name="stok" type="number" min="0"
                                class="block mt-1 w-full" value="{{ old('stok', $product->stok) }}" required />
                            <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="status" value="Status" />
                        <select id="status" name="status"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            <option value="aktif" {{ old('status', $product->status) === 'aktif' ? 'selected' : '' }}>
                                Aktif</option>
                            <option value="nonaktif"
                                {{ old('status', $product->status) === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="gambar" value="Ganti Gambar (opsional)" />
                        <input id="gambar" name="gambar" type="file" accept="image/*"
                            class="block mt-1 w-full text-sm text-gray-600
                                      file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0
                                      file:text-sm file:font-medium file:bg-green-50 file:text-green-700
                                      hover:file:bg-green-100">
                        <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4">
                        <a href="{{ route('admin.products.index') }}"
                            class="text-sm font-medium text-gray-600 hover:text-gray-900">
                            Batal
                        </a>
                        <x-primary-button>
                            Update Produk
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
