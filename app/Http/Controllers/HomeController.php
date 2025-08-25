<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewGem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('Yoyo',compact('user'));
    }

  

    public function Upgrade()
    {
        $user = Auth::user();
        return view('Upgrad',compact('user'));
    }
    public function PublicLinks()
    {
        $user = Auth::user();
        return view('Public_Links',compact('user'));
    }
    public function SavedInfo()
    {
        $user = Auth::user();
        return view('SavedInfo',compact('user'));
    }

    public function ExploreGem()
    {
        $user = Auth::user();
        return view('Explore_Gem',compact('user'));
    }

    public function gemJson()
    {
        return response()->json(NewGem::all());
    }

    public function getGemById($id)
    {
        // Find gem by id or return 404
        $gem = NewGem::find($id);

        if (!$gem) {
            return response()->json(['message' => 'Gem not found'], 404);
        }

        return response()->json($gem);
    }

    public function updateGem(Request $request, $id)
    {
        $gem = NewGem::find($id);


        if (!$gem) {
            return response()->json(['message' => 'Gem not found'], 404);
        }

        // ✅ Use correct fields: 'title' and 'description'
      $gem->update([
        'user_id' => 1,
        'name' => $request->input('gemsName'),
        'description' => $request->input('gemsDescription'),
    ]);

        return response()->json(['message' => 'Gem updated successfully', 'data' => $gem]);
    }

    public function destroy($id)
    {
        $gem = NewGem::find($id);

        if (!$gem) {
            return response()->json(['message' => 'Gem not found'], 404);
        }

        try {
            $gem->delete();
            return response()->json(['message' => 'Gem deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting gem', 'error' => $e->getMessage()], 500);
        }
    }


    public function NewGem()
    {
        $user = Auth::user();
        return view('NewGem',compact('user'));
    }

    public function CareerGuide()
    {
        $user = Auth::user();
        return view('Career_guide',compact('user'));
    }

    public function chessChamp()
    {
        $user = Auth::user();
        return view('Chess_champ',compact('user'));
    }

    public function brainstomer()
    {
        $user = Auth::user();
        return view('Brainstormer',compact('user'));
    }

    public function codingPartner()
    {
        $user = Auth::user();
        return view('Coding_partner',compact('user'));
    }
    public function writingEditor()
    {
        $user = Auth::user();
        return view('Writing_editor',compact('user'));
    }
    public function learningCoach()
    {
        $user = Auth::user();
        return view('Learning_coach',compact('user'));
    }

    public function NewGemStore(Request $request)
    {
        $gem = new NewGem();

        // Assign user_id only if user is logged in
        $gem->user_id = 1;

        $gem->name = $request->input('gemsName');
        $gem->description = $request->input('gemsDescription');
        $gem->save();

        return response()->json(['message' => 'Gem saved']);
    }
}
