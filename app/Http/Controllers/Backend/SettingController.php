<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show()
    {
        $setting = Setting::first();
        return view('backend.pages.setting.show', compact('setting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // 'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            // 'google_maps_url' => 'nullable|url|max:255',
            'register_url' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        Setting::create($data);

        return redirect()->route('settings.show')->with('success', 'Setting Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            // 'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            // 'google_maps_url' => 'nullable|url|max:255',
            'register_url' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        $setting = Setting::first();
        if ($setting) {
            $setting->update($data);
        } else {
            Setting::create($data);
        }

        return redirect()->route('settings.show')->with('success', 'Setting Berhasil Diperbarui');
    }
}
