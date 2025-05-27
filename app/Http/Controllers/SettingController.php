<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        return view('pages.settings.index', compact('settings'));
    }

    public function update(Request $request, string $key)
    {
        try {
            $setting = Setting::where('key', $key)->firstOrFail();
            $data = $request->except(['_token', '_method']);
            $value = json_encode($data);
            $setting->value = $value;
            $setting->save();

            return response()->json([
                'status' => 200,
                'message' => __('Setting updated successfully'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('An error occurred while updating the setting: ') . $e->getMessage(),
            ]);
        }
    }
}
