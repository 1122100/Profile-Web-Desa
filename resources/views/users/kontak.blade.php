@extends('layouts.public')
@section('content')
    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 md:pt-32 md:pb-24 bg-gradient-to-r from-green-700 to-emerald-600 text-white overflow-hidden min-h-screen">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/30"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                @php
                    $desa = \App\Models\Desa::first();
                @endphp

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6" data-aos="fade-up">
                    Hubungi Kami
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mb-8" data-aos="fade-up" data-aos-delay="100">
                    Silakan hubungi kami untuk informasi lebih lanjut tentang {{ $desa->nama ?? 'Desa Dukuh Agung' }}
                </p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto">
                <path fill="#f9fafb" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Alamat</h3>
                        <p class="text-gray-600">
                            {{ $desa->alamat ?? 'Jl. Desa No. 123' }}<br>
                            {{ $desa->kecamatan ?? 'Kecamatan' }}, {{ $desa->kabupaten ?? 'Kabupaten' }}<br>
                            {{ $desa->provinsi ?? 'Provinsi' }} {{ $desa->kode_pos ?? '' }}
                        </p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Telepon</h3>
                        <p class="text-gray-600">{{ $desa->telepon ?? '082141051597' }}</p>
                        <p class="text-gray-600 mt-2">Jam Operasional:<br>Senin - Jumat, 08:00 - 16:00</p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Email</h3>
                        <p class="text-gray-600 break-words max-w-full">{{ $desa->email ?? 'info@dukuhagung.desa.id' }}</p>
                        <p class="text-gray-600 mt-2">Kami akan merespon dalam 1-2 hari kerja</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Kirim Pesan</h2>
                    <div class="w-24 h-1 bg-green-600 mx-auto mb-6 rounded"></div>
                    <p class="text-gray-600 max-w-3xl mx-auto">
                        Silakan isi formulir di bawah ini untuk mengirimkan pesan, pertanyaan, atau saran kepada kami. Kami akan merespons secepatnya.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="bg-gray-50 p-8 rounded-xl" data-aos="fade-right">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Formulir Kontak</h3>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                                <strong class="font-bold">Berhasil!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('kontak.store') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('name') border-red-500 @enderror" required value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror" required value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="phone" class="block text-gray-700 mb-2">Nomor Telepon (Opsional)</label>
                                <input type="text" id="phone" name="phone" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('phone') border-red-500 @enderror" value="{{ old('phone') }}">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="subject" class="block text-gray-700 mb-2">Subjek</label>
                                <input type="text" id="subject" name="subject" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('subject') border-red-500 @enderror" required value="{{ old('subject') }}">
                                @error('subject')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                                <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="w-full py-3 px-6 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-medium">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>

                    <div data-aos="fade-left">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Informasi Tambahan</h3>

                        <div class="prose prose-lg max-w-none text-gray-600">
                            <p>
                                Selain melalui formulir kontak ini, Anda juga dapat menghubungi kami dengan cara:
                            </p>

                            <ul class="space-y-4 mt-4">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Mengunjungi kantor desa pada jam kerja (Senin-Jumat, 08:00-16:00)</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Menghubungi nomor telepon kantor desa</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Mengirimkan email ke alamat email resmi desa</span>
                                </li>
                            </ul>

                            <p class="mt-6">
                                Untuk pertanyaan seputar:
                            </p>

                            <ul class="space-y-2 mt-4">
                                <li>• Administrasi kependudukan</li>
                                <li>• Perizinan</li>
                                <li>• Program desa</li>
                                <li>• Bantuan sosial</li>
                                <li>• Kegiatan desa</li>
                                <li>• Dan lain-lain</li>
                            </ul>

                            <p class="mt-6">
                                Kami akan berusaha merespons setiap pertanyaan dan permintaan Anda secepatnya. Terima kasih atas perhatian dan partisipasi Anda dalam pembangunan {{ $desa->nama ?? 'Desa Dukuh Agung' }}.
                            </p>
                        </div>

                        <div class="mt-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Jam Pelayanan</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Senin - Kamis</span>
                                    <span class="text-gray-800 font-medium">08:00 - 16:00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumat</span>
                                    <span class="text-gray-800 font-medium">08:00 - 11:30, 13:00 - 16:00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sabtu - Minggu</span>
                                    <span class="text-gray-800 font-medium">Tutup</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Pertanyaan Umum</h2>
                    <div class="w-24 h-1 bg-green-600 mx-auto mb-6 rounded"></div>
                    <p class="text-gray-600 max-w-3xl mx-auto">
                        Berikut adalah beberapa pertanyaan yang sering diajukan tentang pelayanan di {{ $desa->nama ?? 'Desa Dukuh Agung' }}.
                    </p>
                </div>

                <div class="space-y-6" data-aos="fade-up">
                    <div class="bg-gray-50 rounded-xl overflow-hidden">
                        <button class="faq-btn w-full flex items-center justify-between p-6 text-left focus:outline-none">
                            <span class="text-lg font-medium text-gray-800">Bagaimana cara mengurus surat pengantar dari desa?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="faq-icon h-6 w-6 text-green-600 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">
                                Untuk mengurus surat pengantar dari desa, Anda perlu:
                            </p>
                            <ol class="list-decimal list-inside mt-2 space-y-1 text-gray-600">
                                <li>Datang ke kantor desa dengan membawa KTP dan Kartu Keluarga asli</li>
                                <li>Mengisi formulir permohonan yang tersedia</li>
                                <li>Menyebutkan keperluan pembuatan surat pengantar</li>
                                <li>Menunggu proses pembuatan surat (biasanya 1-2 jam)</li>
                                <li>Surat pengantar akan ditandatangani oleh Kepala Desa atau petugas yang berwenang</li>
                            </ol>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl overflow-hidden">
                        <button class="faq-btn w-full flex items-center justify-between p-6 text-left focus:outline-none">
                            <span class="text-lg font-medium text-gray-800">Apa saja dokumen yang diperlukan untuk mengurus KTP?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="faq-icon h-6 w-6 text-green-600 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">
                                Dokumen yang diperlukan untuk mengurus KTP adalah:
                            </p>
                            <ul class="list-disc list-inside mt-2 space-y-1 text-gray-600">
                                <li>Kartu Keluarga (KK) asli</li>
                                <li>Surat pengantar dari RT/RW</li>
                                <li>Fotokopi akta kelahiran</li>
                                <li>Pas foto berwarna ukuran 3x4 sebanyak 2 lembar</li>
                                <li>KTP lama (jika perpanjangan)</li>
                                <li>Surat keterangan pindah dari daerah asal (jika pindah domisili)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl overflow-hidden">
                        <button class="faq-btn w-full flex items-center justify-between p-6 text-left focus:outline-none">
                            <span class="text-lg font-medium text-gray-800">Bagaimana prosedur untuk mendapatkan bantuan sosial dari desa?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="faq-icon h-6 w-6 text-green-600 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">
                                Prosedur untuk mendapatkan bantuan sosial dari desa:
                            </p>
                            <ol class="list-decimal list-inside mt-2 space-y-1 text-gray-600">
                                <li>Pastikan Anda terdaftar sebagai warga desa</li>
                                <li>Hubungi RT/RW setempat untuk mendapatkan surat keterangan tidak mampu</li>
                                <li>Bawa surat tersebut beserta KTP dan KK ke kantor desa</li>
                                <li>Isi formulir permohonan bantuan sosial</li>
                                <li>Petugas desa akan melakukan verifikasi dan survei</li>
                                <li>Jika memenuhi syarat, nama Anda akan dimasukkan dalam daftar penerima bantuan</li>
                                <li>Pemberitahuan akan disampaikan melalui RT/RW atau pengumuman di kantor desa</li>
                            </ol>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl overflow-hidden">
                        <button class="faq-btn w-full flex items-center justify-between p-6 text-left focus:outline-none">
                            <span class="text-lg font-medium text-gray-800">Bagaimana cara mengajukan proposal kegiatan ke desa?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="faq-icon h-6 w-6 text-green-600 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">
                                Untuk mengajukan proposal kegiatan ke desa:
                            </p>
                            <ol class="list-decimal list-inside mt-2 space-y-1 text-gray-600">
                                <li>Buat proposal kegiatan yang jelas dan terperinci</li>
                                <li>Sertakan latar belakang, tujuan, manfaat, anggaran, dan jadwal kegiatan</li>
                                <li>Dapatkan rekomendasi dari RT/RW setempat</li>
                                <li>Ajukan proposal ke sekretariat desa</li>
                                <li>Proposal akan dibahas dalam musyawarah desa atau rapat perangkat desa</li>
                                <li>Keputusan akan disampaikan secara tertulis</li>
                            </ol>
                            <p class="mt-2 text-gray-600">
                                Sebaiknya proposal diajukan minimal 1 bulan sebelum pelaksanaan kegiatan untuk memberikan waktu proses yang cukup.
                            </p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl overflow-hidden">
                        <button class="faq-btn w-full flex items-center justify-between p-6 text-left focus:outline-none">
                            <span class="text-lg font-medium text-gray-800">Apa saja program pemberdayaan masyarakat yang ada di desa?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="faq-icon h-6 w-6 text-green-600 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">
                                Program pemberdayaan masyarakat yang ada di desa antara lain:
                            </p
                            <ul class="list-disc list-inside mt-2 space-y-1 text-gray-600">
                                <li>Program Pemberdayaan Masyarakat Desa (PPMD)</li>
                                <li>Kelompok Wanita Tani (KWT)</li>
                                <li>Badan Usaha Milik Desa (BUMDes)</li>
                                <li>Kelompok Sadar Wisata (Pokdarwis)</li>
                                <li>Pelatihan keterampilan dan wirausaha</li>
                                <li>Program pengembangan UMKM</li>
                            </ul>
                            <p class="mt-2 text-gray-600">
                                Untuk informasi lebih lanjut tentang program-program tersebut, silakan hubungi kantor desa atau kunjungi halaman Informasi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for FAQ Accordion -->
    @push('scripts')
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqButtons = document.querySelectorAll('.faq-btn');

            faqButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('.faq-icon');

                    // Toggle content visibility
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                    } else {
                        content.classList.add('hidden');
                        icon.classList.remove('rotate-180');
                    }
                });
            });
        });
    </script>
    @endpush
@endsection