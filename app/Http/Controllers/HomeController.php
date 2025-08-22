<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
