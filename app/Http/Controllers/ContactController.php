<?php

namespace App\Http\Controllers;

use App\Mail\ContactInquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
            'website' => ['prohibited'],
        ]);

        Mail::to('emmamuelg@yellowquip.com')->send(new ContactInquiryMail(
            $validated['name'],
            $validated['phone'] ?? null,
            $validated['email'],
            $validated['message'],
        ));

        return redirect()->route('public.contact')
            ->with('success', "Thank you, {$validated['name']} — your message has been sent. The Yellowquip team will respond as soon as possible.");
    }
}
