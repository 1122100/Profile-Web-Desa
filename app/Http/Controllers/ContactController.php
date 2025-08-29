<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Tampilkan form kontak untuk user publik.
     */
    public function index()
    {
        return view('users.kontak');
    }

    /**
     * Proses pengiriman pesan dari form publik.
     */
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|max:150',
            'subject' => 'nullable|string|max:150',
            'message'  => 'required|string|min:10|max:2000',
        ]);

        // Simpan ke database
        ContactMessage::create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'subject'  => $data['subject'] ?? null,
            'message'   => $data['message'],
            'is_read' => false,
        ]);

        // Kirim notifikasi email (opsional)
        try {
            Mail::to(config('mail.from.address', env('CONTACT_EMAIL')))
                ->send(new ContactReceived(
                    $data['name'],
                    $data['email'],
                    $data['message']
                ));
        } catch (\Throwable $e) {

        }

        return back()->with('success', 'Terima kasih — pesan Anda telah dikirim.');
    }

    /**
     * Tampilkan daftar pesan untuk admin.
     */
    public function adminIndex(Request $request)
    {
        $q      = $request->query('search');
        $status = $request->query('status', 'all');

        /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $kontak */
        $kontak = ContactMessage::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('name', 'like', "%{$q}%")
                       ->orWhere('email', 'like', "%{$q}%")
                       ->orWhere('subject', 'like', "%{$q}%")
                       ->orWhere('message', 'like', "%{$q}%");
                });
            })
            ->when($status === 'unread', fn($query) => $query->where('is_read', false))
            ->when($status === 'read',   fn($query) => $query->where('is_read', true))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.kontak.index', compact('kontak'));
    }

    /**
     * Tampilkan detail pesan.
     */
    public function show($id)
    {
        $kontak = ContactMessage::findOrFail($id);
        return view('admin.kontak.show', compact('kontak'));
    }

    /**
     * Tandai pesan sebagai sudah dibaca.
     */
    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['is_read' => true]);

        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    /**
     * Hapus pesan.
     */
    public function destroy($id)
    {
        ContactMessage::whereKey($id)->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
