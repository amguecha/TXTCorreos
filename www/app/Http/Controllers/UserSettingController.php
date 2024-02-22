<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserSetting;

class UserSettingController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'theme_variant' => 'required',
        ]);
        try {
            $userSetting = UserSetting::firstOrNew();
            $userSetting->email = $validatedData['email'];
            $userSetting->phone = $validatedData['phone'];
            $userSetting->theme_variant = $validatedData['theme_variant'];
            $userSetting->save();
            return redirect('/');
        } catch (\Exception $e) {
            return redirect('/error');
        }
    }
}
