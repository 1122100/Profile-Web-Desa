# Website Desa Dukuh Agung

<p align="center">
    <img src="https://via.placeholder.com/400x100/4CAF50/white?text=Desa+Dukuh+Agung" alt="Logo Desa Dukuh Agung">
</p>

<p align="center">
<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

## Tentang Website Desa Dukuh Agung

Website Desa Dukuh Agung adalah platform digital yang dirancang untuk meningkatkan transparansi, aksesibilitas informasi, dan pelayanan kepada masyarakat desa. Dibangun dengan framework Laravel yang modern dan elegan, website ini menyediakan berbagai layanan dan informasi yang dibutuhkan warga desa.

Website ini memiliki fitur-fitur utama:

- **Profil Desa** - Informasi lengkap tentang sejarah, visi misi, dan profil Desa Dukuh Agung
- **Informasi Sektoral** - Data dan informasi mengenai pertanian, UMKM, dan lembaga desa
- **Layanan Kontak & Pengaduan** - Portal komunikasi antara masyarakat dan pemerintah desa
- **Portal Berita** - Informasi terkini dan pengumuman penting untuk warga desa
- **Interface yang Responsif** - Dapat diakses dengan mudah melalui desktop dan mobile
- **Dashboard Admin** - Sistem manajemen konten yang user-friendly

## Fitur Utama

### 🏘️ Profil Desa
Menampilkan informasi komprehensif tentang Desa Dukuh Agung termasuk sejarah, geografis, demografi, struktur organisasi, dan visi misi pembangunan desa.

### 📊 Informasi Sektoral
- **Pertanian**: Data hasil panen, program bantuan, jadwal tanam, dan informasi teknis pertanian
- **UMKM**: Direktori usaha mikro kecil menengah, produk unggulan desa, dan program pemberdayaan ekonomi
- **Lembaga Desa**: Informasi tentang BPD, PKK, Karang Taruna, dan organisasi kemasyarakatan lainnya

### 📞 Layanan Kontak & Pengaduan
Sistem pengaduan online yang memungkinkan masyarakat menyampaikan keluhan, saran, atau permintaan layanan kepada pemerintah desa dengan mudah dan transparan.

### 📰 Portal Berita
Portal informasi terkini yang menyajikan berita desa, pengumuman resmi, agenda kegiatan, dan update program pembangunan desa.

## Teknologi yang Digunakan

Website ini dibangun menggunakan teknologi modern:

- **[Laravel](https://laravel.com)** - Framework PHP yang powerful dan elegan
- **PHP 8.x** - Bahasa pemrograman backend
- **MySQL** - Database management system
- **Bootstrap/Tailwind CSS** - Framework CSS untuk UI yang responsif
- **JavaScript/jQuery** - Untuk interaktivitas frontend

## Requirements

- PHP >= 8.0
- Composer
- MySQL >= 5.7
- Node.js & NPM
- Web server (Apache/Nginx)

## Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/yourusername/website-desa-dukuh-agung.git
   cd website-desa-dukuh-agung
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database**
   Edit file `.env` dan sesuaikan konfigurasi database:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=desa_dukuh_agung
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Migrasi database**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Jalankan aplikasi**
   ```bash
   php artisan serve
   ```

Website dapat diakses di `http://localhost:8000`

## Struktur Project

```
├── app/
│   ├── Http/Controllers/
│   │   ├── DesaController.php
│   │   ├── InformasiController.php
│   │   ├── KontakController.php
│   │   └── BeritaController.php
│   └── Models/
├── resources/
│   ├── views/
│   └── js/
├── routes/
│   └── web.php
└── database/
    ├── migrations/
    └── seeders/
```

## Tim Pengembang

**Developer**: [Rahmat Maliki]  
**Email**: [Satset443@gmail.com]  
**Desa**: Dukuh Agung

## Support

Jika Anda menemukan bug atau memiliki saran pengembangan, silakan:
- Buat issue di repository GitHub
- Hubungi tim pengembang via email
- Atau sampaikan melalui fitur kontak di website

## License

Website Desa Dukuh Agung adalah software open source dengan lisensi [MIT license](https://opensource.org/licenses/MIT).

---

**Desa Dukuh Agung** - Membangun Desa Digital yang Transparan dan Modern
