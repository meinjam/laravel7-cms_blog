<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.setting', compact('settings'));
    }

    public function update(Request $request)
    {
        $rules = [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email',
            'address' => 'required',
        ];

        $this->validate($request, $rules);

        $settings = Setting::first();
        $settings->site_name = $request->site_name;
        $settings->contact_number = $request->contact_number;
        $settings->contact_email = $request->contact_email;
        $settings->address = $request->address;
        $settings->save();
        return redirect()->route('settings')->with('success','Settings updated successfully.');
    }
}
