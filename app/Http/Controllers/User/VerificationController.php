<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VerificationDocument;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_front' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'id_back' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'passport' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle file uploads
        $id_front = $request->file('id_front')->store('verification_documents', 'public');
        $id_back = $request->file('id_back')->store('verification_documents', 'public');
        $passport = $request->file('passport')->store('verification_documents', 'public');

        // Save document details to the database
        VerificationDocument::create([
            'user_id' => Auth::id(),
            'id_front' => $id_front,
            'id_back' => $id_back,
            'passport' => $passport,
            'status' => '1',
        ]);

        return redirect()->back()->with('success', 'Documents uploaded successfully. Your verification is pending.');
    }
}
