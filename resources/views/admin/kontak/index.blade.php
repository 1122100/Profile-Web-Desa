<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pesan Kontak') }}
            </h2>
            <span class="mt-2 md:mt-0 text-sm text-gray-600">
                Total: <span class="font-medium">{{ $kontak->total() }}</span> pesan
            </span>
        </div>
    </x-slot>

    <div class="py-6 md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="mb-6 bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 md:p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form method="GET" action="{{ route('admin.kontak.index') }}" class="flex-1">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="search" placeholder="Cari nama, email, atau isi pesan..." value="{{ request('search') }}"
                                    class="pl-10 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
                            </div>
                        </form>

                        <div class="flex items-center gap-2">
                            <div class="relative">
                                <select onchange="window.location.href=this.value"
                                    class="appearance-none pl-3 pr-10 py-2 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
                                    <option value="{{ route('admin.kontak.index', ['status' => 'all']) }}" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Pesan</option>
                                    <option value="{{ route('admin.kontak.index', ['status' => 'unread']) }}" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                                    <option value="{{ route('admin.kontak.index', ['status' => 'read']) }}" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-lg shadow-sm overflow-hidden transition-all duration-500 ease-in-out"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                    <div class="p-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-green-700">{{ session('success') }}</span>
                        </div>
                        <button @click="show = false" class="text-green-500 hover:text-green-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Messages Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Subjek</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pesan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Tanggal</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($kontak as $message)
                                <tr class="{{ $message->is_read ? '' : 'bg-blue-50' }} hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                                <span class="text-indigo-700 font-medium text-sm">{{ strtoupper(substr($message->nama, 0, 2)) }}</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $message->nama }}</div>
                                                <div class="text-sm text-gray-500">{{ $message->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                        <div class="text-sm text-gray-900">{{ $message->subject ?: 'Tidak ada subjek' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 line-clamp-2">{{ $message->message }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                        <div class="text-sm text-gray-500">{{ $message->created_at->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-400">{{ $message->created_at->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($message->is_read)
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Dibaca
                                            </span>
                                        @else
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Belum Dibaca
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('admin.kontak.show', $message->id) }}" class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200" title="Lihat Detail">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>

                                            @if(!$message->is_read)
                                                <form method="POST" action="{{ route('admin.kontak.mark-as-read', $message->id) }}" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-green-600 hover:text-green-900 transition-colors duration-200" title="Tandai Sudah Dibaca">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif

                                            <form method="POST" action="{{ route('admin.kontak.destroy', $message->id) }}" class="inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200" title="Hapus Pesan">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-gray-500 text-lg font-medium mb-1">Belum ada pesan</p>
                                            <p class="text-gray-400 text-sm">Pesan kontak dari pengunjung website akan muncul di sini</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($kontak->hasPages())
                <div class="mt-6">
                    {{ $kontak->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>