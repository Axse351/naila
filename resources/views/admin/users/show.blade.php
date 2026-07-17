<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">

                <div>
                    <span class="text-sm text-gray-500">Nama</span>
                    <p class="text-lg font-semibold text-gray-800">{{ $user->name }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Email</span>
                    <p class="text-gray-800">{{ $user->email }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">No HP</span>
                    <p class="text-gray-800">{{ $user->no_hp ?? '-' }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Role</span>
                    <p class="text-gray-800 capitalize">{{ $user->role }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Total Point</span>
                    <p class="text-3xl font-bold text-green-700">{{ number_format($user->point) }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Bergabung sejak</span>
                    <p class="text-gray-800">{{ $user->created_at->translatedFormat('d F Y') }}</p>
                </div>

                <div class="pt-4">
                    <a href="{{ route('admin.users.index') }}"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900">
                        &larr; Kembali ke daftar user
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
