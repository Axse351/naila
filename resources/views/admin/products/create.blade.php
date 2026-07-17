<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-5">
                    @csrf

                    <div>
                        <x-input-label for="nama_produk" value="Nama Produk" />
                        <x-text-input id="nama_produk" name="nama_produk" type="text" class="block mt-1 w-full"
                            value="{{ old('nama_produk') }}" required autofocus />
                        <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="kategori" value="Kategori" />
                        <x-text-input id="kategori" name="kategori" type="text" class="block mt-1 w-full"
                            value="{{ old('kategori') }}" placeholder="Contoh: Original, Premium, Toping" />
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="deskripsi" value="Deskripsi" />
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('deskripsi') }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <x-input-label for="harga" value="Harga (Rp)" />
                            <x-text-input id="harga" name="harga" type="number" step="0.01" min="0"
                                class="block mt-1 w-full" value="{{ old('harga') }}" required />
                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="stok" value="Stok" />
                            <x-text-input id="stok" name="stok" type="number" min="0"
                                class="block mt-1 w-full" value="{{ old('stok') }}" required />
                            <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="status" value="Status" />
                        <select id="status" name="status"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            <option value="aktif" {{ old('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif
                            </option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="gambar" value="Gambar Produk" />
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
                            Simpan Produk
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
