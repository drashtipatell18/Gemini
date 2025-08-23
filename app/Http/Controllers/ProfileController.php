<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
  public function uploadImage(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not authenticated',
        ], 401);
    }

    // Delete old image if exists
    if ($user->profile_image && file_exists(public_path('storage/profile_images/' . $user->profile_image))) {
        unlink(public_path('storage/profile_images/' . $user->profile_image));
    }

    // Handle new image
    $image = $request->file('profile_image');
    $filename = uniqid() . '.' . $image->getClientOriginalExtension();

    // Move to public/storage/profile_images
    $destinationPath = public_path('storage/profile_images');
    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0755, true);
    }

    $image->move($destinationPath, $filename);

    // Save to DB
    $user->profile_image = $filename;
    $user->save();

    return response()->json([
        'success' => true,
        'image_url' => asset('storage/profile_images/' . $filename),
    ]);
}






}
