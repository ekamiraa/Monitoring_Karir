<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            return view('admin.dashboard');
        }

        abort(403, 'You do not have the right roles.');
    }
}
