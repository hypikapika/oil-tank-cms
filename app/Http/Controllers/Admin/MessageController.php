<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): View
    {
        return view('admin.messages.index', [
            'messages' => ContactMessage::latest()->paginate(15),
        ]);
    }

    public function show(ContactMessage $message): View
    {
        if ($message->status === ContactMessage::STATUS_NEW) {
            $message->update(['status' => ContactMessage::STATUS_READ]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function markAsReplied(ContactMessage $message): RedirectResponse
    {
        $message->update(['status' => ContactMessage::STATUS_REPLIED]);

        return back()->with('success', 'Pesan ditandai sudah dibalas.');
    }

    public function destroy(ContactMessage $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
