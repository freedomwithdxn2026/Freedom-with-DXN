<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function business()
    {
        return view('pages.business');
    }

    public function joinDxn()
    {
        return view('pages.join');
    }

    public function zoomTraining()
    {
        return view('pages.zoom');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only('name', 'email', 'subject', 'message'));

        return back()->with('success', 'Message sent successfully! We\'ll get back to you soon.');
    }
}
