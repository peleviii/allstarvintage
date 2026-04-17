<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'team_name'   => 'required|string|max:255',
            'responsible' => 'required|string|max:255',
            'email'       => 'required|email',
            'phone'       => 'required|string|max:20',
            'message'     => 'nullable|string|max:1000',
        ], [
            'team_name.required'   => 'Το όνομα ομάδας είναι υποχρεωτικό.',
            'responsible.required' => 'Το όνομα υπευθύνου είναι υποχρεωτικό.',
            'email.required'       => 'Το email είναι υποχρεωτικό.',
            'email.email'          => 'Το email δεν είναι έγκυρο.',
            'phone.required'       => 'Το τηλέφωνο είναι υποχρεωτικό.',
        ]);

        Mail::to('info@allstarvintage.gr')->send(new ContactFormMail(
            teamName: $request->team_name,
            responsible: $request->responsible,
            email: $request->email,
            phone: $request->phone,
            note: $request->message ?? ''
        ));

       return redirect()->route('contact.index')->with('success', 'Η δήλωσή σας στάλθηκε επιτυχώς! Θα επικοινωνήσουμε μαζί σας σύντομα. 🏐');
    }
}
