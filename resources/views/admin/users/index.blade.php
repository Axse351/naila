<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola User
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

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-wrap gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama/email..."
                            class="border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 text-sm">
                        <select name="role"
                            class="border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 text-sm">
                            <option value="">Semua Role</option>
                            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        <button type="submit"
                            class="bg-gray-700 hover:bg-gray-800 text-white text-sm font-medium px-4 py-2 rounded-md">
                            Cari
                        </button>
                    </form>

                    <a href="{{ route('admin.users.create') }}"
                        class="bg-green-700 hover:bg-green-800 text-white text-sm font-medium px-4 py-2 rounded-md text-center">
                        + Tambah User
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Nama</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Email</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">No HP</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Role</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600">Point</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="px-4 py-3 font-medium text-gray-800">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $user->no_hp ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($user->role === 'admin')
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">
                                                Admin
                                            </span>
                                        @else
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-600 rounded-full">
                                                User
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ number_format($user->point) }}
                                    </td>
                                    <td class="px-4 py-3 text-right whitespace-nowrap">
                                        <a href="{{ route('admin.users.show', $user) }}"
                                            class="text-gray-600 hover:underline text-sm font-medium">
                                            Detail
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="text-blue-600 hover:underline text-sm font-medium ms-3">
                                            Edit
                                        </a>

                                        @if ($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:underline text-sm font-medium ms-3">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada user.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
