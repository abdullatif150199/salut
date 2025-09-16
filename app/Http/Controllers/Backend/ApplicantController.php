<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Setting;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|max:20',
            'wa'      => 'required|string|max:20',
            'program' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);


        $applicant = Applicant::create($data);

        $waMessage = "Assalamualaikum, saya *{$applicant->name}*.\n"
            . "Nomor WA: {$applicant->wa}\n"
            . "Email : {$applicant->email}\n"
            . "Program: *{$applicant->program}*\n\n"
            . "Pesan: {$applicant->message}";

        $setting = Setting::first();

        $adminNumber = $setting->wa ?? config('app.admin_wa');

        // Redirect ke WA
        $waUrl = "https://wa.me/{$adminNumber}?text=" . urlencode($waMessage);

        return redirect($waUrl);
    }
}
