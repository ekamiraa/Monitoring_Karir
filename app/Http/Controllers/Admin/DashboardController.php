<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            $position = Employee::select('posisi', \DB::raw('count(*) as total'))
                ->groupBy('posisi')
                ->get();

            $age = Employee::select(
                \DB::raw('FLOOR(DATEDIFF(CURDATE(), tgl_lahir) / 365) as umur'),
                \DB::raw('count(*) as total')
            )
                ->groupBy('umur')
                ->get();

            $area = Employee::select('area_nama', \DB::raw('count(*) as total'))
                ->groupBy('area_nama')
                ->get();

            return view('admin.dashboard', compact('position', 'age', 'area'));
        }

        abort(403, 'You do not have the right roles.');
    }
}
