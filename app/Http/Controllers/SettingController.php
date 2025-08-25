<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class SettingController extends Controller
{
    public function SaveInfo()
    {
        return view('SavedInfo');
    }

    public function feedbackStore(Request $request)
    {
        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/feedback'), $fileName);
                $imagePaths[] = 'uploads/feedback/' . $fileName;
            }
        }
        Feedback::create([
           'user_id' => auth()->check() ? auth()->id() : null,
            'description' => $request->description,
            'image' => implode(',', $imagePaths),
        ]);

        return back()->with('success', 'Thank you for your feedback!');
    }
}
