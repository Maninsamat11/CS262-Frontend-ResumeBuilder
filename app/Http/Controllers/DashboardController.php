<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the user's resume dashboard.
     */
    public function index()
    {
        // Use the 'resumes' relationship we defined on the User model
        $resumes = Auth::user()->resumes()->latest()->get();

        return view('dashboard', [
            'resumes' => $resumes
        ]);
    }
}