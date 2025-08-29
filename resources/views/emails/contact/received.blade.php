<x-mail::message>
# Pesan Kontak Baru

Anda menerima pesan baru dari form kontak di website.

**Nama:** {{ $name }}
**Email:** {{ $email }}

**Pesan:**
> {{ $messageContent }}

<x-mail::button :url="url('/')">
Kunjungi Website
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
