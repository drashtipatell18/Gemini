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
        return view('yoyo');
    }

    public function Upgrade()
    {
        return view('Upgrad');
    }
    public function PublicLinks()
    {
        return view('Public_Links');
    }
    public function SavedInfo()
    {
        return view('SavedInfo');
    }

    public function ExploreGem()
    {
        return view('Explore_Gem');
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


    public function NewGem()
    {
        return view('NewGem');
    }

    public function CareerGuide()
    {
        return view('Career_guide');
    }

    public function chessChamp()
    {
        return view('Chess_champ');
    }

    public function brainstomer()
    {
        return view('Brainstormer');
    }

    public function codingPartner()
    {
        return view('Coding_partner');
    }
    public function writingEditor()
    {
        return view('Writing_editor');
    }
    public function learningCoach()
    {
        return view('Learning_coach');
    }

   public function NewGemStore(Request $request)
    {
        $gem = new NewGem();

        // Assign user_id only if user is logged in
        $gem->user_id = Auth::check() ? Auth::id() : null;

        $gem->name = $request->input('gemsName');
        $gem->description = $request->input('gemsDescription');
        $gem->save();

        return response()->json(['message' => 'Gem saved']);
    }
}
