<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $incidents = Incident::with('reporter')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard', compact('incidents'));
    }
}
