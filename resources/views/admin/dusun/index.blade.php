<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">Daftar Dusun di Desa</h3>
                        <a href="{{ route('admin.dusun.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah Dusun</a>
                    </div>

                    @if ($message = Session::get('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left">No</th>
                                    <th class="py-3 px-4 text-left">Nama Dusun</th>
                                    <th class="py-3 px-4 text-left">Kepala Dusun</th>
                                    <th class="py-3 px-4 text-left">Jumlah Penduduk</th>
                                    <th class="py-3 px-4 text-left">Luas Wilayah (ha)</th>
                                    <th class="py-3 px-4 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dusuns as $dusun)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4">{{ $dusun->nama }}</td>
                                    <td class="py-3 px-4">{{ $dusun->kepala_dusun }}</td>
                                    <td class="py-3 px-4">{{ $dusun->jumlah_penduduk }}</td>
                                    <td class="py-3 px-4">{{ $dusun->luas_wilayah }}</td>
                                    <td class="py-3 px-4 flex space-x-2">
                                        <a href="{{ route('admin.dusun.show', $dusun->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Detail</a>
                                        <a href="{{ route('admin.dusun.edit', $dusun->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                        <form action="{{ route('admin.dusun.destroy', $dusun->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dusun ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="py-3 px-4 text-center">Tidak ada data dusun!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>