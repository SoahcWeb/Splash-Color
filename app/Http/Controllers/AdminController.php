<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller; // <-- IMPORTANT

class AdminController extends Controller
{
    // On protège toutes les routes avec auth et admin middleware
    public function __construct()
    {
        $this->middleware(['auth', 'admin']); // ✅ doit marcher
    }

    // Page dashboard
    public function index()
    {
        return view('admin.dashboard'); // Assure-toi que ce fichier existe
    }
}
