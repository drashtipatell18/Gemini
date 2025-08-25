<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Models\SaveInfo;

class SettingController extends Controller
{
    public function SaveInfo()
    {
        $saveInfos = SaveInfo::where('user_id', auth()->id())->get();
        // dd($saveInfos);
        return view('SavedInfo', compact('saveInfos'));
    }

    public function SaveInfoStore(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'description' => 'required|string|max:1000|min:1',
            ]);

            // Create the save info record
            $saveInfo = SaveInfo::create([
                'user_id' => auth()->check() ? auth()->id() : null,
                'description' => $request->input('description'),
            ]);

            // Check if it's an AJAX request
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your information has been saved successfully.',
                    'data' => [
                        'id' => $saveInfo->id,
                        'description' => $saveInfo->description,
                        'created_at' => $saveInfo->created_at->format('Y-m-d H:i:s'),
                    ]
                ], 200);
            }

            // For regular form submission
            return back()->with('success', 'Your information has been saved successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $e->errors()
                ], 422);
            }

            return back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            // Handle other errors
            \Log::error('SaveInfo creation failed: ' . $e->getMessage());

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong. Please try again.',
                    'error' => app()->environment('local') ? $e->getMessage() : 'Internal server error'
                ], 500);
            }

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function DeleteSaveInfo($id)
    {
        $saveInfo = SaveInfo::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$saveInfo) {
            return response()->json([
                'success' => false,
                'message' => 'Save info not found or you do not have permission to delete it.'
            ], 404);
        }

        try {
            $saveInfo->delete();

            return response()->json([
                'success' => true,
                'message' => 'Save info deleted successfully.'
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Failed to delete save info: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => app()->environment('local') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
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
