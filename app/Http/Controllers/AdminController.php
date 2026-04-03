<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // On protège toutes les routes avec auth et admin middleware
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // Page dashboard
    public function index()
    {
        return view('admin.dashboard');
    }
}
