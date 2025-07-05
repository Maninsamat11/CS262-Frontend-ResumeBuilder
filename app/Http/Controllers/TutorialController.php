<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template; 

class TutorialController extends Controller
{
    /**
     * Show the "How to Create a Resume" tutorial page.
     */
    public function howToCreateResume()
    {
        // Eager load active templates to display in the tutorial
        $templates = Template::where('status', true)->limit(4)->get();
        
        // Get the authenticated user, which will be null if the visitor is a guest
        $user = auth()->user();
        
        return view('tutorial', compact('templates', 'user'));
    }
}