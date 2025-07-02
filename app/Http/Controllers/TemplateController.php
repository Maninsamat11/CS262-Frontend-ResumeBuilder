<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a list of available templates.
     */
    public function index()
    {
        // Fetch all templates from the database
        $templates = Template::all(); 

        return view('templates.index', [
            'templates' => $templates
        ]);
    }
}