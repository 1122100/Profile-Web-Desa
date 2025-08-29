<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-xl font-bold text-gray-800">Manajemen Desa</h1>
                        <a href="{{ route('admin.desa.create') }}"
                           class="px-4 py-2 bg-green-400 text-white rounded hover:bg-green-700">
                            Tambah Data Desa
                        </a>
                    </div>

                    <!-- Flash Message -->
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 border">No</th>
                                    <th class="px-4 py-2 border">Nama Desa</th>
                                    <th class="px-4 py-2 border">Kepala Desa</th>
                                    <th class="px-4 py-2 border">Kecamatan</th>
                                    <th class="px-4 py-2 border">Kabupaten</th>
                                    <th class="px-4 py-2 border">Provinsi</th>
                                    <th class="px-4 py-2 border">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($desas as $index => $desa)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2">{{ $desa->nama }}</td>
                                        <td class="px-4 py-2">{{ $desa->kepala_desa }}</td>
                                        <td class="px-4 py-2">{{ $desa->kecamatan }}</td>
                                        <td class="px-4 py-2">{{ $desa->kabupaten }}</td>
                                        <td class="px-4 py-2">{{ $desa->provinsi }}</td>
                                        <td class="px-4 py-2 flex space-x-2">
                                            <a href="{{ route('admin.desa.show', $desa->id) }}"
                                               class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                                Detail
                                            </a>
                                            <a href="{{ route('admin.desa.edit', $desa->id) }}"
                                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.desa.destroy', $desa->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-2 text-center border">
                                            Tidak ada data
                                        </td>
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
