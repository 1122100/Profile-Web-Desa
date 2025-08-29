<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">Daftar Lembaga di Desa</h3>
                        <a href="{{ route('admin.lembaga.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah Lembaga</a>
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
                                    <th class="py-3 px-4 text-left">Nama Lembaga</th>
                                    <th class="py-3 px-4 text-left">Jenis Lembaga</th>
                                    <th class="py-3 px-4 text-left">Tahun Berdiri</th>
                                    <th class="py-3 px-4 text-left">Alamat Detail</th>
                                    <th class="py-3 px-4 text-left">Dusun</th>
                                    <th class="py-3 px-4 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($lembagas as $lembaga)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                        <td class="py-3 px-4">{{ $lembaga->nama_lembaga }}</td>
                                        <td class="py-3 px-4">{{ $lembaga->jenis_lembaga }}</td>
                                        <td class="py-3 px-4">{{ $lembaga->tahun_berdiri }}</td>
                                        <td class="py-3 px-4">{{ $lembaga->alamat_detail }}</td>
                                        <td class="py-3 px-4">{{ $lembaga->dusun->nama ?? '-' }}</td>
                                        <td class="py-3 px-4 flex space-x-2">
                                            <a href="{{ route('admin.lembaga.show', $lembaga->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Detail</a>
                                            <a href="{{ route('admin.lembaga.edit', $lembaga->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('admin.lembaga.destroy', $lembaga->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lembaga ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        {{-- Adjust colspan to match the new number of columns --}}
                                        <td colspan="7" class="py-4 px-4 text-center text-gray-500">Tidak ada data lembaga.</td>
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
