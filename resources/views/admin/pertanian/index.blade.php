<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">Daftar Kelompok Tani di Desa</h3>
                        <a href="{{ route('admin.pertanian.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah Kelompok Tani</a>
                    </div>

                    @if ($message = Session::get('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left">No</th>
                                    <th class="py-3 px-4 text-left">Nama Kelompok</th>
                                    <th class="py-3 px-4 text-left">Ketua</th>
                                    <th class="py-3 px-4 text-left">Jenis Tanaman</th>
                                    <th class="py-3 px-4 text-left">Luas Lahan (ha)</th>
                                    <th class="py-3 px-4 text-left">Jumlah Anggota</th>
                                    <th class="py-3 px-4 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pertanians as $pertanian)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4">{{ $pertanian->nama_kelompok }}</td>
                                    <td class="py-3 px-4">{{ $pertanian->ketua }}</td>
                                    <td class="py-3 px-4">{{ $pertanian->jenis_tanaman }}</td>
                                    <td class="py-3 px-4">{{ $pertanian->luas_lahan }}</td>
                                    <td class="py-3 px-4">{{ $pertanian->jumlah_anggota }}</td>
                                    <td class="py-3 px-4 flex space-x-2">
                                        <a href="{{ route('admin.pertanian.show', $pertanian->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Detail</a>
                                        <a href="{{ route('admin.pertanian.edit', $pertanian->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                        <form action="{{ route('admin.pertanian.destroy', $pertanian->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelompok tani ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="py-3 px-4 text-center">Tidak ada data kelompok tani.</td>
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
